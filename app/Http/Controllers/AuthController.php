<?php

namespace App\Http\Controllers;




class AuthController extends Controller
{
    public function createToken(): \Illuminate\Http\JsonResponse
    {

        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $deviceName = $credentials['device_name'];
        unset($credentials['device_name']);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken($deviceName)->plainTextToken;

            return response()->json([
                'status' => 'success',
                'token' => $token
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials'
        ], 401);
    }


}
