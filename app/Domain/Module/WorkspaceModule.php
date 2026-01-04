<?php

namespace App\Domain\Module;

class WorkspaceModule
{
    public const MODULE_NAME = 'workspace';

    public const PERMISSION_CREATE_WORKSPACE = 'create_workspace';
    public const PERMISSION_EDIT_WORKSPACE = 'edit_workspace';
    // public const PERMISSION_DELETE_WORKSPACE = 'delete_workspace';
    public const PERMISSION_VIEW_WORKSPACES = 'view_workspaces';
    public const PERMISSION_MANAGE_WORKSPACE_MEMBERS = 'manage_workspace_members';
    public const PERMISSION_ASSIGN_ROLES = 'assign_roles';

    public static function getAllPermissions(): array
    {
        return [
            self::PERMISSION_CREATE_WORKSPACE,
            self::PERMISSION_EDIT_WORKSPACE,
            // self::PERMISSION_DELETE_WORKSPACE,
            self::PERMISSION_VIEW_WORKSPACES,
            self::PERMISSION_MANAGE_WORKSPACE_MEMBERS,
            self::PERMISSION_ASSIGN_ROLES,
        ];
    }
}
