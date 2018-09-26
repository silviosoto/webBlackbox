<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use \App\motocicleta;
use App\Http\Requests\MotocicletaRequest;
use App\Http\Requests\UpdateRequest;
use \App\DB;
       
class MotoController extends Controller 
{

    public function __construct(){
        //$this->middleware('auth');
    }
    
    function show(Request $request){ 
        $datos = motocicleta::where('user_id', '=',  $request->id)->get();
        return response()->json([
            "moto" =>   $datos
        ]);
    }
    
    //funcion para registrar motocicleta
    function store(MotocicletaRequest $request){

        $moto = new motocicleta();
        $moto->placa = $request->placa;
        $moto->cilindrada = $request->cilindrada;
        $moto->color = $request->color;
        $moto->Eliminado = 0;
        $moto->user_id = $request->iduser;
        $moto->dispositivos_id = $request->idDisp;
        $moto->save();
        return response()->json([
            "mensaje" =>  $request->all()
        ]);
    }
  
    function Buscar(Request $request){
        $Moto =  motocicleta::find($request->id);
         return response()->json([
            "Moto" =>  $Moto        
        ]); 
    }

    function BuscarMoto(Request $request){
        $Moto =  motocicleta::find($request->id);
         return response()->json([
            "Moto" =>  $Moto        
        ]); 
    }

    function BuscarPlaca($placa){
        $Moto =  motocicleta::where('placa', '=',  $placa)->get();
         return response()->json([
            "Moto" =>  $Moto        
        ]); 
    }
    
    function update(UpdateRequest $request){
        $moto =  motocicleta::find($request->id);
        $moto->placa = $request->placa;
        $moto->cilindrada = $request->cilindrada;
        $moto->color = $request->color;
        $moto->save();
         return response()->json([
            "Moto" =>  $moto       
        ]); 
    }

    //Funcion para Eliminar Motocicleta
    function destroy(Request $request){
        $moto =  motocicleta::find($request->id);
        if($moto){
            $moto->Eliminado = 1;
            $moto->save();
        }
         return response()->json([
            "Moto" =>  $moto       
        ]);
    }
}
