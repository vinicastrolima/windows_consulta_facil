<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function getAllUsers()
    {
        $users = User::get();
        return response()->json($users);
    }

    public function refresh()
    {
        $token = JWTAuth::refresh();

        return response()->json(['token' => $token]);
    }

    public function me()
    {
        $user = Auth::user();

        return response()->json($user);
    }
}
