<?php

class ControladorPreguntas{
    /*=============================================
	MOSTRAR PREGUNTAS
	=============================================*/

	static public function ctrMostrarPreguntas($item, $valor){

		$tabla = "preguntas";

		$respuesta = ModeloPreguntas::MdlMostrarPreguntas($tabla, $item, $valor);
	
		return $respuesta;
	}

}