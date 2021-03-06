<?php
class ControladorUsuarios
{

	public function ctrRegistroUsuario()
	{

		if (isset($_POST['nombreCliente'])) {
			if (
				preg_match('/^[a-zA-ZñÑáéíóú ]*$/', $_POST['nombreCliente']) &&
				preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['correoCliente'])
			) {
				$hash = crypt($_POST["passwordCliente"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$correoEncrip = md5($_POST['correoCliente']);
				$datos = array(
					"nombre" => $_POST['nombreCliente'],
					"correo" => $_POST['correoCliente'],
					"password" => $hash,
					"usuario" => $_POST['usuarioCliente'],
					"modo" => "directo",
					"verificacion" => 1,
					"correoencriptado" => $correoEncrip
				);

				$tabla = "clientes";

				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

				if ($respuesta == "ok") {
					/*=============================================
	                          VERIFICACION DE CORREO ELECTRONICO
	                        =============================================*/
	            try {
	            $mail = new PHPMailer();
					//Server settings
					$url = Ruta::ctrRutaWeb();
					$mail->SMTPDebug = 0;
					$mail->isSMTP();
					$mail->Host       = 'euro-latina.com.mx';
					$mail->SMTPAuth   = true;
					$mail->Username   = 'softart@euro-latina.com.mx';
					$mail->Password   = 'softart_2022';
					$mail->SMTPSecure = 'ssl';
					$mail->Port       = 465;
					$mail->setFrom('softart@euro-latina.com.mx', 'SoftArt');
					$mail->Subject = "Por favor verifique su direccion de correro electronico SoftArt";
					$mail->addAddress($_POST['correoCliente']);

					$mail->msgHTML(
						'<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
							          <center>
								         <img style="padding:20px; width:10%" src="">
							           </center>
						
								<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
									<center>
									<img style="padding:20px; width:15%" src="https://png.pngtree.com/png-vector/20190826/ourlarge/pngtree-email-png-image_1697542.jpg">
									<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
									<hr style="border:1px solid #ccc; width:80%">
									<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta en SoftArt, debe confirmar su dirección de correo electrónico</h4>
									<a href="' . $url . '/verificar/' . $correoEncrip . '" target="_blank" style="text-decoration:none">
									<div style="line-height:60px; background:#0aa; width:60%; color:white">Verifique su dirección de correo electrónico</div>
									</a>
									<br>
									<hr style="border:1px solid #ccc; width:80%">
									<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>
								</center>
						
							</div>
						
						</div>'
					);

					$mail->Send();

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
	            	
	            } catch (Exception $e) {
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
	}
	/*=============================================
	       MOSTRAR USUARIO
	     =============================================*/

	static public function ctrMostrarUsuario($item, $valor)
	{

		$tabla = "clientes";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	       ACTUALIZAR USUARIO
	     =============================================*/
	static public function ctrActualizarCliente($id, $item, $valor)
	{
		$tabla = "clientes";
		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	      INGRESO USUARIO
	     =============================================*/

	static public function ctrIngresoUsuario()
	{

		if (isset($_POST['ingCorreo'])) {
			if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['ingCorreo'])) {
				$encrypt = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$tabla = "clientes";
				$item = "correo";
				$valor = $_POST['ingCorreo'];
				$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

				if ($respuesta['correo'] == $_POST['ingCorreo'] && $respuesta['password'] == $encrypt) {
					if ($respuesta['verificacion'] == 1) {
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
					} else {

                    //var_dump($_POST["g-recaptcha-response"]);
					/*	if (isset($_POST["g-recaptcha-response"])) {
							$secret = "6Ld8BW0fAAAAADe2gJNV1Vyz9qs24xzBxDgfeKXh";
							$response = $_POST['g-recaptcha-response'];
							$remoteip = $_SERVER['REMOTE_ADDR'];
							$result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
							$array = json_decode($result, TRUE);

							if ($array['success']) {
                    */
								session_start();
								$_SESSION['validarSesion'] = "ok";
								$_SESSION['id'] = $respuesta['id'];
								$_SESSION['nombre'] = $respuesta['nombre'];
								$_SESSION['usuario'] = $respuesta['usuario'];
								$_SESSION['email'] = $respuesta['correo'];
								$_SESSION['password'] = $respuesta['password'];
								$_SESSION['modo'] = $respuesta['modo'];

								echo "<script>
							        window.location='inicio';
							      </script>";
						/*	}
						} else {
							echo "<script>
					         Swal.fire({
						         icon: 'error',
					         	title: 'Oops...',
						         text: 'Error al ingresar, debe comprobar que no es un robot!',
					          }),
					         function(isConfirm){
						         if(isConfirm){
							        history.back();
						         }
					         }
					        </script>";
						}*/
					}
				} else {
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
			} else {
			}
		}
	}
	/*=============================================
	      Reestablecer Contraseña
	     =============================================*/

	public function ctrOlvidoPassword()
	{
		if (isset($_POST['correoRecuperar'])) {

			if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['correoRecuperar'])) {
				/*=============================================
	                     Generar Contraseña aleatoria
	                   =============================================*/
				function generarPassword($longitud)
				{
					$key = "";
					$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
					$max = strlen($pattern) - 1;
					for ($i = 0; $i < $longitud; $i++) {
						$key .= $pattern{
						mt_rand(0, 10)};
					}
					return $key;
				}
				$nuevaPassword = generarPassword(11);
				$encryptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$tabla = "clientes";
				$item1 = "correo";
				$valor1 = $_POST['correoRecuperar'];
				$respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);

				if ($respuesta1) {
					$id = $respuesta1['id'];
					$item2 = "password";
					$valor2 = $encryptar;
					$respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

					if ($respuesta2 == "ok") {
						/*=============================================
					            VERIFICACIÓN CORREO ELECTRÓNICO
					        =============================================*/
					
						$mail = new PHPMailer();
						//Server settings
						$url = Ruta::ctrRutaWeb();
						$mail->SMTPDebug = 0;
						$mail->isSMTP();
						$mail->Host       = 'euro-latina.com.mx';
						$mail->SMTPAuth   = true;
						$mail->Username   = 'softart@euro-latina.com.mx';
						$mail->Password   = 'softart_2022';
						$mail->SMTPSecure = 'ssl';
						$mail->Port       = 465;
						$mail->setFrom('softart@euro-latina.com.mx', 'SoftArt');
						$mail->Subject = "Solicitud de contraseña nueva";
						$mail->addAddress($_POST["correoRecuperar"]);
						$mail->msgHTML('
								<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
	
								  <center>
									
									<img style="padding:20px; width:10%" src="">

								  </center>

								  <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
								
									 <center>
									
									   <img style="padding:20px; width:15%" src="https://png.pngtree.com/png-vector/20190826/ourlarge/pngtree-email-png-image_1697542.jpg">

									   <h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

									    <hr style="border:1px solid #ccc; width:80%">

									    <h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña: </strong>' . $nuevaPassword . '</h4>

									   <a href="' . $url . '" target="_blank" style="text-decoration:none">

									    <div style="line-height:60px; background:#0aa; width:60%; color:white">Ingrese nuevamente al sitio</div>

									      </a>

									      <br>
  
									     <hr style="border:1px solid #ccc; width:80%">

									      <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

									      </center>

								    </div>

							      </div>');

						$sendf = $mail->Send();


						if (!$sendf) {

							echo "<script>
					                      Swal.fire({
						                    icon: 'error',
						                    title: 'Oops...',
						                    text: '¡Ha ocurrido un problema enviando el mensaje!',
					                     }),
					                     function(isConfirm){
						                    if(isConfirm){
							                   history.back();
						                     }
					                     }
					                    </script>";
						} else {

							echo '<script>

							Swal.fire({
		
								icon: "success",
								text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico ' . $_POST["correoRecuperar"] . ' para su cambio de contraseña!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
		
							}).then(function(result){
		
								if(result.value){
								
									window.location = "login";
		
								}
		
							});
						
		
							</script>';
						}
					}
				} else {
					echo "<script>
					      Swal.fire({
						    icon: 'error',
						    title: 'Oops...',
						   text: 'El correo electronico no existe!',
					       }),
					  function(isConfirm){
						  if(isConfirm){
							history.back();
						  }
					  }
					</script>";
				}
			} else {
				echo "<script>
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Correo incorrecto, escriba otro por favor!',
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
	REGISTRO CON REDES SOCIALES
	=============================================*/

	static public function ctrRegistroRedesSociales($datos)
	{

		$tabla = "clientes";
		$item = "correo";
		$valor = $datos['correo'];
		$correoRepetido = false;
		$respuesta0 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		if ($respuesta0) {
			$correoRepetido = true;
		} else {
			$respuesta1 = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);
		}

		if ($correoRepetido || $respuesta1 == "ok") {

			$respuesta2 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

			if ($respuesta2["modo"] == "facebook") {

				session_start();

				$_SESSION['validarSesion'] = "ok";
				$_SESSION['id'] = $respuesta2['id'];
				$_SESSION['nombre'] = $respuesta2['nombre'];
				$_SESSION['usuario'] = $respuesta2['usuario'];
				$_SESSION['email'] = $respuesta2['correo'];
				$_SESSION['password'] = $respuesta2['password'];
				$_SESSION['modo'] = $respuesta2['modo'];

				echo "ok";
			} else {
				echo "";
			}
		}
	}
	public function ctrPedidosUsuarios($item, $valor)
	{

		$tabla = "pedidos";

		$respuesta = ModeloUsuarios::mdlMostrarPedidos($tabla, $item, $valor);

		return $respuesta;
	}
}
