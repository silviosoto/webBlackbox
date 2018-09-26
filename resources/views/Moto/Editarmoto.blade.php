
         <!-- Modal Editar motocicleta -->
   <div id="ModalEditar" class="modal modal-fixed-footer">
                <div class="modal-content">
                <div class="row">
                <h4 class="center">Editar Motocicleta</h4>
                {!!Form::open(['route' => 'Motocicleta.store','class'=>'MotoEditar'])!!}
                  <div class="row">
                  <input type = "hidden" name="_token" value="{{csrf_token()}}" id="tokEditMoto">
                  {!!Form::hidden('idAux',$Usuario->id,['class'=>' validate','id'=>'id'])!!}
                    
                    <div class="input-field col s6">
                      <i class="material-icons prefix">call_to_action</i>
                      {!!Form::text('placa',null,['class'=>' validate','id'=>'placa'])!!}
                      {!!Form::label('Placa','Placa:')!!}
                      <div id="msPlacaEditar"></div>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">motorcycle</i>
                      {!!Form::number('cilindrada',null,['class'=>' validate','id'=>'cilindrada'])!!}
                      {!!Form::label('name','cilindrada:')!!}
                      <div id="msCilindradaEditar"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">color_lens</i>
                      {!!Form::text('color',null,['class'=>' validate','id'=>'color'])!!}
                      {!!Form::label('Apellidos','color:')!!}
                      <div id="msColorEditar"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12 center">
                      {!!link_to('#', $title = 'Enviar', $attributes =  ['id'=>'EditarM', 'class'=>'btn '], $secure = null);!!}
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
 