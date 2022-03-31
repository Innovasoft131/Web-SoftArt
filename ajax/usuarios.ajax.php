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
  }
  if (isset($_POST['validarEmail'])) {
     $valEmail = new AjaxUsuarios();
     $valEmail ->validarEmail=$_POST['validarEmail'];
     $valEmail ->AjaxValidarEmail();
  }
?>