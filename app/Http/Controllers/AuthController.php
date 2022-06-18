<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\SimpleResource;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepository;


class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginUserRequest $request)
    {
        $user = $this->userRepository->login($request->phone, $request->password);
        if (!$user) return new SimpleResource(['message' => 'اطلاعات وارد شده اشتباه است.', 'status' => 422]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return new AuthResource(['token' => $token, 'user' => $user]);
    }

    public function get()
    {
        $user = auth()->user();
        return new UserResource($user);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return new SimpleResource(['message' => 'با موفقیت خارج شدید.', 'status' => 200]);
    }
}
