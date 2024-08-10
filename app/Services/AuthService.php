<?php

namespace App\Services;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
  public function register(StoreUserRequest $request)
  {
    $validatedData = $request->validated();
    $createdUser = User::create([
      "email" => $validatedData["email"],
      "password" => bcrypt($validatedData["password"]),
    ]);
    $token = JWTAuth::fromUser($createdUser);

    return [
      "user" => $createdUser,
      "token" => $token
    ];
  }

  public function login(LoginUserRequest $request)
  {
    $credentials = $request->validated();

    try {
      if (!$token = JWTAuth::attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
    } catch (JWTException $e) {
      return response()->json(['error' => 'Could not create token'], 500);
    }

    $user = JWTAuth::user();

    return [
      "user" => $user,
      'token' => $token
    ];
  }
}
