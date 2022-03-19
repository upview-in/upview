<?php

namespace App\Http\Controllers\Admin;

use AdminPermissionHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRoles\CreateRoleRequest;
use App\Http\Requests\Admin\AdminRoles\DeleteRoleRequest;
use App\Http\Requests\Admin\AdminRoles\EditRoleRequest;
use App\Http\Requests\Admin\AdminRoles\IndexRoleRequest;
use App\Http\Requests\Admin\AdminRoles\StoreRoleRequest;
use App\Http\Requests\Admin\AdminRoles\UpdateRoleRequest;
use App\Http\Requests\Admin\AdminRoles\ViewRoleRequest;
use App\Models\AdminRole;

class AdminRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  IndexRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRoleRequest $request)
    {
        $adminRoles = AdminRole::search()->paginate(10);

        return view('admin.admin-role.index', compact('adminRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRoleRequest $request)
    {
        return view('admin.admin-role.create', ['adminPermissionHelper' => new AdminPermissionHelper()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $adminPermissionHelper = new AdminPermissionHelper();
        $sanitized = $request->validated();
        $adminRole = AdminRole::create($sanitized);

        if ($request->has('permissions')) {
            $permission_ids = [];
            foreach ($sanitized['permissions'] as $slug) {
                $permission = $adminPermissionHelper->getPermissionFromSlug($slug);
                if (!is_null($permission)) {
                    $permission_ids[] = $permission->id;
                }
            }
            $adminRole->permissions()->attach($permission_ids);
        }

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Role (' . $adminRole->name . ') created successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Role (' . $adminRole->name . ') created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewRoleRequest $request
     * @param  AdminRole  $adminRole
     * @return \Illuminate\Http\Response
     */
    public function show(ViewRoleRequest $request, AdminRole $adminRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditRoleRequest $request
     * @param  AdminRole  $adminRole
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRoleRequest $request, AdminRole $adminRole)
    {
        return view('admin.admin-role.edit', ['adminRole' => $adminRole, 'adminPermissionHelper' => new AdminPermissionHelper(), 'havePermissions' => $adminRole->permissions()->pluck('slug')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoleRequest $request
     * @param  AdminRole $adminRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, AdminRole $adminRole)
    {
        $adminPermissionHelper = new AdminPermissionHelper();

        $adminRole->name = $request->name ?? $adminRole->name;
        $adminRole->slug = $request->slug ?? $adminRole->slug;
        !$request->has('enabled') ?: ($adminRole->enabled = filter_var($request->enabled, FILTER_VALIDATE_BOOLEAN));

        if ($request->has('permissions')) {
            $permission_ids = [];
            foreach ($request->permissions as $slug) {
                $permission = $adminPermissionHelper->getPermissionFromSlug($slug);
                if (!is_null($permission)) {
                    $permission_ids[] = $permission->id;
                }
            }
            $adminRole->permissions()->sync($permission_ids);
        }

        $adminRole->update();

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Role (' . $adminRole->name . ') updated successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Role (' . $adminRole->name . ') updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteRoleRequest $request
     * @param  AdminRole $adminRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRoleRequest $request, AdminRole $adminRole)
    {
        $adminRole->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Role (' . $adminRole->name . ') deleted successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Role (' . $adminRole->name . ') deleted successfully!');
    }
}
