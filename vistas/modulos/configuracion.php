<?php
require_once '../../controladores/configuracion.controlador.php';
require_once '../../modelos/configuracion.modelo.php';

require_once '../../modelos/rutas.php';

    header("Content-Type: text/css; charset: UTF-8");

$rutaWeb =  Ruta::ctrRutaWeb();
$rutaAdmin =  Ruta::ctrRutaAdmin();

    $item = null;
    $valor = null;
    $configuracion_ecommerce = ControladorConfiguracion::ctrConfiguracionGlobal($item, $valor);
    
    $colorCorporativo = $configuracion_ecommerce[0]["colorCorporativo"];

    $colorTexto = $configuracion_ecommerce[0]["colorTexto"];

    $colorMenu = $configuracion_ecommerce[0]["colorMenu"];

    $colorTextoMenu = $configuracion_ecommerce[0]["colorTextoMenu"];

    $colorPie = $configuracion_ecommerce[0]["colorPie"];
    $colorTextoPie = $configuracion_ecommerce[0]["colorTextoPie"];

    $tamanioLogoMenu = $configuracion_ecommerce[0]["tamanioLogoMenu"];

    $tamanioNombre = $configuracion_ecommerce[0]["tamanioNombre"];


$item = null;
$valor = null;
$configuracion_inicio = ControladorConfiguracion::ctrConfiguracionInicio($item, $valor);

$colorSlogan = $configuracion_inicio[0]["colorSlogan"];
$imagenBanner = $configuracion_inicio[0]["img"];

$colorSlogan = $configuracion_inicio[0]["colorSlogan"];

$tamanioSlogan = $configuracion_inicio[0]["tamanioSlogan"];

$colorParrafo = $configuracion_inicio[0]["colorParrafo"];
$tamanioParrafo = $configuracion_inicio[0]["tamanioParrafo"];

?>

:root{
    --naranja: <?php echo $colorCorporativo; ?>;
    --negro: <?php echo $colorTexto; ?>;
}

.header{
    background: <?php echo $colorMenu; ?>;
}


.header .nav a {
    color: <?php echo $colorTextoMenu; ?>;
}

.pie{
    background: <?php echo $colorPie; ?>;
    color: <?php echo $colorTextoPie; ?>;;   
}

.pie p{
    color: <?php echo $colorTextoPie; ?>;
}

.pie h3{
    color: <?php echo $colorTextoPie; ?>;

}

.header .logo{
    font-size: <?php echo $tamanioNombre; ?>rem;
}


.header .logo .imgLogo{
    float: left;
    width: <?php echo $tamanioLogoMenu; ?>rem;

}


.inicio{
    background: url(<?php echo $rutaAdmin.$imagenBanner; ?>) no-repeat;
}

.inicio .contenido h3 span{
    color: <?php echo $colorSlogan; ?>;
}


.inicio .contenido h3{
    color: <?php echo $colorSlogan; ?>;
    font-size: <?php echo $tamanioSlogan; ?>rem;
}

.inicio .contenido p{
    color: <?php echo $colorParrafo; ?>;
    font-size: <?php echo $tamanioParrafo; ?>rem;
}

