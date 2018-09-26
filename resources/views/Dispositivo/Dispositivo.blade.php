<div class="row">
    <div class="input-field col s6">
        <i class="material-icons prefix">call_to_action</i>
        <a class="waves-effect waves-light btn modal-trigger" href="#RegistrarDisp"><i class="material-icons right">add</i>Registrar Dispositivo</a>
        <div id="msPlaca"></div>
    </div>
</div>

<div id="RegistrarDisp" class="modal modal-fixed-footer">
    <div class="modal-content">
    <div class="row">
    <h4 class="center">Registrar Dispositivo</h4>
    {!!Form::open(['class'=>'RegisDisp'])!!}
        <div class="row">
        <input type = "hidden" name="_token" value="{{csrf_token()}}" id="tokenDispRegis">
        <div class="input-field col s6">
            <i class="material-icons prefix">call_to_action</i>
            {!!Form::text('placa',null,['class'=>' validate','id'=>'placa'])!!}
            {!!Form::label('Placa','Placa:')!!}
            <div id="msPlaca"></div>
        </div>
       
        </div>
        <div class="row">
        <div class="input-field col s12 center">
            {!!link_to('#', $title = 'Enviar', $attributes =  ['id'=>'RegistroDisp', 'class'=>'btn '], $secure = null);!!}
        </div>
        </div>                
        {!!Form::close()!!}
        </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
        </div>                   
            </div>
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
    <div id="Errordisp" class="modal">
    <div class="modal-content center">
      <h4>¡Ha ocorrido un problema!</h4>
      <i class="large  material-icons error-icons">error</i>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
