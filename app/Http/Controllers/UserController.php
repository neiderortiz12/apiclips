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
    #bcrypt($request->password)==$user->password
    public function login(Request $request){
        $user = User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->password, $user->password))
        {
            $user->api_token = Str::random(100);
            $user->save();
            return response()->json([
                'res' => true,
                'token' => $user->api_token,
                'message' => 'bienvenido'
            ], 200);
        }
        else{
            return response()->json([
                'res' => true,
                'message' => 'cuenta o password incorrecta'
            ], 200);
        }
    }

    public function logOut()
    {
        $user = auth()->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'res' => true,
            'message' => 'adios'
        ], 200);
    }
}
