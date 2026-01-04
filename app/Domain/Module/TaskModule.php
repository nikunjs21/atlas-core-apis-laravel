<?php

namespace App\Domain\Module;

class TaskModule
{
    public const MODULE_NAME = 'task';

    public const PERMISSION_CREATE_TASK = 'create_task';
    public const PERMISSION_EDIT_TASK = 'edit_task';
    public const PERMISSION_DELETE_TASK = 'delete_task';
    public const PERMISSION_VIEW_TASKS = 'view_tasks';
    public const PERMISSION_ASSIGN_TASKS = 'assign_tasks';
    public const PERMISSION_MANAGE_TASK_STATUSES = 'manage_task_statuses';

    public const PERMISSION_COMMENT_ON_TASKS = 'comment_on_tasks';
    public const PERMISSION_VIEW_TASK_COMMENTS = 'view_task_comments';

    
    public static function getAllPermissions(): array
    {
        return [
            self::PERMISSION_CREATE_TASK,
            self::PERMISSION_EDIT_TASK,
            self::PERMISSION_DELETE_TASK,
            self::PERMISSION_VIEW_TASKS,
            self::PERMISSION_ASSIGN_TASKS,
            self::PERMISSION_MANAGE_TASK_STATUSES,
            self::PERMISSION_COMMENT_ON_TASKS,
            self::PERMISSION_VIEW_TASK_COMMENTS,
        ];
    }
}