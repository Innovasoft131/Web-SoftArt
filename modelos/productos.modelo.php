<?php

require_once "conexion.php";

class ModeloProductos{

    // Mostrar productos
    static public function mdlMostrarProductos($tabla,$ordenar, $item, $valor, $base, $tope, $modo){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt ->fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");

            $stmt -> execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarProducto($tabla, $item, $valor){

        if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt ->fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt -> execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;
    }


    static public function mdlMostrarNuevosProductosRandom($item, $valor){
        $stmt = Conexion::conectar()->prepare("SELECT P.* FROM productos p JOIN subCategorias sbc ON p.idSubCategoria = sbc.id WHERE sbc.$item = :$item ORDER BY rand() LIMIT 4");
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();
        $stmt = null;
    }

    static public function mdlMostrarProductosRandom(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos ORDER BY rand() LIMIT 8");


        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();
        $stmt = null;
    }

    static public function mdlListarProductos($tabla, $ordenar, $item, $valor){
        if($item != null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt ->fetchAll();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");


            $stmt -> execute();

            return $stmt ->fetchAll();
        }

        $stmt -> close();
        $stmt = null;
    }

}