<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\v1\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)){
            return response()->json([
                'status' => 400,
                'message' => "Wrong Email or Password"
            ], 400);
        }

        $token = $user->createToken('myToken')->plainTextToken;
        return response()->json([
            'status' => 200,
            'message' => 'Login Successfully',
            'token' => $token
        ], 200);
    }
}
