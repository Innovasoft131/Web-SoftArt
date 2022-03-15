<?php
class ControladordetalleProducto{
    /*=============================================
	MOSTRAR PRODUCTOS NUEVOS
	=============================================*/

    static public function ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo){
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla,$ordenar, $item, $valor, $base, $tope, $modo);

        return $respuesta;
    }

    static public function ctrMostrarProducto($item, $valor){
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProducto($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostrarProductosRandom(){

        $respuesta = ModeloProductos::mdlMostrarProductosRandom();

        return $respuesta;
    }

    static public function ctrListarProductos($ordenar, $item, $valor){
        $tabla = "productos";

        $respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $valor);

        return $respuesta;
    }
}