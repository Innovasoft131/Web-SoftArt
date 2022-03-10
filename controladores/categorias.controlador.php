<?php
class ControladorCategorias{
    /*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

    static public function ctrMostrarCategorias($item, $valor){

        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostrarCategoria($item, $valor){

        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategoria($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	MOSTRAR SUBCATEGORIAS
	=============================================*/
    static public function ctrMostrarSubCategorias($item, $valor){

        $tabla = "subCategorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostrarSubCategoria($item, $valor){

        $tabla = "subCategorias";
        $respuesta = ModeloCategorias::mdlMostrarCategoria($tabla, $item, $valor);

        return $respuesta;
    }

}