<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login
     * @unauthenticated
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->all())) {
            /** @var \App\Models\User $user */

            $user = Auth::user();
            $token = $user->createToken(env('APP_NAME') . '_Token')->plainTextToken;

            return response(['token' => $token]);
        }

        return ['message' => "invalid credentials"];
    }
}
