<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthRegisterRequest;

class AuthController  {
    public function register(AuthRegisterRequest $request) {
        return response()->json([
            'email' => $request->email->getValue(),
            'password' => $request->password->getValue(),
        ]);
    }
}