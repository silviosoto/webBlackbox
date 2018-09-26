$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();

    $('select').material_select();
    
    $('#Registro').click(function(){
        CrearUsuario();
    });

    $('.Eliminar').click(function(){
       
    var ruta =  window.location.origin +"/UsuarioEliminar";
    var token = $("#tokenlist").val();
    $.ajax({
        url: ruta,
        type: 'post',
        headers: {"X-CSRF-TOKEN":token },
        dataType: 'json',
        data: {id:$(this).attr("id")},
        
        success : function(json) {
            $('#modalMenssaje').modal('open');
        },
        error : function(xhr, status) {
            $('#Error').modal('open');
        },
    });
    });

  });
      
function CrearUsuario(){

    var ruta = window.location.origin +"/UsuariosInsert";
    var token = $("#tokenInser").val();

    $.ajax({
        url: ruta,
        type: 'POST',
        headers: {"X-CSRF-TOKEN":token },
        dataType: 'json',
        data:$('.registrar').serialize(),
        success : function(json) {
            $('#modalMenssaje').modal('open');
        },
        error : function(ms) {
            
            console.log(ms.responseJSON.id);
            
            if(ms.responseJSON.id != null){
                $('#id').html('<p class ="Error-formulario">'+ms.responseJSON.id+'</p>');
            }
            if(ms.responseJSON.name != null){
                $('#name').html('<p class ="Error-formulario">'+ms.responseJSON.name+'</p>');
            }
            if(ms.responseJSON.Apellidos != null){
                $('#Apellidos').html('<p class ="Error-formulario">'+ms.responseJSON.Apellidos+'</p>');
            }
            if(ms.responseJSON.email != null){
                $('#email').html('<p class ="Error-formulario">'+ms.responseJSON.email+'</p>');
            }
            if(ms.responseJSON.password != null){
                $('#password').html('<p class ="Error-formulario">'+ms.responseJSON.password+'</p>');
            }
            if(ms.responseJSON.Telefono != null){
                $('#Telefono').html('<p class ="Error-formulario">'+ms.responseJSON.Telefono+'</p>');
            }
            if(ms.responseJSON.rol != null){
                $('#Telefono').html('<p class ="Error-formulario">'+ms.responseJSON.tusuario+'</p>');
            }
          },
    });
}

    
function ListarUsuarios(){

    var ruta = window.location.origin +"/ListarUsuario";
    var token = $("#tokenInser").val();

    $.ajax({
        url: ruta,
        type: 'GET',
        headers: {"X-CSRF-TOKEN":token },
        dataType: 'json',
        success : function(json) {
           console.log(json);
           $.each(json.datos, function( key, val ) {
             $('#meselect').append("<option   value= '"+json.datos[key].ano+"'>"+json.datos[key].ano+"</option>");
            });

        },
        error : function(ms) {
            
            
        },
    });
}



