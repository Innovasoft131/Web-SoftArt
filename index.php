<?php

// controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/configuracion.controlador.php';
require_once "controladores/preguntas.controlador.php";
require_once "controladores/testimonios.controlador.php";

// modelos
require_once 'modelos/productos.modelo.php';
require_once 'modelos/configuracion.modelo.php';
require_once "modelos/rutas.php";
require_once "modelos/preguntas.modelo.php";
require_once "modelos/testimonios.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();