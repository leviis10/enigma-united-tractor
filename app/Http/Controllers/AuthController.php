<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(StoreUserRequest $request)
    {
        return response()->json($this->authService->register($request), 201);
    }

    public function login(LoginUserRequest $request)
    {
        return response()->json($this->authService->login($request));
    }
}
