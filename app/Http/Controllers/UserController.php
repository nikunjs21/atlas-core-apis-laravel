<?php

namespace App\Http\Controllers;

use App\Application\DTOs\RegisterDTO;
use App\Application\DTOs\UserDTO;
use App\Application\Services\Interfaces\AuthServiceInterface;
use App\Application\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    public function __construct(private UserServiceInterface $userService, private AuthServiceInterface $authService) {}

    public function register(RegisterRequest $request)
    {
        try {
            $validated = $request->validated();
            $dto = RegisterDTO::fromArray($validated);
            $user = $this->userService->registerUser($dto);
            $createdUser = UserDTO::toArray($user);
            return response()->json([
                'success' => true,
                'data' => $createdUser,
                'message' => 'User registered successfully',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'An error occurred during registration',
            ], 500);
        }
    }

    public function me()
    {
        try {
            $user = $this->authService->getAuthenticatedUser();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'data' => null,
                    'message' => 'User Unauthorized',
                ], 401);
            }

            return response()->json([
                'success' => true,
                'data' => UserDTO::toArray($user),
                'message' => 'User fetched successfully',
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching authenticated user: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'An error occurred while fetching user data',
            ], 500);
        }
    }
}
