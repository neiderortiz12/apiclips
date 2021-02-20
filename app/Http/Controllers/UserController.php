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
        //$user->save();

        return response()->json([
            'res' => true,
            'hola'=> $request->hola,
            'message' => 'adios'
        ], 200);
    }
    public function postUpdateUser(Request $request){
        $user = User::whereEmail($request->email)->first();
        if(!is_null($user)){
            
        }        
    }
    public function getVerificar(){
        return response()->json([
            'res' => true,
            'message' => 'autenticado'
        ], 200);
    }
    public function postUser(Request $request){
        $user = User::whereId($request->id)->first();
        if(!is_null($user)){
            return response()->json([
                'res' => true,
                'usuario' => $user
            ], 200);
        }else{
            return response()->json([
                'res' => false,
                'usuario' => 'usuarion no encontrado'
            ], 200);
        }
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->rol = true;
        $user->save();
        return response()->json([
            'res' => true,
            'usuario' => 'usuario root'
        ], 200);

    }
}
