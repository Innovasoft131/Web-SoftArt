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
	FB.api('/me?fields=id,name,email,first_name', function(response){
		
		if (response.email == null) {
			Swal.fire({
             icon: 'error',
             title: 'Oops...',
             text: 'Se debe proporcionar el correo electronico'
         })
		}else{
			var email = response.email;
			var nombre = response.name;
			var usuario = response.first_name;
			var datos = new FormData();
			datos.append("correo", email);
			datos.append("nombre", nombre);
			datos.append("usuario", usuario);

			$.ajax({
				url: rutaOculta+"ajax/usuarios.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				success: function(respuesta){
					console.log("res",respuesta);
				 if (respuesta == "ok") {
					 window.location = "inicio";
				 }else{
					Swal.fire({
						title: "!Error!",
						text: "El correo ya se encuentra registrado con un metodo diferente",
						type: "error",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
					},
					 function(isConfirm){
			
						 if (isConfirm) {
							 FB.getLoginStatus(function(response){
								if (response.status == "connected") {
									FB.logout(function(response){
										deleteCookie("fblo_307504983059062");
										setTimeout(function(){

											window.location=rutaOculta+"salir";

										},500)
									});
									function deleteCookie(name){
										document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
									}
								}
							 })
						 }
					 })
				 }
				} 
			});
		}
	})
}