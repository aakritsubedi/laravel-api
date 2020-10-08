<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only(['email','password']);

        $token = auth()->attempt($credentials);

        return response()->json([
            'users' => $credentials,
            'token' => $token
        ]);
    }
}
