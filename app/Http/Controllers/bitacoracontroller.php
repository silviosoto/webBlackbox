<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class bitacoracontroller extends Controller
{
    //

    public function index(){
        $datos = \App\bitacora::all();
        return view('bitacora',compact('datos'));
    }

    public function create(){
        $datos = \App\bitacora::all();
        $data_points = array();
        foreach ($datos as &$valor) {
            $point = array("valorx" => $valor['Hora'], "valory" => $valor['Velocidad']);
            array_push($data_points, $point);
        }
        echo json_encode($data_points);
    }

    function ConsultarAno(Request $request){

        $datos = DB::select("SELECT distinct YEAR(`Fecha`) as ano FROM `bitacoras` WHERE `dispositivos_id` = :id",["id" => $request->id]);
        return response()->json([
            "datos" =>  $datos
        ]);

    }

    //Esta funcion busca los meses dependiendo del año
    function ConsultarMeses(Request $request){

        $datos = DB::select(" SELECT distinct MONTH(`Fecha`) as ano FROM `bitacoras` WHERE `dispositivos_id` = :idDisp and YEAR(`Fecha`)= :fecha",
        ["idDisp" => $request->idDisp ,"fecha" =>  $request->fecha]);
        return response()->json([
            "datos" => $datos
        ]);

    }

    function ConsultarDias($idDisp,$fecha, $mes){
        $data_points = array();
        $datos = DB::select(" SELECT DAY(`Fecha`) as Dia, AVG(`Velocidad`) as velocidad FROM `bitacoras` WHERE YEAR(`Fecha`) = :fecha and `Id_dispositivos` = :idDisp and MONTH(`Fecha`) = :mes GROUP by DAY(Fecha) order by DAY(Fecha)",
        ["idDisp" => $idDisp ,"fecha" => $fecha, "mes"=> $mes ]);

        foreach ($datos as $valor) {
            $point = array("valorx" => $valor->Dia, "valory" => $valor->velocidad);
            array_push($data_points, $point);
        }

        echo json_encode($data_points);
    }


    //Esta funcion busca los meses dependiendo del año
    function ConsultarDia(Request $request){

        $datos = DB::select("SELECT DAY(`Fecha`) as Dia FROM `bitacoras` WHERE YEAR(`Fecha`) = :fecha and `dispositivos_id` = :idDisp and MONTH(`Fecha`) = :mes GROUP by DAY(Fecha) order by DAY(Fecha)",
        ["idDisp" => $request->idDisp ,"fecha" =>  $request->fecha,"mes" =>  $request->mes]);
        return response()->json([
            "datos" => $datos
        ]);

    }

    function ConsultarHoras($idDisp,$fecha, $mes, $dia){
        $data_points = array();
        $datos = DB::select("SELECT `Velocidad`, `Hora`, `Latitud`,`Longitud` FROM `bitacoras` WHERE YEAR(`Fecha`) = :fecha and `dispositivos_id` = :idDisp and MONTH(`Fecha`) = :mes and DAY(`Fecha`) = :dia",
        ["idDisp" => $idDisp ,"fecha" => $fecha, "mes"=> $mes, "dia"=> $dia ]);

        foreach ($datos as $valor) {
            $point = array("valorx" => $valor->Hora, "valory" => $valor->Velocidad,
            "latitud" => $valor->Latitud, "Longitud" => $valor->Longitud);
            array_push($data_points, $point);
        }

        echo json_encode($data_points);
    }


    //Esta funcion busca la informacion del peritaje
    function ConsultarPeritaje($idDisp,$fecha, $mes, $dia){
        $data_points = array();
        $datos = DB::select("SELECT * FROM `bitacoras` WHERE YEAR(`Fecha`) = :fecha and `Id_dispositivo` = :idDisp and MONTH(`Fecha`) = :mes and DAY(`Fecha`) = :dia AND HOUR(`Hora`)= (SELECT MAX(HOUR(`Hora`)) FROM `bitacoras` WHERE HOUR(`Hora`) ) ORDER by `Hora` ASC",
        ["idDisp" => $idDisp ,"fecha" => $fecha, "mes"=> $mes, "dia"=> $dia ]);

        foreach ($datos as $valor) {
            $point = array("valorx" => $valor->Hora, "valory" => $valor->Velocidad,
            "latitud" => $valor->Latitud, "Longitud" => $valor->Longitud);
            array_push($data_points, $point);
        }

        return  json_encode($data_points);
    }

        //SELECT * FROM `bitacoras` WHERE YEAR(`Fecha`) = 2018 and `dispositivos_id` = 13 and MONTH(`Fecha`) = 4 and DAY(`Fecha`) = 5 AND HOUR(`Hora`)= (SELECT MAX(HOUR(`Hora`)) FROM `bitacoras` WHERE HOUR(`Hora`) )
}
