<?php

// controladores
require_once 'controladores/plantilla.controlador.php';

// modelos
require_once 'modelos/productos.modelo.php';


$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();