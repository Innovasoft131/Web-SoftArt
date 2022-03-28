function registroUsuarios(){
    //validar nombre
     var nombre = $("#nombreCliente").val();
     console.log(nombre);
    if (nombre != "") {
        var expresion = /^[a-zA-ZñÑáéíóú ]*$/;
        console.log(expresion.test(nombre));
        if (!expresion.test(nombre)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El nombre no puedo llevar numeros y/o caracteres especiales!'
              });
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

