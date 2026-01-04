<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $validated = $request->validated();
        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        if (!($token =JWTAuth::attempt($credentials))) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

    public function logout() {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh() {
        $newToken = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json([
            'message' => 'Token refreshed successfully',
            'token' => $newToken,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

}
