<?php

/*=============================================
API DE GOOGLE
=============================================*/

// https://console.developers.google.com/apis
// https://github.com/google/google-api-php-client

/*=============================================
CREAR EL OBJETO DE LA API GOOGLE
=============================================*/

$cliente = new Google_Client();
$cliente->setAuthConfig('modelos/client_secret_756571926996-atijkk9032a7pvtp7ndiq6fu7g436ikg.apps.googleusercontent.com.json');
$cliente->setAccessType("offline");
$cliente->setScopes(['profile','email']);

/*=============================================
RUTA PARA EL LOGIN DE GOOGLE
=============================================*/

$rutaGoogle = $cliente->createAuthUrl();

/*=============================================
RECIBIMOS LA VARIABLE GET DE GOOGLE LLAMADA CODE
=============================================*/
/*
$url= $_SERVER["REQUEST_URI"];

$otraRuta= explode("code=", $url);
$otrosplode = explode("&", $otraRuta[1]);
var_dump($otrosplode[0]);*/
echo $_GET['code'];
if(isset($_GET['code'])){
	$token = $cliente->authenticate($_GET['code']);
     // var_dump( $token);
	//$_SESSION['id_token_google'] = $token;
	$cliente->setAccessToken($token);
}

/*=============================================
RECIBIMOS LOS DATOS CIFRADOS DE GOOGLE EN UN ARRAY
=============================================*/

if($cliente->getAccessToken()){

 	$item = $cliente->verifyIdToken();

 	$datos = array("nombre"=>$item["name"],
				   "email"=>$item["email"],
				   "foto"=>$item["picture"],
				   "password"=>"null",
				   "modo"=>"google",
				   "verificacion"=>0);

 	$respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);

 	echo '<script>
		
	setTimeout(function(){

		window.location = "inicio"

	},1000);

 	</script>';

}
?>

<section class="login mostrar">
  <div class="contenedor">
      <!-- login -->
        <div class="user singinBx">
            <div class="imgBx"><img src="vistas/img/plantilla/login.jpg" class="img-login"></div>
            <div class="formBx">
                <form method="post">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Correo Electronico" name="ingCorreo">
                    <input type="password" placeholder="Contraseña" autocomplete="on" name="ingPassword">
                    <input type="submit" value="Entrar">
                    <p class="signup">¿No tienes cuenta? <a href="#" onclick="toggleForm();" class="btnIngreso">Crear Cuenta</a></p>
                   
                    <?php
                         $ingreso = new ControladorUsuarios();
                         $ingreso->ctrIngresoUsuario();
                    ?>
                </form>
                <br>
                <center>
                    <a href="olvidoPassword" class="olvidoContrasena">Olvidaste tu contraseña?</a>
                </center>
                <button id="buttonFacebook">Entrar con facebook</button>
                <a href="<?php echo $rutaGoogle;?>">
                <button id="buttonGmail">Entrar con Gmail</button>
                </a>
            </div>
            
        </div>
        <!-- registro -->
        <div class="user singupBx">
            <div class="formBx">
                <form method="post" onsubmit="return registroUsuarios()">
                    <h2>Registro</h2>
                    <input type="text" placeholder="Nombre" name="nombreCliente" id="nombreCliente" required>
                    <input type="text" placeholder="Usuario" name="usuarioCliente" id="usuarioCliente" required>
                    <input type="text" placeholder="Correo" name="correoCliente" required id="correoCliente">
                    <input type="password" placeholder="Crear Contraseña" autocomplete="on" name="passwordCliente" id="passwordCliente" required>
                    <input type="password" placeholder="Confirmar contraseña" autocomplete="on" name="confirmarPasswor" id="confirmarPasswor" required>
                    <input type="submit" id="btnEntrar" value="Crear">
                    <p class="signup">¿tienes cuenta? <a href="#" onclick="toggleForm();" >Iniciar sesión</a></p>
                    <?php
                     $registro = new ControladorUsuarios();
                     $registro->ctrRegistroUsuario();
                    ?>
                </form>
            </div>
            <div class="imgBx"><img src="vistas/img/plantilla/login2.jpg" class="img-login"></div>
        </div>

    </div>  
</section>
