
//formatear los input
$("input").focus(function(){
    $(".correoExist").remove();
})
//registro de usuario repetido
var validarCorreoRepetido = false;
var rutaOculta = $('#rutaOculta').val();

$('#correoCliente').change(function(){
    var email = $('#correoCliente').val();
    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({
        url: rutaOculta+"ajax/usuarios.ajax.php",
        method: "post",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            console.log("respuesta", respuesta);
            if (respuesta == "false") {
                $(".correoExist").remove();
                validarCorreoRepetido = false;
            }else{
                $('#correoCliente').after("<div class='correoExist'>El correo ya existe</div>");
                validarCorreoRepetido = true;
            }
        }
    })
});

function registroUsuarios(){
    //validar nombre
     var nombre = $("#nombreCliente").val();
     console.log(nombre);
    if (nombre != "") {
        var expresion = /^[a-zA-ZñÑáéíóú ]*$/;
        console.log(expresion.test(nombre));
        if (!expresion.test(nombre)) {
            $('#nombreCliente').after("<div class='correoExist'>Nombre sin numero y/o caracteres alfanumericos</div>");
              return false;
        }
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre es obligatorio!'
          });
          return false;
    }
    //validar email
    var correo = $("#correoCliente").val();
    
   if (correo != "") {
       var expresionCorreo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
       console.log(expresionCorreo.test(correo));
       if (!expresionCorreo.test(correo)) {
           Swal.fire({
               icon: 'error',
               title: 'Oops...',
               text: 'Escriba correctamente el correo electronico!'
             });
             return false;
       }
       if (validarCorreoRepetido) {
        $('#correoCliente').after("<div class='correoExist'><h3>El correo ya existe, por favor ingrese otro</h3></div>");
        return false;
       }
   } else {
       Swal.fire({
           icon: 'error',
           title: 'Oops...',
           text: 'El correo es obligatorio!'
         });
         return false;
   }
    return true;
}


