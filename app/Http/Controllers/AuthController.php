<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:api', ['except' => ['login']]);
//    }

    public function login(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('name', $request->name)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response('Error User Not Found', 401);
        }

        return response([
            'user' => $user,
            'token' => $user->createToken($request->name)->plainTextToken
        ],  200);
    }

    public function logout()
    {
//        Auth::user()->tokens()->delete();
//        auth()->logout();
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function me()
    {
        return response()->json(User::where('id', auth()->id())->first());
    }


}
