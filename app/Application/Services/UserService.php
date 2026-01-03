<?php

namespace App\Application\Services;

use App\Application\DTOs\RegisterDTO;
use App\Application\Services\Interfaces\UserServiceInterface;
use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface {
    public function registerUser(RegisterDTO $data): User {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);
        event(new UserRegistered($user));
        return $user;
    }
}
