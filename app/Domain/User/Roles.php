<?php

namespace App\Domain\User;

enum Roles: string
{
    case OWNER = 'owner';
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case LEADER = 'leader';
    case SENIOR = 'senior';
    case MEMBER = 'member';
}