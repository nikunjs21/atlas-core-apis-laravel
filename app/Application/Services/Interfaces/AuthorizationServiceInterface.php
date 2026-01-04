<?php

namespace App\Application\Services\Interfaces;

use App\Models\User;

interface AuthorizationServiceInterface {
    public function can(User $user, int $workspaceId, string $module, string $action): bool;
}