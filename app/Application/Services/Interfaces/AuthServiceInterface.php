<?php

namespace App\Application\Services\Interfaces;

interface AuthServiceInterface
{
    public function login(array $credentials): array;

    public function logout(): void;

    public function refresh(): array;

    public function getAuthenticatedUser(): ?array;
}