$(document).ready(function(){
    OcultarOpcionesDeGrafica()
    MostrarMotos();
    $('select').material_select();
    $('.Graficar').click(function(){
        GraficaMeses($('#infoselect').val(), $('#disp').val());
    });   
    
    initMap();      
});

function MostrarMotos(){

    var ruta ="Motocicleta";
    var token = $("#tokenMotoRegis").val();
    $("#tableMoto").empty();
      $.ajax({
          url: window.location.origin + "/Motocicleta/show/",
          type: 'get',
          headers: {"X-CSRF-TOKEN":token },
          dataType: 'json',
          data: {id:$('.idUsuario').attr('id')},
      
          success : function(json) {
           
            $.each( json.moto, function( key, val ) {
                if(json.moto[key].Eliminado == 0 ){ 
                    $('.moto').append("<tr><td>"+json.moto[key].id+"</td> <td>"+json.moto[key].placa+"</td><td>"+json.moto[key].cilindrada+"</td><td>"+
                    json.moto[key].color+"</td><td class="+json.moto[key].dispositivos_id+">"+json.moto[key].dispositivos_id+"</td>"+
                    "<td><a class='waves-effect waves-light btn green ' onClick='Estadisticas("+json.moto[key].dispositivos_id+")' ><i class='material-icons'>trending_up</i></a></td> </tr>");
                }
            });
          
          },
          error : function(xhr, status) {
              $('#Error').modal('open');
            },
        });
    }
    function Estadisticas(idDisp){

        llenarselect(13);
        MostrarOpcionesDeGrafica();
    }

    function BitacoraHora(){
        var dataLength = 0;
        var data = [];
        var updateInterval = 500;
        updateChart();
        
        function updateChart() {
            
            $.getJSON("/bitacora/create", function (result) {
                if (dataLength !== result.length) {
                    for (var i = dataLength; i < result.length; i++) {
                        data.push({
                            x: new Date("July 21, 1983 "+String(result[i].valorx)),
                            y: result[i].valory
                        });
          
                    }
                    dataLength = result.length;
                    chart.render();
                   
                }
            });
        }
    
        var chart = new CanvasJS.Chart("chart",
    {
      title:{
        text: "Converting in Local Time"
      },
      zoomEnabled: true,
      exportEnabled: true, 
      axisX:{
        title: "Hora",
        gridThickness: 2,
        interval:1, 
        intervalType: "hour",        
        valueFormatString: "hh:mm:ss TT", 
        labelAngle: -20
      },
      axisY:{
        title: "Velocidad"
      },
      data: [
      {        
        type: "area",
        color: "#6DCFF6",
        fillOpacity: .3,
        dataPoints: data
      }
      ]
    });
    
        setInterval(function () {
            updateChart()
        }, updateInterval);
    
        }

        function  Buscarmotocicleta(id){
            var identificador = id
            $('.modal').modal();
            var token = $("#tokenMotoRegis").val();
            $.ajax({
                url: window.location.origin + "/BuscarMotocicleta/",
                type: 'POST',
                headers: {"X-CSRF-TOKEN":token },
                dataType: 'json',
                data: {id:identificador},
                
                success : function(json) {
                    $('#id').val(json.Moto.id);
                    $('#placa').val(json.Moto.placa);
                    $('#cilindrada').val(json.Moto.cilindrada);
                    $('#color').val(json.Moto.color);
                },
                error : function(xhr, status) {
                    $('#Error').modal('open');
                },
            });
          }

        function GraficaMeses(Fecha, idisp){
             //pone el valot de id dispositivo al formulario
            $('#disp').val(idisp );

            var dataLength = 0;
            var data = [];
            var updateInterval = 500*10;
            updateChart();
            

            function updateChart() {
                
                $.getJSON("/Bitacoraconsultor/"+Fecha+"/"+idisp, function (result) {
                    if (dataLength !== result.length) {
                        for (var i = dataLength; i < result.length; i++) {
                            data.push({ 
                                x: new Date(2018,String(result[i].valorx), 00 ), 
                                y: Math.floor(result[i].valory) 
                            });
                        }
                        dataLength = result.length;
                        chart.render();
                    }
                });
            }


            var chart = new CanvasJS.Chart("chart",
            {
                title: {
                    text: "Promedio De Velocidades Por Mes"               
                },
                axisX:{      
                    labelFormatter: function (e) {
                        return CanvasJS.formatDate( e.value, "DD MMM");
                    },
                },
                axisY: {
                  valueFormatString: "#,###"
              },
              data: [
              {        
                type: "line", 
                color: "rgba(0,75,141,0.7)",
                dataPoints: data
            }
            ]
        });
    }
    
    function  llenarselect(id){
        var identificador = id
        $('.modal').modal();
        $('#disp').val(id );
        
        var token = $("#tokenselet").val();
        $.ajax({
            url: window.location.origin + "/GraficaAno/",
            type: 'POST',
            headers: {"X-CSRF-TOKEN":token },
            dataType: 'json',
            data: {id:identificador},
            success : function(json) {
                $.each(json.datos, function( key, val ) {
                    $('#infoselect').append("<option value= '"+json.datos[0].ano+"'>"+json.datos[0].ano+"</option>");
                });
            },
            error : function(xhr, status) {
                $('#Error').modal('open');
            },
        });
    }

     
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat:  8.7479800, lng: -75.8814300}
        });
        setMarkers(map);
    }    

    var beaches = [
        ['Bondi Beach',8.741808, -75.875614, 4],
        ['Coogee Beach', 8.734149, -75.873318, 5],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
      ];
      
    function setMarkers(map) {
        for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            map: map,
          });
        }
      }

    function OcultarOpcionesDeGrafica(){
        $(".form-grafica").hide();
    }
    function MostrarOpcionesDeGrafica(){
        $(".form-grafica").show();
    }
