<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use \App\user;
use \App\DB;


class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    function index(){
        $datos = user::where('Eliminado', 0)->paginate(4);
        return view('Usuario.Usuarios',compact('datos'));
    }

    function ListarUsuario(){
        $datos = user::where('Eliminado', 0)->get();
        return response()->json([
            "mensaje" =>  $datos
        ]);
    }

    function Consultor($id){
        $Usuario =  user::find($id);
        return view('Usuario.UsuarioConsultor',compact('Usuario'));
    }

    //Funcion para crear usuario
    function store(UsuarioRequest $request){
       $usuario = new User();
       $usuario->id = $request->id;
       $usuario->name = $request->name;
       $usuario->Apellidos = $request->Apellidos;
       $usuario->email = $request->email;
       $usuario->Telefono  = $request->Telefono;
       $usuario->rol  = $request->tusuario;
       $usuario->Eliminado  = 0; //por defecto 0  para indicar que está activo
       $usuario->password = bcrypt($request->password);//contraseña encriptada
       $usuario->save();
        return response()->json([
            "mensaje" =>  $usuario
        ]);
    }

    //cauando elimina inserta en el campo Eliminado = 1
    function eliminar(Request $request){

        $user = user::find($request->id);
        $user->Eliminado = 1;
        $user->save();
        return response()->json([
            "mensaje" =>  $user
        ]); 
   }
   

   function Buscar(Request $request){
       $Usuario =  user::find($request->id);
        return response()->json([
            "usuario" =>  $Usuario        
        ]); 
    }

    function Editar(Request $request){

        $usuario = user::find($request->cc);
        $usuario->id = $request->id;
        $usuario->name = $request->name;
        $usuario->Apellidos = $request->Apellidos;
        $usuario->email = $request->email;
        $usuario->Telefono  = $request->Telefono;
      
        $usuario->save();
        return response()->json([
            "usuario" => $request->all()      
        ]); 
    }

    function Bitacora($id){
        $Usuario =  user::find($id);
        return  view('Moto.PerfilUsuario',compact('Usuario'));
    }
}
