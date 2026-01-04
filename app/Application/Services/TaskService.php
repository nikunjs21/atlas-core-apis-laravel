<?php

namespace App\Application\Services;

use App\Application\Services\Interfaces\TaskServiceInterface;
use App\Models\Task;

class TaskService implements TaskServiceInterface
{
    public function createTask(int $workspaceId, int $creatorId, string $title, string $description): Task
    {
        $task = new Task();
        $task->workspace_id = $workspaceId;
        $task->created_by = $creatorId;
        $task->title = $title;
        $task->description = $description;
        $task->save();

        return $task;
    }
}
