<?php

namespace App\Application\Services;

use App\Application\Services\Interfaces\AuthorizationServiceInterface;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\WorkspaceRepository;

class AuthorizationService implements AuthorizationServiceInterface
{
    public function can(User $user, int $workspaceId, string $module, string $action): bool
    {
        $roleId = WorkspaceRepository::fetchRoleInWorkspace($user->id, $workspaceId);
        return RoleRepository::hasPermission($roleId, $module, $action);
    }
}
