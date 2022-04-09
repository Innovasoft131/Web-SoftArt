<?php
 require_once '../controladores/usuarios.controlador.php';
 require_once '../modelos/usuarios.modelo.php';

  class AjaxUsuarios{
          public $validarEmail;
          public function AjaxValidarEmail(){
               $datos = $this->validarEmail;
               $respuesta = ControladorUsuarios::ctrMostrarUsuario("correo", $datos);
               echo json_encode($respuesta);
            }
 
          //Registro con facebook
          public $correo;
	      public $nombre;
	      public $usuario;
          public function ajaxRegistroFacebook(){

	      	$datos = array("nombre"=>$this->nombre,
					        "correo"=>$this->correo,
						    	"usuario"=>$this->usuario,
					        "password"=>"null",
					        "modo"=>"facebook",
					        "verificacion"=>0,
                  "correoencriptado"=>"null");

		  $respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);

		   echo $respuesta;

	}	
  }
  if (isset($_POST['validarEmail'])) {
     $valEmail = new AjaxUsuarios();
     $valEmail ->validarEmail=$_POST['validarEmail'];
     $valEmail ->AjaxValidarEmail();
  }
  /*=============================================
REGISTRO CON FACEBOOK
=============================================*/


if(isset($_POST["correo"])){

	$regFacebook = new AjaxUsuarios();
	$regFacebook -> correo = $_POST["correo"];
	$regFacebook -> nombre = $_POST["nombre"];
	$regFacebook -> usuario = $_POST['usuario'];
	$regFacebook ->ajaxRegistroFacebook();

}
?>