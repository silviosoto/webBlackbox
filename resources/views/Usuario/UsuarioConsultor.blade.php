@extends('layouts.dashboardConsultor')
@section('nav')
<nav>
<div class="nav-wrapper color-nav-sup darken-2">
        <a style="margin-left: 20px;" class="breadcrumb" href="#!">Perfil Usuario</a>
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
            <td class ="idUsuario" id= "{{$Usuario->id}}">{{$Usuario->id}}</td>
            <td>{{$Usuario->name}}</td>
            <td>{{$Usuario->Apellidos}}</td>
            <td>{{$Usuario->Telefono}}</td>
            <td>{{$Usuario->email}}</td>
          </tr>
        </tbody>
      </table>
      <br>  
          <div class="row">
          <table class="centered moto">
        <thead>
          <tr>
              <th>ID</th>
              <th>Placa</th>
              <th>Cilindrada</th>
              <th>Color</th>
              <th>Dispositivo</th>
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

    <div class="row">
      <div class="col s12">
        <div style="padding: 35px;" align="center" class="card grafica">
          <div class="row">
            <div class="left card-title">
              <div class="row">
              <div class="opcionesDeGrafica">
                {!!Form::open(['class'=>'col s12 from-fechas'])!!}
                <input type = "hidden" name="token" value="{{csrf_token()}}" id="tokenselet">
                <input type = "hidden" name="token" value="" id="disp">
                  <div class="row form-grafica">
                    <div class="input-field col s6">
                          <select class="browser-default" id= "infoselect">
                          </select>
                    </div>
                    <div class="input-field col s6">
                    <a  class="btn Graficar" > Graficar</a> 
                    
                    </div>
                  </div>
                  {!!Form::close()!!}
               </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div id="chart"></div>
          </div>
        
        </div>

        <div class="row">
        <div id="map" >
            </div>
        </div>
      </div>
    </div>  

   <!-- 
 <div class="row">
      <div class="col s6">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Bitacora De Usuario</b>
            </div>
          </div>
          <div class="row">
            <div class="col s1">&nbsp;</div>
            <div class="col s1">&nbsp;</div>
  
            <table>
        <thead>
          <tr>
              <th>Velocidad</th>
              <th>Logintud</th>
              <th>Latitud</th>
              <th>Hora</th>
              <th>Fecha</th>
              <th>Placa</th>

          </tr>
        </thead>
 
        <tbody>
          <tr>
            <td></td>
          
          </tr>
        </tbody>

      </table>
          </div>
        </div>
      </div>
    </div>
    

-->
  </main>

@stop 
@section('scripts')
{!!Html::script('js/dashboard/UsuarioConsultor/UsuarioConsultor.js')!!}

@endsection

