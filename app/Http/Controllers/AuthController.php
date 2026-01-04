<?php

namespace App\Http\Controllers;

use App\Application\Services\Interfaces\AuthServiceInterface;
use App\Exceptions\InvalidCredentials;
use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(private AuthServiceInterface $authService) {}

    public function login(LoginRequest $request)
    {
        try {
            $validated = $request->validated();
            $credentials = [
                'email' => $validated['email'],
                'password' => $validated['password'],
            ];

            $login = $this->authService->login($credentials);

            return response()->json([
                'message' => 'Login successful',
                ...$login
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (InvalidCredentials $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during login'], 500);
        }
    }

    public function logout()
    {
        try {
            $this->authService->logout();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during logout'], 500);
        }
    }

    public function refresh()
    {
        try {
            $refresh = $this->authService->refresh();
            return response()->json([
                'message' => 'Token refreshed successfully',
                ...$refresh
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during token refresh'], 500);
        }
    }
}
