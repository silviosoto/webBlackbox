
$(document).ready(function(){
    $('.modal').modal();

    $('.Editar').click(function(){
        
        var ruta = window.location.origin +  "/UsuarioBuscar";
        var token = $("#tokenBuscar").val();

        $.ajax({
            url: ruta,
            type: 'POST',
            headers: {"X-CSRF-TOKEN":token },
            dataType: 'json',
            data: {id:$(this).attr("id")},
            
            success : function(json) {
        
                $('#cc').val(json.usuario.id);
                $('#id').val(json.usuario.id);
                $('#name').val(json.usuario.name);
                $('#Apellidos').val(json.usuario.Apellidos);
                $('#email').val(json.usuario.email);
                $('#password').val(json.usuario.password);
                $('#Telefono').val(json.usuario.Telefono);
            },
            error : function(xhr, status) {
                $('#Error').modal('open');
            },
        });
    });
  });
      