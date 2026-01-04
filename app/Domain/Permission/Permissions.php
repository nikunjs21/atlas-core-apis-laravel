<?php

namespace App\Support;

use App\Domain\Module\ChatModule;
use App\Domain\Module\TaskModule;
use App\Domain\Module\TodoBucketModule;
use App\Domain\Module\WorkspaceModule;
use App\Domain\User\Roles;

class Permissions
{

    public array $modulesPermissions = [];

    public function __construct($role = Roles::MEMBER)
    {

        $this->modulesPermissions = match ($role) {
            Roles::OWNER, Roles::ADMIN => [
                ...ChatModule::getAllPermissions(),
                ...TaskModule::getAllPermissions(),
                ...TodoBucketModule::getAllPermissions(),
                ...WorkspaceModule::getAllPermissions(),
            ],
            Roles::MANAGER => [
                ChatModule::PERMISSION_CREATE_MESSAGE,
                ChatModule::PERMISSION_EDIT_MESSAGE,
                ChatModule::PERMISSION_DELETE_MESSAGE,
                ChatModule::PERMISSION_VIEW_MESSAGES,
                ChatModule::PERMISSION_MANAGE_CHAT_GROUPS,
                ChatModule::PERMISSION_ADD_GROUP_MEMBERS,
                ChatModule::PERMISSION_REMOVE_GROUP_MEMBERS,
                ChatModule::PERMISSION_EDIT_GROUP_INFO,
                ...TaskModule::getAllPermissions(),
                ...TodoBucketModule::getAllPermissions(),
            ],
            Roles::LEADER => [
                ChatModule::PERMISSION_CREATE_MESSAGE,
                ChatModule::PERMISSION_EDIT_MESSAGE,
                ChatModule::PERMISSION_VIEW_MESSAGES,
                ChatModule::PERMISSION_ADD_GROUP_MEMBERS,
                ChatModule::PERMISSION_EDIT_GROUP_INFO,
                ...TaskModule::getAllPermissions(),
                ...TodoBucketModule::getAllPermissions(),
            ],
            Roles::SENIOR => [
                ChatModule::PERMISSION_CREATE_MESSAGE,
                ChatModule::PERMISSION_VIEW_MESSAGES,
                TaskModule::PERMISSION_CREATE_TASK,
                TaskModule::PERMISSION_EDIT_TASK,
                TaskModule::PERMISSION_VIEW_TASKS,
                TaskModule::PERMISSION_ASSIGN_TASKS,
                TaskModule::PERMISSION_MANAGE_TASK_STATUSES,
                TaskModule::PERMISSION_COMMENT_ON_TASKS,
                TaskModule::PERMISSION_VIEW_TASK_COMMENTS,
                ...TodoBucketModule::getAllPermissions(),
            ],
            Roles::MEMBER => [
                ChatModule::PERMISSION_CREATE_MESSAGE,
                ChatModule::PERMISSION_VIEW_MESSAGES,
                TaskModule::PERMISSION_VIEW_TASKS,
                TaskModule::PERMISSION_MANAGE_TASK_STATUSES,
                TaskModule::PERMISSION_COMMENT_ON_TASKS,
                TaskModule::PERMISSION_VIEW_TASK_COMMENTS,
                ...TodoBucketModule::getAllPermissions(),
            ],
        };
    }

    public static function hasPermission(string $permission, array $userPermissions): bool
    {
        return in_array($permission, $userPermissions);
    }
}
