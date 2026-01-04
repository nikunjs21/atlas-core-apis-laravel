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
                    'success' => true,
                    'data' => $login,
                    'message' => 'Login successful',
                ]);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (InvalidCredentials $e) {
                return response()->json([
                    'success' => false,
                    'data' => null,
                    'message' => $e->getMessage(),
                ], 401);
        } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'data' => null,
                    'message' => 'An error occurred during login',
                ], 500);
        }
    }

    public function logout()
    {
        try {
            $this->authService->logout();
                return response()->json([
                    'success' => true,
                    'data' => null,
                    'message' => 'Successfully logged out',
                ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during logout'], 500);
        }
    }

    public function refresh()
    {
        try {
            $refresh = $this->authService->refresh();
                return response()->json([
                    'success' => true,
                    'data' => $refresh,
                    'message' => 'Token refreshed successfully',
                ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred during token refresh'], 500);
        }
    }
}
