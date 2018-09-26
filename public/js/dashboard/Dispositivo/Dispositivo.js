$(document).ready(function(){

    $('.modal').modal();

    //Registrar Motocicleta
    $('#RegistroDisp').click(function(){
        RegistrarDispositivo();
      
    });
});

  function RegistrarDispositivo(){
    var token = $("#tokenDispRegis").val();
    var ruta =  window.location.origin +"/Dispositivo/";
    $.ajax({
          url: ruta,
          type: 'POST',
          headers: {"X-CSRF-TOKEN":token },
          dataType: 'json',
          data:$('.RegisDisp').serialize(),
          
          success : function(json) {
              $('#modalMenssaje').modal('open');
          },
          error : function(ms) {
            $('#Errordisp').modal('open');
          },
      });
  }

  function Graficar(){

    

    }


 