<?php

namespace App\Application\DTOs;

use App\Models\User;

class UserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );
    }

    public static function toArray(self|User|array $dto): array
    {
        if (is_array($dto)) {
            return [
                'name' => $dto['name'] ?? '',
                'email' => $dto['email'] ?? ''
            ];
        }
        return [
            'name' => $dto->name ?? '',
            'email' => $dto->email ?? ''
        ];
    }
}
