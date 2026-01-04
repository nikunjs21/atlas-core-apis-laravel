<?php

namespace App\Application\Services;

use App\Application\Services\Interfaces\AuthServiceInterface;
use App\Exceptions\InvalidCredentials;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService implements AuthServiceInterface {
    public function login(array $credentials): array {
        $credentials = [
            'email' => $credentials['email'] ?? '',
            'password' => $credentials['password'] ?? '',
        ]; // no extra parameters
        
        if (!$token = JWTAuth::attempt($credentials)) {
            throw new InvalidCredentials();
        }

        return [
            'token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ];
    }

    public function logout(): void {
        JWTAuth::invalidate(JWTAuth::getToken());
    }

    public function refresh(): array {
        $newToken = JWTAuth::refresh(JWTAuth::getToken());
        return [
            'token' => $newToken,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ];
    }

    public function getAuthenticatedUser(): ?array {
        $user = JWTAuth::parseToken()->authenticate();
        return $user ? $user->toArray() : null;
    }
}