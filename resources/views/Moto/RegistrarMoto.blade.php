<!-- Modal Registrar motocicleta -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
    <div class="row">
    
    <h4 class="center">Registrar Motocicleta</h4>

    {!!Form::open(['route' => 'Motocicleta.store','class'=>'RegisMoto'])!!}
        <div class="row">
        <input type = "hidden" name="_token" value="{{csrf_token()}}" id="tokenMotoRegis">
        {!!Form::hidden('iduser',$Usuario->id,['class'=>' validate','id'=>'iduser'])!!}

        <div class="input-field col s6">
            <i class="material-icons prefix">call_to_action</i>
            {!!Form::text('placa',null,['class'=>' validate','id'=>'placa'] )!!}
            {!!Form::label('Placa','Placa:')!!}
            <div id="msPlaca"></div>
        </div>
        <div class="input-field col s6">
            <i class="material-icons prefix">motorcycle</i>
            {!!Form::number('cilindrada',null,['class'=>' validate','id'=>'cilindrada', 'min'=>'1'])!!}
            {!!Form::label('name','cilindrada:')!!}
            <div id="msCilindrada"></div>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">color_lens</i>
            {!!Form::text('color',null,['class'=>' validate','id'=>'color'])!!}
            {!!Form::label('Apellidos','color:')!!}
            <div id="msColor" ></div>
        </div>
        <div class="input-field col s6">
            <i class="material-icons prefix">color_lens</i>
            {!!Form::number('idDisp',null,['class'=>' validate','id'=>'idDisp','min'=>'1', 'max'=>'999' ])!!}
            {!!Form::label('idDisp','Id Dispositivo:')!!}
            <div id="msidDisp" ></div>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12 center">
            {!!link_to('#', $title = 'Enviar', $attributes =  ['id'=>'Registro', 'class'=>'btn '], $secure = null);!!}
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

