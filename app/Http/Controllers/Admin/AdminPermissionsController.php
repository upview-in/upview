<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Admin\ExportPermissions;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPermissions\CreatePermissionRequest;
use App\Http\Requests\Admin\AdminPermissions\DeletePermissionRequest;
use App\Http\Requests\Admin\AdminPermissions\EditPermissionRequest;
use App\Http\Requests\Admin\AdminPermissions\ExportPermissionsRequest;
use App\Http\Requests\Admin\AdminPermissions\ImportPermissionsRequest;
use App\Http\Requests\Admin\AdminPermissions\IndexPermissionRequest;
use App\Http\Requests\Admin\AdminPermissions\StorePermissionRequest;
use App\Http\Requests\Admin\AdminPermissions\UpdatePermissionRequest;
use App\Http\Requests\Admin\AdminPermissions\ViewPermissionRequest;
use App\Imports\Admin\PermissionsImport;
use App\Models\AdminPermission;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AdminPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  IndexPermissionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexPermissionRequest $request)
    {
        $adminPermissions = AdminPermission::search()->paginate(10);

        return view('admin.admin-permission.index', compact('adminPermissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePermissionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreatePermissionRequest $request)
    {
        return view('admin.admin-permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePermissionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $sanitized = $request->validated();
        $adminPermission = AdminPermission::create($sanitized);

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Permission (' . $adminPermission->name . ') created successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Permission (' . $adminPermission->name . ') created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewPermissionRequest $request
     * @param  AdminPermission  $adminPermission
     * @return \Illuminate\Http\Response
     */
    public function show(ViewPermissionRequest $request, AdminPermission $adminPermission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditPermissionRequest $request
     * @param  AdminPermission  $adminPermission
     * @return \Illuminate\Http\Response
     */
    public function edit(EditPermissionRequest $request, AdminPermission $adminPermission)
    {
        return view('admin.admin-permission.edit', ['adminPermission' => $adminPermission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePermissionRequest $request
     * @param  AdminPermission  $adminPermission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, AdminPermission $adminPermission)
    {
        $adminPermission->name = $request->name ?? $adminPermission->name;
        $adminPermission->slug = $request->slug ?? $adminPermission->slug;
        !$request->has('enabled') ?: ($adminPermission->enabled = filter_var($request->enabled, FILTER_VALIDATE_BOOLEAN));

        $adminPermission->update();

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Permission (' . $adminPermission->name . ') updated successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Permission (' . $adminPermission->name . ') updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePermissionRequest $request
     * @param  AdminPermission $adminPermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletePermissionRequest $request, AdminPermission $adminPermission)
    {
        $adminPermission->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Permission (' . $adminPermission->name . ') deleted successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Permission (' . $adminPermission->name . ') deleted successfully!');
    }

    public function export(ExportPermissionsRequest $request)
    {
        return Excel::download(new ExportPermissions, 'admin_permissions_' . Carbon::now()->toDateTimeString() . '.xlsx');
    }

    public function import(ImportPermissionsRequest $request)
    {
        Excel::import(new PermissionsImport, $request->file('file'));

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Permission imported successfully!',
                'icon' => 'check',
            ]);
        }

        return back();
    }
}
