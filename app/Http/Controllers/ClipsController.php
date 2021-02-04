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
        $clips = Clips::create($request->all());
        /*
        $p = new Clips;
        $p-> name = $request->nombre;
        $p-> ruta = $request->ruta;
        $p-> descripcion = $request->descripcion;
        $p-> save();*/
        return $clips;

    }
}
