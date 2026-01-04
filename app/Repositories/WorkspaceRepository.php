<?php

namespace App\Repositories;

use App\Models\Workspace;

class WorkspaceRepository {
    public static function fetchWorkspaceById(int $workspaceId) {
        return Workspace::find($workspaceId);
    }

    public static function fetchRoleInWorkspace(int $userId, int $workspaceId) {
        $workspace = Workspace::find($workspaceId);
        if ($workspace) {
            $pivotData = $workspace->users()
                ->where('user_id', $userId)
                ->first()
                ?->pivot;
            return $pivotData?->role_id;
        }
        return null;
    }
}
