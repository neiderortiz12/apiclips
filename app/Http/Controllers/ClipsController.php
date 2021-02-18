<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use App\Models\Clips;

class ClipsController extends Controller
{
    public function getShow(){
        //return $clips = Clips::all();
        return $clips = Clips::where('confirmado', 1)->get();
    }
    public function getShowAdmin(){
        return $clips = Clips::all();
        //return $clips = Clips::where('confirmado', 1)->get();
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
        $p-> user = $request ->user;
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
        $clip = Clips::find($request->id);
        if(!is_null($clip))
        {
            //$file= file($clip->clip);
            $clip->delete();
            return response()->json([
                'res' => true,
                'message' => 'Elemento eliminado',
            ], 200);

        }else{
            return response()->json([
                'res' => false,
                'message' => 'El elemento no pudo ser eliminado',
            ], 200);
        }
    }
    public function postUpdate(Request $request){
        $clip = Clips::find($request->id);
        if(!is_null($clip))
        {
            //$file= file($clip->clip);
            $clip->confirmado = $request->confirmado;
            $clip->save();
            return response()->json([
                'res' => true,
                'message' => 'Elemento cambiado',
            ], 200);

        }else{
            return response()->json([
                'res' => false,
                'message' => 'El elemento no pudo ser cambiado',
            ], 200);
        }
    }
    public function postClipsUser(Request $request){
        //$clip = Clips::whereuser($request->user);
        $clip = Clips::where('user', 'like', $request->user)->get();

        if(!is_null($clip)){
            return response()->json([
                'res' => true,
                'message' => 'Registro exitoso',
                'clips'=> $clip
            ], 200);
        }else{
            return response()->json([
                'res' => false,
                'message' => 'Registro exitoso',
            ], 200);
        }

    }
}
