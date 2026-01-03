<?php

namespace App\Application\Services\Interfaces;

use App\Application\DTOs\RegisterDTO;
use App\Models\User;

interface UserServiceInterface {
    public function registerUser(RegisterDTO $data): User;
}