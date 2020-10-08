<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only(['email','password']);

       if(!$token = auth()->attempt($credentials)) {
           return response()->json([
               "status" => 0,
               "message" => "Invalid Username/Password"
           ], 401);
       }

        return response()->json([
            'user_email' => $credentials['email'],
            'token' => $token
        ], 200);
    }

    public function refresh() {
        try{
            $newToken = auth()->refresh();
        }
        catch(\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
    
        return response()->json([
            'token' => $newToken
        ]);
    }
}
