<?php

class ControladorTestimonios{
	/*=============================================
	MOSTRAR TESTIMONIOS
	=============================================*/

	static public function ctrMostrarTestimonios($item, $valor){

		$tabla = "testimoniosTienda";

		$respuesta = ModeloTestimonios::mdlMostrarTestimonios($tabla, $item, $valor);
	
		return $respuesta;
	}
}