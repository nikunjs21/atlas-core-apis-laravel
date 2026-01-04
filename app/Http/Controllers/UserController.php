<?php

namespace App\Http\Controllers;

use App\Application\DTOs\RegisterDTO;
use App\Application\DTOs\UserDTO;
use App\Application\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\RegisterRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    public function __construct(private UserServiceInterface $userService) {}

    public function register(RegisterRequest $request)
    {   
        $validated = $request->validated();
        $dto = RegisterDTO::fromArray($validated);
        $user = $this->userService->registerUser($dto);
        $createdUser = UserDTO::toArray($user);
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $createdUser,
        ], 201);
    }

    public function me()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $userData = UserDTO::toArray($user);
        return response()->json([
            'user' => $userData,
        ]);
    }
}
