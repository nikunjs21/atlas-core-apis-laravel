<?php

namespace App\Application\Services\Interfaces;

use App\Models\Workspace;

interface WorkspaceServiceInterface
{
    public function createWorkspace(int $userId, string $name, string $description = ''): Workspace;
}