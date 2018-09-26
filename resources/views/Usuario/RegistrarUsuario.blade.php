              <!-- Modal Registro -->
              <div id="modal1" class="modal modal-fixed-footer">
                <div class="modal-content">
                <div class="row">
                <h4 class="center">Registrar Usuario</h4>
                {!!Form::open(['class'=>'registrar', 'id'=>'registrp'])!!}
                  <div class="row">
                  <input type = "hidden" name="_token" value="{{csrf_token()}}" id="tokenInser">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">contact_mail</i>
                      {!!Form::number('id',null,['class'=>' validate'])!!}
                      {!!Form::label('id','Cedula:')!!}
                      <div id="id"></div>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">credit_card</i>
                      {!!Form::text('name',null,['class'=>' validate'])!!}
                      {!!Form::label('name','Nombres:')!!}
                      <div id="name"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="material-icons prefix">credit_card</i>
                      {!!Form::text('Apellidos',null,['class'=>' validate'])!!}
                      {!!Form::label('Apellidos','Apellidos:')!!}
                      <div id="Apellidos"></div>
                    </div>
                    <div class="input-field col s6">
                      <i class="material-icons prefix">email</i>
                      {!!Form::email('email',null,['class'=>' validate'])!!}
                      {!!Form::label('email','Email:')!!}
                      <div id="email"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s4">
                      <i class="material-icons prefix">account_circle</i>
                     
                      <div id="password"></div>
                    </div>
                    <div class="input-field col s4">
                      <i class="material-icons prefix">account_circle</i>
                      {!!Form::text('Telefono',null,['class'=>' validate'])!!}
                      {!!Form::label('Telefono','Telefono:')!!}
                      <div id="Telefono"></div>
                    </div>
                    <div class="input-field col s4">
                        <select name="tusuario">
                          <option value="Consultor">Consultor</option>
                          <option value="Admin">Admin</option>
                          <option value="Policia">Policia</option>
                        </select>
                        <label>Tipo Usuario </label>
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
            

          