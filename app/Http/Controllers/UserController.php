<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //POST -> CREAR UN USUARIO
    public function store(Request $request)
    {
        $create_user = $request->all();
        $create_user['password'] = Hash::make($request->password);

        User::create($create_user);
        return response()->json([
            'res' => true,
            'message' => 'Added User'
        ], 200);
    }

    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (!is_null($user) && Hash::check($request->password, $user->password)) 
        {
            $token = $user->createToken('proy.back-php-cars')->accessToken;

            return response()->json([
                'res' => true,
                'token' => $token,
                'message' => 'Welcome Bro!!'
            ], 200);
        }
        else{
            return response()->json([
                'res' => false,
                'message' => 'Wrong account or password'
            ], 400);
        }
    }

    public function logout()
    {
        $user = auth()->user();
        $user->tokens->each(function($token, $key){
            $token->delete();
        });
        $user->save();

        return response()->json([
            'res' => false,
            'message' => 'Bye Bye'
        ], 200);
    }
}
