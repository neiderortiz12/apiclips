<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clips;

class ClipsController extends Controller
{
    public function getShow(){
        return $clips = Clips::all();
    }

    public function getShowClip($id){
        return $clips = Clips::findOrFail($id);
    }

    public function postCreate(Request $request){
        if($request->hasfile('clip')){
            $file = $request->file('clip');
            $nameFile = time()."-".$file->getClientOriginalName();
            $ruta = "/public/clips/".$nameFile;
            $file->move(public_path().'/clips/', $nameFile);
            #$datico=json_decode($request->datos);
        }else{
            $file = $request->file('clip');
            return response()->json([
                'res' => false,
                'message' => 'Ocurrio algo con el archivo',
            ], 200);
        }
        #$clips = Clips::create($request->all());
        $p = new Clips;
        $p-> nombre = $request->nombre;
        $p-> clip = $ruta;
        $p-> descripcion = $request->descripcion;
        //$p-> confirmado = $request->confirmado;
        $p-> save();
        return response()->json([
            'res' => true,
            'message' => 'Registro exitoso',
        ], 200);

    }
    public function postDelete(Request $request){
        $clip = Clips::whereId($request->id)->first();
        if(!is_null($clip))
        {

        }
    }
    public function postUpdate(Request $request){
        $clip = Clips::whereId($request->id)->first();
        if(!is_null($clip))
        {
            
        }
    }
}
