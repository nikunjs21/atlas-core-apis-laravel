<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public static function getPermissionsByRoleId(int $roleId): array
    {
        $role = Role::find($roleId);
        if ($role) {
            return $role->permissions()->toArray();
        }
        return [];
    }

    public static function hasPermission(int $roleId, string $module, string $action): bool{
        $role = Role::find($roleId);
        if ($role) {

            if (in_array($role->name, ['admin', 'owner'])) {
                return true;
            }

            return $role->permissions()
                ->where('module', $module)
                ->where('action', $action)
                ->exists();
        }
        return false;
    }
}
