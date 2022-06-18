<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login(string $email, $password)
    {
        $user = User::where('email', $email)->first();
        if (!$user) return false;
        if (!Hash::check($password, $user->password)) return false;
        return $user;
    }
}
