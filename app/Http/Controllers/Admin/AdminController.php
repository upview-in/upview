<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\CreateAdminRequest;
use App\Http\Requests\Admin\Admins\DeleteAdminRequest;
use App\Http\Requests\Admin\Admins\EditAdminRequest;
use App\Http\Requests\Admin\Admins\IndexAdminRequest;
use App\Http\Requests\Admin\Admins\StoreAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Http\Requests\Admin\Admins\ViewAdminRequest;
use App\Models\Admin;
use App\Models\AdminRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  IndexAdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexAdminRequest $request)
    {
        $admins = Admin::with('roles')->search()->paginate(10);

        return view('admin.admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateAdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateAdminRequest $request)
    {
        return view('admin.admins.create', ['roles' => AdminRole::enabled()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAdminRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        $sanitized = $request->validated();

        // Convert password to hash
        if ($request->has('password') && !empty($request->password)) {
            $sanitized['password'] = Hash::make($request->password);
        }

        $sanitized['email_verified_at'] = Carbon::now();
        $admin = Admin::create($sanitized);

        // Set admin profile photo if uploaded
        if ($request->hasFile('avatar')) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $roles_ids = [];
        foreach ($sanitized['roles'] as $role) {
            if (!is_null(AdminRole::find($role))) {
                $roles_ids[] = $role;
            }
        }
        $admin->roles()->attach($roles_ids);

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Admin (' . $admin->username . ') created successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Admin (' . $admin->username . ') created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewAdminRequest $request
     * @param  Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(ViewAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditAdminRequest $request
     * @param  Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(EditAdminRequest $request, Admin $admin)
    {
        return view('admin.admins.edit', ['admin' => $admin, 'roles' => AdminRole::enabled()->get(), 'assignedRoles' => $admin->roles->pluck('id')->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAdminRequest $request
     * @param  Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->name = $request->name ?? $admin->name;
        $admin->username = $request->username ?? $admin->username;
        $admin->local_lang = $request->local_lang ?? $admin->local_lang;

        if ($request->has('password') && !empty($request->password)) {
            $admin->password = Hash::make($request->password);
        }

        !$request->has('enabled') ?: ($admin->enabled = filter_var($request->enabled, FILTER_VALIDATE_BOOLEAN));

        if ($request->hasFile('avatar')) {
            if ($admin->hasMedia('avatars')) {
                $admin->media()->delete();
            }
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $admin->update();

        if ($request->has('roles')) {
            $roles_ids = [];
            foreach ($request->roles as $role) {
                if (!is_null(AdminRole::find($role))) {
                    $roles_ids[] = $role;
                }
            }
            $admin->roles()->sync($roles_ids);
        }

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Admin (' . $admin->username . ') updated successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Admin (' . $admin->username . ') updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteAdminRequest $request
     * @param  Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteAdminRequest $request, Admin $admin)
    {
        $admin->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Admin (' . $admin->username . ') deleted successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Admin (' . $admin->username . ') deleted successfully!');
    }
}
