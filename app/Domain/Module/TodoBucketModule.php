<?php

namespace App\Domain\Module;

class TodoBucketModule
{
    public const MODULE_NAME = 'todo_bucket';

    public const PERMISSION_CREATE_TODO_BUCKET = 'create_todo_bucket';
    public const PERMISSION_EDIT_TODO_BUCKET = 'edit_todo_bucket';
    public const PERMISSION_DELETE_TODO_BUCKET = 'delete_todo_bucket';
    public const PERMISSION_VIEW_TODO_BUCKETS = 'view_todo_buckets';
    public const PERMISSION_MANAGE_TODO_BUCKET_MEMBERS = 'manage_todo_bucket_members';
    public const PERMISSION_ASSIGN_TODO_ITEMS = 'assign_todo_items';
    public const PERMISSION_VIEW_TODO_ITEMS = 'view_todo_items';

    public static function getAllPermissions(): array
    {
        return [
            self::PERMISSION_CREATE_TODO_BUCKET,
            self::PERMISSION_EDIT_TODO_BUCKET,
            self::PERMISSION_DELETE_TODO_BUCKET,
            self::PERMISSION_VIEW_TODO_BUCKETS,
            self::PERMISSION_MANAGE_TODO_BUCKET_MEMBERS,
            self::PERMISSION_ASSIGN_TODO_ITEMS,
            self::PERMISSION_VIEW_TODO_ITEMS,
        ];
    }

}

