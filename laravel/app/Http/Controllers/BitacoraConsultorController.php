<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BitacoraConsultorController extends Controller
{
    //

//SELECT `Fecha`, AVG(`Velocidad`) FROM `bitacoras` WHERE YEAR(`Fecha`) =2018 GROUP by MONTH(`Fecha`)
    //Esta consulta se muestra para un dia en especifico
   // obtiene como parametro id dispositivo la fecha
    function ConsultaPorFecha($id, $idisp ){
        $data_points = array();
        $datos = DB::select("SELECT Month(Fecha) as fecha, AVG(`Velocidad`) as velocidad FROM `bitacoras` WHERE YEAR(`Fecha`) = :fecha and `Id_dispositivo` = :idDisp GROUP by Month(Fecha) order by Month(Fecha)",
        ["fecha" => $id,"idDisp" => $idisp, ] );

        foreach ($datos as &$valor) {

            $point = array("valorx" => $valor->fecha, "valory" => $valor->velocidad);
            array_push($data_points, $point);
        }

      echo json_encode($data_points);
    }

    /*Esta consulta devuelve los años de registro de la bitacora*/
    function GraficaAno(Request $request){

        $datos = DB::select("SELECT distinct YEAR(`Fecha`) as ano FROM `bitacoras` WHERE `Id_dispositivo` = :id",["id" => $request->id]);
        return response()->json([
            "datos" =>  $datos
        ]);

        echo json_encode($data_points);
    }
}
