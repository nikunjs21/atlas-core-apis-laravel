<?php

namespace App\Http\Controllers;

use App\Application\Services\Interfaces\TaskServiceInterface;
use App\Http\Requests\CreateTaskRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{

    public function __construct(private TaskServiceInterface $taskService) {}

    public function create(CreateTaskRequest $request)
    {
        try {
            $validated = $request->validated();
            // from headers
            $workspaceId = $request->header('X-Workspace-ID');
            $task = $this->taskService->createTask(
                (int)$workspaceId,
                (int)$request->user()->id,
                $validated['title'],
                $validated['description'] ?? ''
            );
            return response()->json([
                'success' => true,
                'data' => $task,
                'message' => 'Task created successfully',
            ], 201);
        } catch (ValidationException $ve) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => $ve->errors(),
            ], 422);
        } catch (Exception $e) {
            Log::error('Task creation failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Task creation failed',
            ], 500);
        }
    }
}
