 <!-- Modal Editar -->
 <div id="modalEditar" class="modal modal-fixed-footer">
                <div class="modal-content">
                <div class="row">

                
          <h4 class="center">Editar Usuario</h4>
                {!!Form::open(['class'=>'EditarFormulario}'])!!}
                  <div class="row">
                  <input type = "hidden" name="_token" value="{{csrf_token()}}" id="tokenBuscar">
                  {!!Form::hidden('cc',null,['id'=>'cc'])!!}
                    <div class="input-field col s6">
                      <i class="material-icons prefix">contact_mail</i>
                      {!!Form::number('id',null,['class'=>' validate', 'id'=>'id'])!!}
                      {!!Form::label('id','Cedula:')!!}
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">credit_card</i>
                      {!!Form::text('name',null,['class'=>' validate','id'=>'name'])!!}
                      {!!Form::label('name','Nombres:')!!}
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">credit_card</i>
                      {!!Form::text('Apellidos',null,['class'=>' validate'])!!}
                      {!!Form::label('Apellidos','Apellidos:')!!}
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">email</i>
                      {!!Form::email('email',null,['class'=>' validate'])!!}
                      {!!Form::label('email','Email:')!!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">account_circle</i>
                      {!!Form::text('Telefono',null,['class'=>' validate'])!!}
                      {!!Form::label('Telefono','Telefono:')!!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 center">
                      {!!link_to('#', $title = 'Enviar', $attributes =  ['id'=>'EditarUsuario', 'class'=>'btn '], $secure = null);!!}
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
            <div class="col s4">&nbsp;</div>       
          </div>
        </div>
      </div>
    </div>