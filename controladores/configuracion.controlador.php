<?php

class ControladorConfiguracion{

    static public function ctrConfiguracionGlobal($item, $valor){
        
        $tabla = "configTienda";

        $respuesta = ModeloConfiguracion::mdlMostrarConfiguracion($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrConfiguracionInicio($item, $valor){
        
        $tabla = "configInicio";

        $respuesta = ModeloConfiguracion::mdlMostrarConfiguracion($tabla, $item, $valor);

        return $respuesta;
    }
}