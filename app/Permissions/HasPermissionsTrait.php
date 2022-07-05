<?php

namespace App\Permissions;

use App\Models\UserPermission;
use App\Models\UserRole;
use UserPermissionHelper;

trait HasPermissionsTrait
{
    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);

        return $this;
    }

    public function withdrawPermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);

        return $this;
    }

    public function refreshPermissions(...$permissions)
    {
        $this->permissions()->detach();

        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }

        return false;
    }

    public function roles()
    {
        return $this->belongsToMany(UserRole::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(UserPermission::class);
    }

    public function hasGroupPermission(string $group): bool
    {
        $permissions = (new UserPermissionHelper())->getPermissionsFromSlugOfGroup($group);
        return appUser()->hasAnyPermissions($permissions);
    }

    public function hasAnyPermissions(array $permissions): bool
    {
        foreach ($permissions as $permission) {
            if (appUser()->can($permission)) {
                return true;
            }
        }

        return false;
    }

    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function getAllPermissions(array $permissions)
    {
        return UserPermission::whereIn('slug', $permissions)->get();
    }
}
