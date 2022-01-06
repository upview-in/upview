<?php

namespace App\Providers;

use App\Models\UserPermission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class UserPermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            UserPermission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);

            return false;
        }
    }
}
