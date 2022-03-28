<?php
require_once "conexion.php";

class ModeloUsuarios{
    //registro de usuarios
    static public function mdlRegistroUsuario($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(correo, usuario, password,fecha, modo, nombre, verificacion)
                                                                    values (:correo,:usuario,:password,now(), :modo, :nombre, :verificacion)");
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
           return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
?>