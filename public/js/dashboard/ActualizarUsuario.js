$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('#EditarUsuario').click(function(){
      
        var ruta = "http://localhost:8000/UsuarioEditar";
        var token = $("#tokenBuscar").val();
       
        $.ajax({
            url: ruta,
            type: 'POST',
            headers: {"X-CSRF-TOKEN":token },
            dataType: 'json',
            data:{
                cc: $('#cc').val(),
                id: $('#id').val(),
                name: $('#name').val(),
                Apellidos: $('#Apellidos').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                Telefono: $('#Telefono').val(),
            },
            success : function(json) {
                 $('#modalMenssaje').modal('open');
            },
            error : function(xhr, status) {
                $('#Error').modal('open');
            },
        });
    });
  });
      