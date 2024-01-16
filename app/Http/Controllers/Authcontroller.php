<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthController\LoginRequest;
use App\Http\Requests\AuthController\MeRequest;
use App\Http\Requests\AuthController\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Authcontroller extends Controller
{

    public function register(RegisterRequest $request)
    {
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );
        return response()->json([
            'message' => 'Kullanıcı başarıyla kaydoldu.',
            'user' => $user
        ], 201);
    }



    public function login(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->only('email', 'password');

        //user authentication without jwt
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'message' => 'Kullanıcı başarıyla giriş yaptı.',
                'user' => $user,
                'token' => $token
            ], 200);
        }

        return response()->json([
            'message' => 'Kullanıcı giriş yapamadı.',
        ], 401);
    }

    public function me(MeRequest $request){
        return response()->json([
            'message' => 'Kullanıcı bilgileri getirildi.',
            'user' => $request->user()
        ], 200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Kullanıcı başarıyla çıkış yaptı.',
        ], 200);
    }


/*
         public function test(TestRequest $request){
        return response()->json([
            'message' => 'Kullanıcı bilgileri getirildi.',
            'test' => $request->id,
            'user' => $request->user()
        ], 200);
    }

*/
}
