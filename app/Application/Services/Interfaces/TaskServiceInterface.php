<?php

namespace App\Application\Services\Interfaces;

use App\Models\Task;

interface TaskServiceInterface
{
    public function createTask(int $workspaceId, int $creatorId, string $title, string $description): Task;
}
