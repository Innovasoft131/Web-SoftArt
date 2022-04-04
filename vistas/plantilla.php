<?php
header('Content-Type: text/html; charset=UTF-8');
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
    <link rel="icon" href="<?php echo $rutaAdmin . $configuracion_ecommerce[0]["logoIcon"]; ?>">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/owlCarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/owlCarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/dist/swiper-bundle/css/swiper-bundle.min.css">


    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/plantilla.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/menu.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/inicio.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/pie.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/login.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/productos.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/modulos/configuracion.php">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/loader.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/detalleProducto.css">
    <link rel="stylesheet" href="<?php echo $rutaWeb; ?>vistas/css/olvidoPassword.css">


    <script src="<?php echo $rutaWeb; ?>vistas/dist/jquery/jquery.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/owlCarousel/js/owl.carousel.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/fontawesome/js/fontawesome.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/fontawesome/js/solid.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/swiper-bundle/js/swiper-bundle.min.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/dist/sweetalert2/sweetalert2.all.js"></script>


</head>

<body>
    <?php
    include 'modulos/loader.php';
    /*=============================================
        CONTENIDO DINÁMICO
    =============================================*/
    
    
    $rutas = array();
    $ruta = null;
    $ruta1 = null;
 
    
    if(isset($_GET["ruta"]) && $_GET["ruta"] == "login"){
        include 'modulos/login.php';
    }elseif($_GET["ruta"] && $_GET["ruta"] == "olvidoPassword"){
         include 'modulos/olvidoPassword.php';
    }
    elseif (isset($_GET["ruta"])) {
        include 'modulos/menu.php';
        $rutas = explode("/", $_GET["ruta"]);

    
        /*=============================================
	        URL'S AMIGABLES DE CATEGORÍAS
	    =============================================*/
        if (isset($rutas[1])) {
            $item = "nombre";
            $valor =  $rutas[1];
            $rutaCategorias = ControladorCategorias::ctrMostrarCategoria($item, $valor);
            if ($rutas[0] == $rutaCategorias["nombre"]) {

                $ruta = $rutas[0];
            }
        }
        /*=============================================
	        URL'S AMIGABLES DE SUBCATEGORÍAS
	    =============================================*/
        if (isset($rutas[0])) {

            $item = "nombre";
            $valor =  $rutas[0];
            $rutaSubCategorias = ControladorCategorias::ctrMostrarSubCategorias($item, $valor);
            foreach ($rutaSubCategorias as $key => $value) {

                if ($rutas[0] == $value["ruta"]) {

                    $ruta1 = $rutas[0];
                }
            }
        }

        /*=============================================
	    LISTA BLANCA DE URL'S AMIGABLES
	    =============================================*/

        if ($ruta1 != null || $rutas[0] == "productos") {
            include "modulos/productos.php";
        } elseif ($ruta1 != null || $rutas[0] == "detalleProducto") {
            include "modulos/detalleProducto.php";
        }  elseif ($rutas[0] == "buscador" || $rutas[0] == "verificar" || $rutas[0] == "salir" || $rutas[0] == "perfil") {
            include "modulos/" . $rutas[0] . ".php";
        } elseif ($rutas[0] == "inicio") {
            include 'modulos/inicio.php';
        } else {
        //    include "modulos/error404.php";
        }
        include 'modulos/pie.php';
    }else {
        include 'modulos/menu.php';
        include 'modulos/inicio.php';
        include 'modulos/pie.php';
    }
    





    ?>
    <input type="hidden" value="<?php echo $rutaWeb; ?>" id="rutaOculta">

    <script src="<?php echo $rutaWeb; ?>vistas/js/detalleProducto.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/menu.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/inicio.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/login.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/loader.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/registroFacebook.js"></script>
    <script src="<?php echo $rutaWeb; ?>vistas/js/usuarios.js"></script>
    

    <script>
      window.fbAsyncInit = function() {
      FB.init({
      appId      : '705509127287570',
      cookie     : true,
      xfbml      : true,
      version    : 'v13.0'
      });
      
      FB.AppEvents.logPageView();      
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
     </script>
</body>

</html>