<?php

use App\Models\UserPermission;

class PermissionHelper
{
    protected $userPermissions;

    public function __construct()
    {
        $this->userPermissions = UserPermission::enabled()->get();
    }

    public function getGroups(): array
    {
        $groups = [];
        $slugs = $this->userPermissions->pluck('slug');
        foreach ($slugs as $slug) {
            $slugSplitted = explode('.', $slug);
            if (!empty($slugSplitted)) {
                $groups[] = $this->toHigh(ucfirst($slugSplitted[0]));
            }
        }
        return array_unique($groups);
    }

    public function getModulesFromGroup(string $group): array
    {
        $modules = [];
        $slugs = $this->userPermissions->pluck('slug');
        foreach ($slugs as $slug) {
            $slugSplitted = explode('.', $slug);
            if (!empty($slugSplitted) && Str::lower($slugSplitted[0]) == Str::lower($group)) {
                $modules[] = $this->toHigh(ucfirst($slugSplitted[1]));
            }
        }
        return array_values(array_unique($modules));
    }

    public function getPermissionsFromModule(string $group, string $module): array
    {
        $permissions = [];
        $slugs = $this->userPermissions->pluck('slug');
        foreach ($slugs as $slug) {
            $slugSplitted = explode('.', $slug);
            if (!empty($slugSplitted) && Str::lower($slugSplitted[0]) == Str::lower($group) && Str::lower($slugSplitted[1]) == Str::lower($module)) {
                $permissions[$slug] = $this->toHigh(ucfirst($slugSplitted[2]));
            }
        }
        sort($permissions);
        return $permissions;
    }

    public function getPermissionsColumnsFromGroup(string $group): array
    {
        $columns = [];
        $slugs = $this->userPermissions->pluck('slug');
        foreach ($slugs as $slug) {
            $slugSplitted = explode('.', $slug);
            if (!empty($slugSplitted) && Str::lower($slugSplitted[0]) == Str::lower($group)) {
                $columns[] = $this->toHigh(ucfirst($slugSplitted[2]));
            }
        }
        // $columns = array_values(array_unique($columns));
        // sort($columns);

        $sortedColumn = [];
        foreach ($columns as $column) {
            if (!isset($sortedColumn[$column])) {
                $sortedColumn[$column] = 1;
            } else {
                $sortedColumn[$column]++;
            }
        }
        arsort($sortedColumn);
        // $columns = array_values(array_unique($columns));
        // sort($columns);

        return array_keys($sortedColumn);
    }

    public function getSlug(string $group, string $module, string $permission): string
    {
        $group = $this->toLow(Str::lower($group));
        $module = $this->toLow(Str::lower($module));
        $permission = $this->toLow(Str::lower($permission));

        $slugs = $this->userPermissions->pluck('slug');
        foreach ($slugs as $slug) {
            if ($slug === ($group . "." . $module . "." . $permission)) {
                return $slug;
            }
        }
        return "";
    }

    public function getPermissionFromSlug(string $slug): ?UserPermission
    {
        return $this->userPermissions->where('slug', $slug)->first();
    }

    public function getSlugFromId(string $id): ?string
    {
        $permission = $this->userPermissions->where('id', $id)->first();
        return is_null($permission)?null:$permission->slug;
    }

    public function toHigh(string $text): string
    {
        return Str::replace('_', ' ', $text);
    }

    public function toLow(string $text): string
    {
        return Str::replace(' ', '_', $text);
    }
}
