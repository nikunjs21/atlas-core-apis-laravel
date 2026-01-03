<?php

namespace App\Http\Controllers;

use App\Application\DTOs\RegisterDTO;
use App\Application\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{

    public function __construct(private UserServiceInterface $userService) {}

    public function register(RegisterRequest $request)
    {   
        $validated = $request->validated();
        $dto = RegisterDTO::fromArray($validated);
        $user = $this->userService->registerUser($dto);
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }
}
