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

    /*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function mdlMostrarUsuario($tabla, $item, $valor){
   
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}
    /*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $id, $item, $valor){
		

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		var_dump($stmt -> execute());
		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}
}
?>