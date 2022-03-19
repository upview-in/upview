<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\DeleteUserRequest;
use App\Http\Requests\Admin\Users\EditUserRequest;
use App\Http\Requests\Admin\Users\IndexUserRequest;
use App\Http\Requests\Admin\Users\StoreUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Http\Requests\Admin\Users\ViewUserRequest;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  IndexUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexUserRequest $request)
    {
        $users = User::with('roles')->search()->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateUserRequest $request)
    {
        return view('admin.users.create', ['roles' => UserRole::enabled()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $sanitized = $request->validated();

        // Convert password to hash
        if ($request->has('password') && !empty($request->password)) {
            $sanitized['password'] = Hash::make($request->password);
        }

        $sanitized['email_verified_at'] = Carbon::now();
        $user = User::create($sanitized);

        // Set user profile photo if uploaded
        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $roles_ids = [];
        foreach ($sanitized['roles'] as $role) {
            if (!is_null(UserRole::find($role))) {
                $roles_ids[] = $role;
            }
        }
        $user->roles()->attach($roles_ids);

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'User (' . $user->email . ') created successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'User (' . $user->email . ') created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewUserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(ViewUserRequest $request, User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditUserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(EditUserRequest $request, User $user)
    {
        return view('admin.users.edit', ['user' => $user, 'roles' => UserRole::enabled()->get(), 'assignedRoles' => $user->roles->pluck('id')->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->mobile_number = $request->mobile_number ?? $user->mobile_number;
        $user->birth_date = $request->birth_date ?? $user->birth_date;
        $user->local_lang = $request->local_lang ?? $user->local_lang;

        if ($request->has('new_password') && !empty($request->new_password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user->country = $request->country ?? $user->country;
        $user->state = $request->state ?? $user->state;
        $user->city = $request->city ?? $user->city;
        $user->address = $request->address ?? $user->address;

        !$request->has('enabled') ?: ($user->enabled = filter_var($request->enabled, FILTER_VALIDATE_BOOLEAN));
        !$request->has('verified') ?: ($user->email_verified_at = (filter_var($request->verified, FILTER_VALIDATE_BOOLEAN) ? Carbon::now() : null));

        if ($request->hasFile('avatar')) {
            if ($user->hasMedia('avatars')) {
                $user->media()->delete();
            }
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $user->update();

        if ($request->has('roles')) {
            $roles_ids = [];
            foreach ($request->roles as $role) {
                if (!is_null(UserRole::find($role))) {
                    $roles_ids[] = $role;
                }
            }
            $user->roles()->sync($roles_ids);
        }

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'User (' . $user->email . ') updated successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'User (' . $user->email . ') updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteUserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteUserRequest $request, User $user)
    {
        $user->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'User (' . $user->email . ') deleted successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'User (' . $user->email . ') deleted successfully!');
    }
}
