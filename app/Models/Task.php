<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // id, created_by, title, description, assignee, status, created_at, updated_at
    protected $fillable = [
        'workspace_id',
        'created_by',
        'title',
        'description',
        'assignee',
        'status',
    ];
}
