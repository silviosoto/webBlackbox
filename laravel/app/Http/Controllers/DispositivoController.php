<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DispositivoRequest;
use \App\Dispositivo;

class DispositivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //funcion para registrar Dispositivo
    function store(DispositivoRequest $request){
        $resp =  Dispositivo::find($request->id);

        if($resp == null){
            $Dispositivo = new Dispositivo();
            $Dispositivo->id = $request->id;
            $Dispositivo->Eliminado  = 0; //por defecto 0  para indicar que está activo
            $Dispositivo->save();
            $resp = $Dispositivo;
        }
        
         return response()->json([
         "dispositivo" =>  $resp
        ]);
    }
 
}
