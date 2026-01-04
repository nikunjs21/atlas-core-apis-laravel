<?php

namespace App\Domain\Module;

class ChatModule
{
    public const MODULE_NAME = 'chat';

    public const PERMISSION_CREATE_MESSAGE = 'create_message';
    public const PERMISSION_EDIT_MESSAGE = 'edit_message';
    public const PERMISSION_DELETE_MESSAGE = 'delete_message';
    public const PERMISSION_VIEW_MESSAGES = 'view_messages';

    // chat group permissions, add members, remove members, edit group info
    public const PERMISSION_MANAGE_CHAT_GROUPS = 'manage_chat_groups';
    public const PERMISSION_ADD_GROUP_MEMBERS = 'add_group_members';
    public const PERMISSION_REMOVE_GROUP_MEMBERS = 'remove_group_members';
    public const PERMISSION_EDIT_GROUP_INFO = 'edit_group_info';

    public static function getAllPermissions(): array
    {
        return [
            self::PERMISSION_CREATE_MESSAGE,
            self::PERMISSION_EDIT_MESSAGE,
            self::PERMISSION_DELETE_MESSAGE,
            self::PERMISSION_VIEW_MESSAGES,
            self::PERMISSION_MANAGE_CHAT_GROUPS,
            self::PERMISSION_ADD_GROUP_MEMBERS,
            self::PERMISSION_REMOVE_GROUP_MEMBERS,
            self::PERMISSION_EDIT_GROUP_INFO,
        ];
    }
}