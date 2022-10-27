<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'dob' => $request->dob,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            "user"  => $user,
            "token"  => $token
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))

            return response()->json('Invalid login credentials', 401);

        $user = User::where('email',  $request->email)->firstOrFail();

        # Delete the existing tokens from the database and create a new one
        auth()->user()->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
