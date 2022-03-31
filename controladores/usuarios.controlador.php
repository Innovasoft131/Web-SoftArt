<?php 
	class ControladorUsuarios{

		public function ctrRegistroUsuario(){
			
			if (isset($_POST['nombreCliente'])) {
				if (preg_match('/^[a-zA-ZñÑáéíóú ]*$/', $_POST['nombreCliente']) && 
				    preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['correoCliente'])) {
						$hash = crypt($_POST["passwordCliente"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
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
                        
						if ($respuesta == "ok") {
								
							echo '<script>

							Swal.fire({
		
								icon: "success",
								title: "¡Por favor revice su bandeja de entrada del correo utilizado para confirmar cuenta!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
		
							}).then(function(result){
		
								if(result.value){
								
									window.location = "login";
		
								}
		
							});
						
		
							</script>';
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
		/*=============================================
	       MOSTRAR USUARIO
	     =============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	      INGRESO USUARIO
	     =============================================*/

		 static public function ctrIngresoUsuario(){

			if (isset($_POST['ingCorreo'])) {
				if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['ingCorreo'])){
					$encrypt = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					$tabla = "clientes";
					$item = "correo";
					$valor = $_POST['ingCorreo'];
					$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);
			
					if ($respuesta['correo'] == $_POST['ingCorreo'] && $respuesta['password'] == $encrypt ) {
						if ($respuesta['verificacion']== 1) {
							echo "<script>
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Aun no verifica su cuenta, por favor revise su correo!',
								}),
								function(isConfirm){
									if(isConfirm){
										history.back();
									}
								}
								</script>";
						}else{
							$_SESSION['validarSesion'] = "ok";
							$_SESSION['id'] = $respuesta['id'];
							$_SESSION['nombre'] = $respuesta['nombre'];
							$_SESSION['email'] = $respuesta['correo'];
							$_SESSION['password'] = $respuesta['password'];
							$_SESSION['modo'] = $respuesta['modo'];

							echo '<script>
							 window.location="inicio";
							</script>';
						}
					}else{
						echo "<script>
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Datos Incorrectos, Error al ingresar!',
					  }),
					  function(isConfirm){
						  if(isConfirm){
							history.back();
						  }
					  }
					</script>";
					}
				}else{

				}
			}
	
		}
	}
?>