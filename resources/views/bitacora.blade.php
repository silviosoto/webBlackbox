    <div class="row">
      <div class="col s12">
        <div style="padding: 35px;" align="center" class="card grafica">
          <div class="row">
            <div class="left card-title">
              <b>Grafica</b>
            </div>
            <div class="row">
             {!!Form::open(['class'=>'col s12 from-fechas'])!!}
              <input type = "hidden" name="token" value="{{csrf_token()}}" id="tokenselet">
              <input type = "hidden" name="disp" value="" id="disp">
                <div class="row form-grafica">
                  <div class="col s3">
                  <label>Selecciona el año</label>
                    <select class="browser-default" id= "infoselect">
                    <option value=""></option>
                    </select>
                  </div>
                  <div class=" col s3">
                    <label>Seleccione el mes</label>
                      <select name="mes" class="browser-default" id= "meselect">
                      <option value=""></option>
                      </select>
                    </div>
                    <div class=" col s3">
                    <label>Seleccione el Dia</label>
                      <select name="mes" class="browser-default" id= "Diaselect">
                      <option value=""></option>
                      </select>
                    </div>
                  <div class="input-field col s3">
                    <a  class="btn GraficarDatos" > Graficar</a> 
                  </div>
                </div>
                {!!Form::close()!!}
              </div>
          </div>
          <div class="row">
            <!--Grafica-->
            <div id="chart" >
            </div>
          </div>
        </div>
      </div>
    </div> 
   
    <div class="row">
      <div class="col s12">
        <div style="padding: 5px;" align="center" class="card grafica">
          <div class="row">
            <div class="left card-title">
              <b style="    padding-left: 35px;">Mapa</b>
            </div>
               <!--Mapa-->
            <div id="map">
       
            </div>
          </div>
        </div>
      </div>
    </div> 
