<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clips;

class ClipsController extends Controller
{
    public function getShow(){
        return $clips = Clips::all();
    }

    public function postCreate(Request $request){
        if($request->hasfile('clip')){
            $file = $request->file('clip');
            $nameFile = time()."-".$file->getClientOriginalName();
            $ruta = $file->move(public_path().'/clips/', $nameFile);
        }
        #$clips = Clips::create($request->all());
        
        $p = new Clips;
        $p-> nombre = $request->nombre;
        $p-> clip = $ruta;
        $p-> descripcion = $request->descripcion;
        $p-> confirmado = $request->confirmado;
        $p-> save();
        return $p;

    }
}
