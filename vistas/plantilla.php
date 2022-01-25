<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftArt</title>
    <link rel="icon" href="vistas/img/plantilla/invo.ico">
    <link rel="stylesheet" href="vistas/dist/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="vistas/dist/owlCarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vistas/dist/owlCarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="vistas/dist/swiper-bundle/css/swiper-bundle.min.css">
    

    <link rel="stylesheet" href="vistas/css/plantilla.css">
    <link rel="stylesheet" href="vistas/css/menu.css">
    <link rel="stylesheet" href="vistas/css/inicio.css">
    <link rel="stylesheet" href="vistas/css/pie.css">
    <link rel="stylesheet" href="vistas/css/login.css">


    <script src="vistas/dist/jquery/jquery.min.js"></script>
    <script src="vistas/dist/owlCarousel/js/owl.carousel.min.js"></script>
    <script src="vistas/dist/fontawesome/js/fontawesome.min.js"></script>
    <script src="vistas/dist/fontawesome/js/solid.min.js"></script>
    <script src="vistas/dist/swiper-bundle/js/swiper-bundle.min.js"></script>
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
    

    <script src="vistas/js/menu.js"></script>
    <script src="vistas/js/inicio.js"></script>
    <script src="vistas/js/login.js"></script>
</body>
</html>