<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->isValidCredentials($credentials)) {
            $token = $this->generateToken();
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    private function isValidCredentials($credentials)
    {

        $validEmail = 'admin@example.com';
        $validPassword = 'password';

        return $credentials['email'] === $validEmail && $credentials['password'] === $validPassword;
    }

    private function generateToken()
    {
        return 'dummy_token';
    }
}
