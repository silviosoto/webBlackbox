@extends('layouts.dashboard')
@section('nav')
<nav>
<div class="nav-wrapper color-nav-sup darken-2">
        <a style="margin-left: 20px;" class="breadcrumb" href="#!">Gestion usuarios</a>
        <a class="breadcrumb" href="#!">Usuarios</a>
        <a class="breadcrumb" href="#!">Perfil Usuario</a>
        <a class="breadcrumb" href="#!">{{$Usuario->id}}</a>
        <div style="margin-right: 20px;" id="timestamp" class="right"></div>
      </div>
    </nav>
@stop 
@section('content')
 <main>
    <div class="row">
      
      <div class="col s12">
        <div style="padding: 35px;" align="center" class="card">
        <div class="row">
            <div class="left card-title">
              <b>Usuario: </b>
            </div>
          </div>
        <table class="centered">
        <thead>
          <tr>
              <th>CC</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Telefono</th>
              <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$Usuario->id}}</td>
            <td>{{$Usuario->name}}</td>
            <td>{{$Usuario->Apellidos}}</td>
            <td>{{$Usuario->Telefono}}</td>
            <td>{{$Usuario->email}}</td>
          </tr>
        </tbody>
      </table>
      <br>  
          <div class="row">
            <div class="left aqui">
            <a class="waves-effect waves-light btn modal-trigger blue" href="#modal1"><i class="material-icons right">add</i>Registrar Motocicleta</a>
            </div>
          </div>
          <div class="row">
          <table class="centered moto">
        <thead>
          <tr>
              <th>ID</th>
              <th>Placa</th>
              <th>Cilindrada</th>
              <th>Color</th>
              <th>Dispositivo</th>
              <th>Editar</th>
              <th>Eliminar</th>
              <th>Estadisticas</th>
          </tr>
        </thead>
        <tbody id=tableMoto>
        </tbody>
      </table>
          </div>
        </div>
      </div>
    </div>
    
    @include('bitacora')
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
  @include('Moto.Editarmoto')
  @include('Moto.RegistrarMoto')
  </main>
@stop 
@section('scripts')
{!!Html::script('js/dashboard/Motocileta/Motocicleta.js')!!}

@endsection

