@extends('layouts.dashboard')
@section('nav')
<nav>
<div class="nav-wrapper  darken-2 color-nav-sup" >
        <a style="margin-left: 20px;" class="breadcrumb" href="#!">Gestion usuarios</a>
        <a class="breadcrumb" href="#!">Usuarios</a>
        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
@stop 
@section('content')
 <main>
    <div class="row">
      <div class="col s12">
        <div style="padding: 35px;" align="" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Usuario</b>
              <p> <strong> {{Auth::user()->rol}}</strong> {{Auth::user()->email}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col s4">
              <!-- Modal Trigger -->
              <a class="waves-effect waves-light btn modal-trigger blue" href="#modal1">Registrar Usuario</a>
          @include('Usuario.RegistrarUsuario')
          @include('Usuario.EditarUsurio')       
          <!-- Modal Exito -->
        <div id="modalMenssaje" class="modal">
          <div class="modal-content center">
            <h4>Registro Exitoso</h4>
            <i class="large  material-icons sucsse-icons">check_circle</i>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
          </div>
        </div>
          <!-- Modal Error -->
          <div id="Error" class="modal">
          <div class="modal-content center">
            <h4>¡Ha ocorrido un problema!</h4>
            <i class="large  material-icons error-icons">error</i>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
          </div>
        </div>
          <div class="row">
            <div class="col s12">
              <div style="padding: 35px;" align="center" class="card grafica">
                <div class="row">
                  <div class="left card-title">
                    <b>Lista Usuarios</b>
                  </div>
                </div>
                <div class="row">
          <table class="centered">
              <thead>
                <tr>
                    <th>CC</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Informacion</th>
                </tr>
              </thead>
              {!!Form::open(['class'=>'tabla'])!!}
              <input type = "hidden" name="token" value="{{csrf_token()}}" id="tokenlist">
              @foreach($datos as $dato)
              <tbody>
                <tr>
                  <td>{{$dato->id}}</td>
                  <td>{{$dato->name}}</td>
                  <td>{{$dato->Apellidos}}</td>
                  <td>{{$dato->email}}</td>
                  <td>{!!link_to('#modalEditar', $title = 'Editar', $attributes =  ['id'=>$dato->id, 'class'=>'btn Editar blue modal-trigger'], $secure = null);!!}</td>      
                  <td>{!!link_to('#', $title = 'Eliminar', $attributes =  ['id'=>$dato->id, 'class'=>'btn Eliminar red'], $secure = null);!!}</td>      
                  <td>{!!link_to('UsuarioBitacora/'.$dato->id, $title = 'Bitacora', $attributes =  ['id'=>$dato->id, 'class'=>'btn Bitacora green'], $secure = null);!!}</td>      
                </tr>
              </tbody>
              @endforeach
              {!!Form::close()!!}
            </table>
            {!!$datos->render()!!}
                </div>
              </div>
            </div>
  </div>
@stop 
@section('scripts')
{!!Html::script('js/dashboard/Usuario/Usuario.js')!!}
{!!Html::script('js/dashboard/BuscarUsuario.js')!!}
{!!Html::script('js/dashboard/ActualizarUsuario.js')!!}
@endsection