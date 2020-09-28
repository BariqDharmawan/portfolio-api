<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $user= User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'success'   => false,
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('ApiToken')->plainTextToken;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request, $id)
    {
        dd(Auth::user());
        $user = User::where('username', Auth::user()->username)->first();
        $user->tokens()->where('id', $id)->delete();
        return response()->json('logout', 201);
    }
}
