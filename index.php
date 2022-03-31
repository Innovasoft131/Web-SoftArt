<?php

// controladores
require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/configuracion.controlador.php';
require_once "controladores/preguntas.controlador.php";
require_once "controladores/testimonios.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/detalleProducto.controlador.php";
require_once "controladores/usuarios.controlador.php";

// modelos
require_once 'modelos/productos.modelo.php';
require_once 'modelos/configuracion.modelo.php';
require_once "modelos/rutas.php";
require_once "modelos/preguntas.modelo.php";
require_once "modelos/testimonios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/detalleProducto.modelo.php";
require_once "modelos/usuarios.modelo.php";

require_once "PHPMailer/PHPMailerAutoload.php";


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();