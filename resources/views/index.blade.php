@extends('layouts.principal')

@section('content')
<nav>
    <div class="nav-wrapper color-lateral" style ="background-color:#3f51b5">
      <a href="#!" class="brand-logo center">BlackBox</a>
      <ul class="left hide-on-med-and-down">
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="section"></div>
    <main>
    <center>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
        <i class=" large material-icons">account_circle</i>
        {!!Form::open(['route'=>'login.store', 'method'=>'POST'])!!}
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
              {!!Form::label('correo','Correo:')!!}	
						  {!!Form::email('email',null,['class'=>' validate', 'placeholder'=>'Ingresa tu correo'])!!}
              {!! $errors->first('email','<span class=" helper-text font-red" data-error="wrong" data-success="right">:message</span>') !!}
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
              {!!Form::label('contrasena','Contraseña:')!!}	
			      	{!!Form::password('password',['class'=>' validate', 'placeholder'=>'Ingresa tu contraseña'])!!}
              {!! $errors->first('password',' <span class="helper-text font-red" data-error="wrong" data-success="right">:message</span>') !!}
              </div>
              <label style='float: right;'>				
			</label>
            </div>
            <br />
            <center>
              <div class='row'>
                {!!Form::submit('Iniciar',['class'=>'col s12 btn font-white btn-large  blue  '])!!}
              </div>
            </center>
          {!!Form::close()!!}
        </div>
      </div>
    </center>
 
        </main>
</div>

  <footer class="page-footer color-lateral" >
      <div class="footer-copyright">
        <div class="container">

        <a class="grey-text text-lighten-4 right" href="#!">Mas Información</a>
        </div>
      </div>
    </footer>
@stop