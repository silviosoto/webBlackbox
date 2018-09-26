<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use \App\DB;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function store(LoginRequest $request)
    {
        $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string|min:5|max:20|alpha_num',
        ]);
        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
           
            if(Auth::user()->rol == "Admin"){
                return Redirect::to('Usuarios');
            }else{
                return Redirect::to('UsuarioConsultor/'.Auth::user()->id );
            }
           
        }else{
            return back()->withErrors(['email' => 'Datos son incorrectos']);
        }
        Session::flash('message-error','Datos son incorrectos');
        return Redirect::to('/');
    }

    public function LoginApi($email, $password)
    {
        $autenticado = false;
        if(Auth::attempt(['email'=>$email, 'password'=>$password, 'rol' =>  "Policia"])){
            $autenticado = true;
        }
        Session::flash('message-error','Datos son incorrectos');
        return response()->json([
            "usuario" => $autenticado      
        ]);
    }

    public function CerrarSesion(){
        Auth::logout();
        return Redirect::to('/')->with(array('logout' => 'Has cerrado sesión correctamente.'));
    }

    public function CerrarSesionApi(){
        Auth::logout();
        return response()->json([
            "usuario" => true      
        ]);
    }
}
