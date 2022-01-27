<?php
// mantener la ruta fija de la ecommerce
$rutaWeb =  Ruta::ctrRutaWeb();
$rutaAdmin =  Ruta::ctrRutaAdmin();

$item = null;
$valor = null;
$configuracion_ecommerce = ControladorConfiguracion::ctrConfiguracionGlobal($item, $valor);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftArt</title>
    <link rel="icon" href="<?php echo $rutaAdmin.$configuracion_ecommerce[0]["logoIcon"]; ?>">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/owlCarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/owlCarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/swiper-bundle/css/swiper-bundle.min.css">
    

    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/menu.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/inicio.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/pie.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/login.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/modulos/configuracion.php">


    <script src="<?php echo $rutaWeb; ?>vistas/dist/jquery/jquery.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/owlCarousel/js/owl.carousel.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/fontawesome/js/fontawesome.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/fontawesome/js/solid.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/swiper-bundle/js/swiper-bundle.min.js"></script>


</head>
<body>
    <?php 
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
        
        include 'modulos/menu.php';
        if(isset($_GET["ruta"])){
            
            if($_GET["ruta"]=="inicio"){
    
                
                include 'modulos/inicio.php'; 
                include 'modulos/pie.php'; 
    
            }
        }else{
            include "modulos/inicio.php";
        }
    }else{
        if(isset($_GET["ruta"])){
            
            if($_GET["ruta"]=="login"){
    
                
                include "modulos/".$_GET["ruta"].".php";
    
            }else{
                    include "modulos/menu.php";
                    include "modulos/".$_GET["ruta"].".php";
                    include "modulos/pie.php"; 
            }
        }else{
            include "modulos/menu.php";
            include 'modulos/inicio.php'; 
            include "modulos/pie.php"; 
        }
      
    }
        
        
        
    ?>
    

    <script src="<?php echo $rutaWeb; ?>vistas/js/menu.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/inicio.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/login.js"></script>
</body>
</html>