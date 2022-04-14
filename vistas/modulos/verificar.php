<?php
    $item= "correoencriptado";
    $valor= $rutas[1];
    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item,$valor);
    
    $id= $respuesta['id'];
    $item2= "verificacion";
    $valor2= 0;
    $ruta = Ruta::ctrRutaWeb();
    $respuesta2 = ControladorUsuarios::ctrActualizarCliente($id,$item2,$valor2);

    $usuarioVerificado = false;

    if ($respuesta2 == "ok") {
        $usuarioVerificado = true;
    }

      

    if ($usuarioVerificado) {
        echo "<div class='divcontener'>
        <h3 class='gracias'>Gracias</h3>
        <h2 ><center><small class='hemosVerifi'>Se verifico su correo electronico, ya puede ingresar al sistema!</small></center></h2>
        <br>
        <center>
        <a href='".$ruta."/login'><button id='buttonIngresarConfirm'>Ingresar</button </a>
        </center>
        </div>
        <br>
        <br>
        <br>";
    }
    else{
        echo "<h3>Gracias</h3>
        <h2><small>No se pudo verificar correo electronico, vuelva a registrarse el el sistema!</small></h2>
        <br>
        <a href='".$ruta."/login'><button>Ingresar</button </a>";
    }

?>