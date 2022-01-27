<?php

// controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/configuracion.controlador.php';

// modelos
require_once 'modelos/productos.modelo.php';
require_once 'modelos/configuracion.modelo.php';
require_once "modelos/rutas.php";


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();