var rutaOculta = $("#rutaOculta").val();
$("#buttonFacebook").click(function(){

	FB.login(function(response){

		validarUsuario();
	},{scope: 'public_profile,email'})
});

function validarUsuario(){
	FB.getLoginStatus(function(response){
		statusChangeCallback(response);
	})
}

function statusChangeCallback(response){
	if (response.status === 'connected') {
		testApi();
	}else{
		Swal.fire({
			title: "!Error!",
			text: "Error al iniciar con facebook, vuelve a intentarlo",
			type: "error",
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
		},
		 function(isConfirm){

		 	if (isConfirm) {
		 		//window.location = localStorage.getItem("rutaActual");
		 	}
		 })
	}
}

function testApi(){
	FB.api('/me?fields=id,name,email', function(response){
		console.log(response);
		if (response.email == null) {
			Swal.fire({
             icon: 'error',
             title: 'Oops...',
             text: 'Se debe proporcionar el correo electronico'
         })
		}else{
			var email = response.email;
			var nombre = response.name;
			var idFacebook = response.id;
			//var foto = "https://graph.facebook.com/"+response.id+"/picture?type=large";
			var datos = new FormData();
			datos.append("idFacebook", idFacebook);
			datos.append("email", email);
			datos.append("nombre", nombre);
			//datos.append("foto", foto);

			$.ajax({
				url: rutaOculta+"ajax/usuarios.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					console.log(respuesta);
				} 
			});
		}
	})
}