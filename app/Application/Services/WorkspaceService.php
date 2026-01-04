<?php

namespace App\Application\Services;

use App\Application\Services\Interfaces\WorkspaceServiceInterface;
use App\Models\Role;
use App\Models\Workspace;
use Illuminate\Support\Facades\DB;

class WorkspaceService implements WorkspaceServiceInterface
{
    public function createWorkspace(int $userId, string $name, string $description = ''): Workspace
    {
        $workspace = Workspace::create([
            'owner_id' => $userId,
            'name' => $name,
            'description' => $description
        ]);

        $roleId = Role::where('name', 'owner')->first()->id;

        DB::table('workspace_users')->insert([
            'workspace_id' => $workspace->id,
            'user_id' => $userId,
            'role_id' => $roleId
        ]);

        return $workspace;
    }
}
