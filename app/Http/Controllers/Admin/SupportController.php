<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Support\CreateUserRequest;
use App\Http\Requests\Admin\Support\DeleteUserRequest;
use App\Http\Requests\Admin\Support\EditUserRequest;
use App\Http\Requests\Admin\Support\IndexUserRequest;
use App\Http\Requests\Admin\Support\StoreUserRequest;
use App\Http\Requests\Admin\Support\UpdateUserRequest;
use App\Http\Requests\Admin\Support\ViewUserRequest;
use App\Models\SupportUser;
use App\Models\UserSupportQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  IndexUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexUserRequest $request)
    {
        $users = SupportUser::search()->paginate(10);

        return view('admin.user-support.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateUserRequest $request)
    {
        return view('admin.user-support.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $senitized = $request->validated();

        // Convert password to hash
        if ($request->has('password') && !empty($request->password)) {
            $senitized['password'] = Hash::make($request->password);
        }

        $senitized['email_verified_at'] = Carbon::now();
        $admin = SupportUser::create($senitized);

        // Set admin profile photo if uploaded
        if ($request->hasFile('avatar')) {
            $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Support user (' . $admin->username . ') created successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Support user (' . $admin->username . ') created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  ViewUserRequest  $request
     * @param  SupportUser $supportUser
     * @return \Illuminate\Http\Response
     */
    public function show(ViewUserRequest $request, SupportUser $supportUser)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditUserRequest  $request
     * @param  SupportUser $supportUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EditUserRequest $request, SupportUser $user)
    {
        return view('admin.user-support.users.edit', ['supportUser' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  SupportUser $supportUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, SupportUser $user)
    {
        $supportUser = $user;
        $supportUser->name = $request->name ?? $supportUser->name;
        $supportUser->username = $request->username ?? $supportUser->username;
        $supportUser->local_lang = $request->local_lang ?? $supportUser->local_lang;

        if ($request->has('password') && !empty($request->password)) {
            $supportUser->password = Hash::make($request->password);
        }

        !$request->has('enabled') ?: ($supportUser->enabled = filter_var($request->enabled, FILTER_VALIDATE_BOOLEAN));

        if ($request->hasFile('avatar')) {
            if ($supportUser->hasMedia('avatars')) {
                $supportUser->media()->delete();
            }
            $supportUser->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $supportUser->update();

        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Support user (' . $supportUser->username . ') updated successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Support user (' . $supportUser->username . ') updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteUserRequest  $request
     * @param  SupportUser $supportUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteUserRequest $request, SupportUser $user)
    {
        $supportUser = $user;
        $supportUser->delete();
        if ($request->ajax()) {
            return response()->json([
                'variant' => 'success',
                'message' => 'Support user (' . $supportUser->username . ') deleted successfully!',
                'icon' => 'check',
            ]);
        }

        return redirect()->back()->withInput()->with('message', 'Support user (' . $supportUser->username . ') deleted successfully!');
    }

    public function queries()
    {
        $queries = UserSupportQuery::search()->paginate(10);

        return view('admin.user-support.queries', compact('queries'));
    }
}
