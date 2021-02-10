<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(Request $request){
        $imput = $request->all();
        $imput['password'] = bcrypt($request->password);

        User::create($imput);
        return response()->json([
            'res' => true,
            'message' => 'Usuario creado con exito'
        ], 200);
    }
    
    public function login(Request $request){
        $user = User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->password, $user->password))
        {
            $token = $user->createToken('apiclips')->accessToken;

            return response()->json([
                'res' => true,
                'id'=> $user->id,
                'name'=> $user->name,
                'token' => $token,
                'message' => 'bienvenido'
            ], 200);
        }
        else{
            return response()->json([
                'res' => false,
                'message' => 'cuenta o password incorrecta'
            ], 200);
        }
    }

    public function logOut(Request $request)
    {
        $user = auth()->user();
        $user->tokens->each(function($token, $key){
            $token->delete();
        });
        $user->save();

        return response()->json([
            'res' => true,
            'hola'=> $request->hola,
            'message' => 'adios'
        ], 200);
    }
}
