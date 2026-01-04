<?php

namespace App\Http\Controllers;

use App\Application\Services\Interfaces\WorkspaceServiceInterface;
use App\Http\Requests\CreateWorkspaceRequest;
use Exception;
use Illuminate\Validation\ValidationException;

class WorkspaceController extends Controller
{

    public function __construct(private WorkspaceServiceInterface $workspaceService) {}

    public function create(CreateWorkspaceRequest $request)
    {
        try {
            $validated = $request->validated();
            $workspace = $this->workspaceService->createWorkspace((int)$request->user()->id, $validated['name'], $validated['description'] ?? '');
            return response()->json([
                'success' => true,
                'data' => $workspace,
                'message' => 'Workspace created successfully',
            ], 201);
        } catch (ValidationException $ve) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => $ve->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Workspace creation failed',
            ], 500);
        }
    }
}
