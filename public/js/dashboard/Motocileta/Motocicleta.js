$(document).ready(function(){
    MostrarMotos();

    OcultarOpcionesDeGrafica();
    $('.modal').modal();

    //Registrar Motocicleta
    $('#Registro').click(function(){
        RegistrarDispositivo();
        MostrarMotos();
    });

    //Editar Motocicleta
    $('#EditarM').click(function(){
        EditarMotocicleta();
        MostrarMotos();
    });

    $('.GraficarDatos').click(function(){
        MostrarGrafica();
    });

    //Obtener el valor del select que se seleccionó
    $("#infoselect").change(function(){ 
        MostrarMeses();
    });

    //Obtener el valor del select que se seleccionó
    $("#meselect").change(function(){ 
        MostrarDia();
    });

});
//Mostrar Motocicletas
function MostrarMotos(){

    var ruta ="Motocicleta";
    var token = $("#tokenMotoRegis").val();
    $("#tableMoto").empty();
      $.ajax({
          url: window.location.origin + "/Motocicleta/show/",
          type: 'get',
          headers: {"X-CSRF-TOKEN":token },
          dataType: 'json',
          data: {id:$('#iduser').val()},
      
          success : function(json) {
           
            $.each( json.moto, function( key, val ) {
                if(json.moto[key].Eliminado == 0 ){ 
                    $('.moto').append("<tr><td>"+json.moto[key].id+"</td> <td>"+json.moto[key].placa+"</td><td>"+json.moto[key].cilindrada+"</td><td>"+
                    json.moto[key].color+"</td>"+"<td>"+json.moto[key].dispositivos_id+"</td>"
                    +"<td>  <a class= 'btn waves-effect waves-light btn modal-trigger blue' onClick='Buscarmotocicleta("+json.moto[key].id+");' href='#ModalEditar'>  <i class='material-icons'>edit</i> </a></td>"+
                    "<td><a class='waves-effect waves-light btn red ' onClick='EliminarMotocicleta("+json.moto[key].id+");'><i class='material-icons'>delete</i></a></td>"+
                    "<td><a class='waves-effect waves-light btn green ' onClick='Graficar("+json.moto[key].dispositivos_id+");'><i class='material-icons'>trending_up</i></a></td> </tr>");
                }
            });
          },
          error : function(xhr, status) {
              $('#Error').modal('open');
            },
        });
    }

//Buscar motocicletas
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


  function EditarMotocicleta(){
    $('.Error-formulario').empty();
    var token = $("#tokEditMoto").val();
       $.ajax({
        url: window.location.origin + "/Motocicleta/update/",
        type: 'PUT',
        headers: {"X-CSRF-TOKEN":token },
        dataType: 'json',
        data:{
            id: $('#id').val(),
            placa: $('#placa').val(),
            cilindrada: $('#cilindrada').val(),
            color: $('#color').val(),
        },
        success : function(json) {
            $('#modalMenssaje').modal('open');
        },
        error : function(ms) {             
            if(ms.responseJSON.placa != null){
                $('#msPlacaEditar').html('<p class ="Error-formulario">'+ms.responseJSON.placa+'</p>');
            }
            if(ms.responseJSON.cilindrada != null){
                $('#msCilindradaEditar').html('<p class ="Error-formulario">'+ms.responseJSON.cilindrada+'</p>');
            }
            if(ms.responseJSON.color != null){
                $('#msColorEditar').html('<p class ="Error-formulario">'+ms.responseJSON.color+'</p>');
            }
            $('#Error').modal('open');
        },
        });
    }

    function RegistrarMotocicleta(){
        var ruta =window.location.origin +"/Motocicleta/";
        var token = $("#tokenMotoRegis").val();
        $('.Error-formulario').empty();
        $.ajax({
              url: ruta,
              type: 'POST',
              headers: {"X-CSRF-TOKEN":token },
              dataType: 'json',
              data:$('.RegisMoto').serialize(),
              
              success : function(json) {
                  
                if($('.Error-formulario').length == 0) {
                    $('.Error-formulario').remove();
                }
                $('#modalMenssaje').modal('open');
              },
              error : function(ms) {
                if(ms.responseJSON.placa != null){
                    $('#msPlaca').html('<p class ="Error-formulario">'+ms.responseJSON.placa+'</p>');
                }
                if(ms.responseJSON.cilindrada != null){
                    $('#msCilindrada').html('<p class ="Error-formulario">'+ms.responseJSON.cilindrada+'</p>');
                }
                if(ms.responseJSON.color != null){
                    $('#msColor').html('<p class ="Error-formulario">'+ms.responseJSON.color+'</p>');
                }
              },
          });
      }

    function RegistrarDispositivo(){
        var token = $("#tokenMotoRegis").val();
        var ruta =  window.location.origin +"/Dispositivo/";
        $.ajax({
              url: ruta,
              type: 'POST',
              headers: {"X-CSRF-TOKEN":token },
              dataType: 'json',
              data:{id:$('#idDisp').val()},
              
              success : function(json) {
                RegistrarMotocicleta();
                
                if($('.Error-formulario').length == 0) {
                    $('.Error-formulario').remove();
                }
              },
              error : function(ms) {
              
                if(ms.responseJSON.id != null){
                    $('#msidDisp').html('<p class ="Error-formulario">'+ms.responseJSON.id+'</p>');
                }
              },
          });
      }

        //Eliminar motocicletas
    function  EliminarMotocicleta(id){
        var identificador = id
        $('.modal').modal();
        var token = $("#tokenMotoRegis").val();
        $.ajax({
            url: window.location.origin + "/Motocicleta/destroy/",
            type: 'DELETE',
            headers: {"X-CSRF-TOKEN":token },
            dataType: 'json',
            data: {id:identificador},
            
            success : function(json) {
                MostrarMotos();
                $('#modalMenssaje').modal('open');
            },
            error : function(xhr, status) {
                $('#Error').modal('open');
            },
        });
    }


    function OcultarOpcionesDeGrafica(){
        $(".form-grafica").hide();
    }

    function MostrarOpcionesDeGrafica(){
        $(".form-grafica").show();
    }

    function ConsultarAnos(id){
        var identificador = id
        $('.modal').modal();
        $('#disp').val(id );
        
        var token = $("#tokenselet").val();
        $.ajax({
            url: window.location.origin + "/ConsultarAno/",
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

    
    function MostrarGrafica(){
        if($('#infoselect').val().length !=0  && $('#meselect').val().length==0 && $('#Diaselect').val().length==0 ){
            GraficaAno();
        }if($('#infoselect').val().length !=0  && $('#meselect').val().length!=0  && $('#Diaselect').val().length==0 ){
            GraficaMes();
        }
        if($('#infoselect').val().length !=0  && $('#meselect').val().length!=0  && $('#Diaselect').val().length!=0 ){
            GraficaDia();
        }
    }

    function Graficar(id){
        MostrarOpcionesDeGrafica();
        ConsultarAnos(id);
    } 

        function GraficaAno(){
            //pone el valot de id dispositivo al formulario
           var idisp = $('#disp').val();
           var Fecha = $('#infoselect').val();

           var dataLength = 0;
           var data = [];
     
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

    function MostrarMeses(ano){
        var ConsultaAno = ano;

        var token = $("#tokenselet").val();
        $( "#meselect" ).empty();

        $.ajax({
            url: window.location.origin + "/ConsultarMeses",
            type: 'post',
            headers: {"X-CSRF-TOKEN":token },
            dataType: 'json',
            data: {idDisp:$('#disp').val(), fecha: $('#infoselect').val()},
        
            success : function(json) {
                $('#meselect').append("<option   ></option>");

                $.each(json.datos, function( key, val ) {
                    $('#meselect').append("<option   value= '"+json.datos[key].ano+"'>"+json.datos[key].ano+"</option>");
                });
            },
    
            });
    }

    
    //Esta funcion muestra en el select los dias de un mes determinado
    function MostrarDia(ano){
        var ConsultaAno = ano;
        var token = $("#tokenselet").val();
        $( "#Diaselect" ).empty();
        $.ajax({
            url: window.location.origin + "/ConsultarDia",
            type: 'post',
            headers: {"X-CSRF-TOKEN":token },
            dataType: 'json',
            data: {idDisp:$('#disp').val(), fecha: $('#infoselect').val(), mes:  $('#meselect').val() },
        
            success : function(json) {
                $('#Diaselect').append("<option></option>");
                $.each(json.datos, function( key, val ) {
                    $('#Diaselect').append("<option value= '"+json.datos[key].Dia+"'>"+json.datos[key].Dia+"</option>");
                });
            },
    
            });
    }


    //Grafica los promedios de los dias de un mes determinado 
    function GraficaMes(){
        
       var idDisp = $('#disp').val();
       var fecha = $('#infoselect').val();
       var mes = $('#meselect').val();

       var dataLength = 0;
       var data = [];
       
        $.getJSON("/ConsultarDias/"+idDisp+"/"+fecha+"/"+mes, function (result) {
            if (dataLength !== result.length) {
                for (var i = dataLength; i < result.length; i++) {
                    data.push({ 
                        x: new Date(2018,mes, String(result[i].valorx)), 
                        y: Math.floor(result[i].valory) 
                    });
                }
                dataLength = result.length;
                chart.render();
            }
        });

       var chart = new CanvasJS.Chart("chart",
       {
           title: {
               text: "Promedio De Velocidades Por Dia"               
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

    //Grafica los promedios de los dias de un mes determinado 
    function GraficaDia(){
        
        var idDisp = $('#disp').val();
        var fecha = $('#infoselect').val();
        var mes = $('#meselect').val();
        var dia = $('#Diaselect').val();
        var dataLength = 0;
        var data = [];

        function Convertir(Dato){
            if (Dato<=9 ){
                var Dato = "0"+Dato;
            }else{

            }
            return Dato;
        }

        $.getJSON("/ConsultarHoras/"+idDisp+"/"+fecha+"/"+mes+"/"+dia, function (result) {
            if (dataLength !== result.length) {
                var mapa =initMap();
                for (var i = dataLength; i < result.length; i++) {
                    var datos = fecha+"-"+Convertir(mes)+"-"+Convertir(dia)+"T"+result[i].valorx+"Z"; 
                    data.push({ 
                        x: new Date(datos), 
                        y: Math.floor(result[i].valory) 
                    });
                    alert("latitud "+result[i].latitud+" Lomgitud "+result[i].Longitud);
                        var marker = new google.maps.Marker({
                        position: {lat: result[i].latitud, lng: result[i].Longitud},
                        map: mapa,
                        }); 
                }
                dataLength = result.length;
                chart.render();
            }
        });
        

        var chart = new CanvasJS.Chart("chart",
        {
            title: {
                text: "Promedio De Velocidades Por Dia"               
            },
            zoomEnabled: true,
            exportEnabled: true, 
            axisX:{
                title: "Hora",
                intervalType: "hour",        
                valueFormatString: "hh TT", 
                labelAngle: -20
            },
            axisY: {
                title: "Velocidad",
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

 function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: {lat:  8.7479800, lng: -75.8814300}
    });
    return map;
}    

function OcultarOpcionesDeGrafica(){
    $(".form-grafica").hide();
}
function MostrarOpcionesDeGrafica(){
    $(".form-grafica").show();
}
