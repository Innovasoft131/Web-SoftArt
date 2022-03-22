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
	FB.api('/me?fields=id,name,mail,picture', function(response){
		console.log(response);
		if (response.email == null) {
			Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
		}else{
			var email = response.mail;
			console.log(email);
			var nombre = response.name;
			console.log(nombre);
			var foto = "https://graph.facebook.com/"+response.id+"/picture?type=large";
			console.log(foto);
			var datos = new FormData();

			datos.append("email", email);
			datos.append("nombre", nombre);
			datos.append("foto", foto);
		}
	})
}