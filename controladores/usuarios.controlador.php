<?php 
	class ControladorUsuarios{

		public function ctrRegistroUsuario(){
			
			if (isset($_POST['nombreCliente'])) {
				if (preg_match('/^[a-zA-ZñÑáéíóú ]*$/', $_POST['nombreCliente']) && 
				    preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['correoCliente'])) {
						$hash = password_hash($_POST["passwordCliente"], PASSWORD_DEFAULT, [15]);
						$datos = array(
							"nombre"=> $_POST['nombreCliente'],
							"correo"=> $_POST['correoCliente'],
							"password"=> $hash,
							"usuario"=> $_POST['usuarioCliente'],
							"modo"=> "directo",
							"verificacion"=> 1,
						);

						$tabla = "clientes";

						$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);
                         var_dump($respuesta);
						if ($respuesta == "Ok") {
							 echo "<script>
							 Swal.fire({
								position: 'top-end',
								icon: 'success',
								title: 'Your work has been saved',
								showConfirmButton: false,
								timer: 1500
							  })
					  }
					</script>";
						}
				}else{
					echo "<script>
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Datos Incorrectos!',
					  }),
					  function(isConfirm){
						  if(isConfirm){
							history.back();
						  }
					  }
					</script>";
				
				}
			}
		}
	}
?>