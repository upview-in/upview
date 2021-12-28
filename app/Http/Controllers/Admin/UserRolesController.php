<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\CreateRoleRequest;
use App\Http\Requests\Admin\Roles\DeleteRoleRequest;
use App\Http\Requests\Admin\Roles\EditRoleRequest;
use App\Http\Requests\Admin\Roles\IndexRoleRequest;
use App\Http\Requests\Admin\Roles\StoreRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;
use App\Http\Requests\Admin\Roles\ViewRoleRequest;
use App\Models\UserPermission;
use App\Models\UserRole;
use PermissionHelper;

class UserRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  IndexRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRoleRequest $request)
    {
        $userRoles = UserRole::search()->paginate(10);
        return view('admin.roles.index', compact('userRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRoleRequest $request)
    {
        return view('admin.roles.create', ['permissionHelper' => new PermissionHelper()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $permissionHelper = new PermissionHelper();
        $senitized = $request->validated();
        $userRole = UserRole::create($senitized);

        $permission_ids = [];
        foreach ($senitized['permissions'] as $slug) {
            $permission = $permissionHelper->getPermissionFromSlug($slug);
            if (!is_null($permission)) {
                $permission_ids[] = $permission->id;
            }
        }
        $userRole->permissions()->attach($permission_ids);

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Role (' . $userRole->name . ') created successfully!',
                'icon' => 'check'
            ]);
        }
        return redirect()->back()->withInput()->with('message', 'Role (' . $userRole->name . ') created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewRoleRequest $request
     * @param  UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(ViewRoleRequest $request, UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditRoleRequest $request
     * @param  UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRoleRequest $request, UserRole $userRole)
    {
        return view('admin.roles.edit', ['userRole' => $userRole, 'permissionHelper' => new PermissionHelper(), 'havePermissions' => $userRole->permissions()->pluck('slug')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRoleRequest $request
     * @param  UserRole $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, UserRole $userRole)
    {
        $permissionHelper = new PermissionHelper();

        $userRole->name = $request->name ?? $userRole->name;
        $userRole->slug = $request->slug ?? $userRole->slug;
        !$request->has('enabled') ?: ($userRole->enabled = filter_var($request->enabled, FILTER_VALIDATE_BOOLEAN));

        if ($request->has('permissions')) {
            $permission_ids = [];
            foreach ($request->permissions as $slug) {
                $permission = $permissionHelper->getPermissionFromSlug($slug);
                if (!is_null($permission)) {
                    $permission_ids[] = $permission->id;
                }
            }
            $userRole->permissions()->sync($permission_ids);
        }

        $userRole->update();

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Role (' . $userRole->name . ') updated successfully!',
                'icon' => 'check'
            ]);
        }
        return redirect()->back()->withInput()->with('message', 'Role (' . $userRole->name . ') updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteRoleRequest $request
     * @param  UserRole $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRoleRequest $request, UserRole $userRole)
    {
        $userRole->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Role (' . $userRole->name . ') deleted successfully!',
                'icon' => 'check'
            ]);
        }
        return redirect()->back()->withInput()->with('message', 'Role (' . $userRole->name . ') deleted successfully!');
    }
}
