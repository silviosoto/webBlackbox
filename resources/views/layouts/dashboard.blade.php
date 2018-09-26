<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard </title>
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/font/material-design-icons/Material-Design-Icons.woff'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="{{asset('css/dashboard/style.css')}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>
  

<body>
  <ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
      <div class=" darken-2 white-text color-lateral" style="height: 180px;">
        <div class="row">
          <img style="margin-top: 5%;" width="100" height="100" src="{{asset('img/box-white.png')}}" class="circle responsive-img" />

          <p style="margin-top: -13%;">
           BlackBox
          </p>
        </div>
      </div>
    </li>
    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Gestión Usuarios</b></div>
        <div id="dash_users_body" class="collapsible-body">
          <ul>
            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="{!!url('/Usuarios')!!}">Usuarios</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </ul>
  <header>
    <ul class="dropdown-content" id="user_dropdown">
      {!!link_to('CerrarSesion', $title = 'Cerrar Sesión', $attributes =  [ 'class'=>'indigo-text'], $secure = null);!!}
    </ul>
    <nav class="indigo" role="navigation">
      <div class="nav-wrapper color-lateral">

        <ul class="right hide-on-med-and-down">
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>

     @yield('nav')

  </header>
  @if (Auth::user()->rol == 'Admin' )
    @yield('content')
  @else
    <a class="waves-effect" style="text-decoration: none;" href="{!!url('/Usuarios')!!}">Usuarios</a>
  @endif

  <footer class=" color-lateral page-footer">
    <div class="footer-copyright">
      <div class="container">
         <span>Desarrollado Por <a style='font-weight: bold;' href="" target="_blank">BlackBox</a></span>
      </div>
    </div>
  </footer>
</body>
</html>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
@section('scripts')
@show
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOcSvvnY4fUWQY_bayOtegT-JakI7N2kA">
    </script>
<script type="text/javascript" src="{{asset('js/canvasjs.min.js')}}"></script>
</body>
</html>
