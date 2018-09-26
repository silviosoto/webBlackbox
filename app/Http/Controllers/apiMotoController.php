<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use \App\motocicleta;
use \App\DB;

class apiMotoController extends Controller
{
    function BuscarMoto(Request $request){
        $Moto =  motocicleta::find($request->id);
         return response()->json([
            "Moto" =>  $Moto        
        ]); 
    }
}
