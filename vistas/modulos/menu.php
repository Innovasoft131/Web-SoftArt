<?php
$item = null;
$valor = null;
$configuracion_ecommerce = ControladorConfiguracion::ctrConfiguracionGlobal($item, $valor);
$rutaWeb =  Ruta::ctrRutaWeb();
$rutaAdmin =  Ruta::ctrRutaAdmin();
  
?>
<!-- inicio del header -->
<header class="header mostrar">
    <a href="#" class="logo"> <img src="<?php echo $rutaAdmin.$configuracion_ecommerce[0]["logo"]; ?>" alt="" class="imgLogo"><?php echo $configuracion_ecommerce[0]["nombreTienda"]; ?> </a>

    <nav class="nav">
        <a href="<?php echo $rutaWeb; ?>inicio">Inicio</a>
        <a href="<?php echo $rutaWeb; ?>productos">Productos</a>
        <a href="#cotizaciones">Cotizaciones</a>

    </nav>
    <div class="iconos_menu">
        <div class="subIcono" id="btnMenu">
            <i class="fas fa-bars"></i>
        </div>
        <div class="subIcono" id="btnBuscar">
            <i class="fas fa-search"></i>
        </div>
        <div class="subIcono" id="btnCarrito">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <!-- id="btnLogin" -->
           
             <?php if( isset($_SESSION['validarSesion']) && $_SESSION['validarSesion'] == "ok"): ?>
                <div class="subIcono">
                <span id="btnUsuario"><?php echo $_SESSION['usuario']; ?></span>
                </div>
               
               
             <?php else: ?>
                <div class="subIcono btnLoginI" >
                   <i class="fas fa-user"></i>
                </div>

                <?php endif; ?>

        
    </div>
    <form action="" method="post" class="formBuscar">
        <input type="search" id="txtBuscar" placeholder="Buscar aqui.....">
        <i class="fas fa-search lbtxtBuscar"></i>
        
    </form>
    
    <div class="carrito">
        <div class="cajaCarrito">
            <i class="fas fa-trash"></i>
            <img src="vistas/img/plantilla/3.jpg" alt="" class="imgCarrito">
            <div class="contenido">
                <h3>Bolsa</h3>
                <span class="precioCarrito">$250.00/- &nbsp;</span>
                <span class="cantidadCarrito">qty : 1</span>
            </div>
        </div>
        <div class="cajaCarrito">
            <i class="fas fa-trash"></i>
            <img src="vistas/img/plantilla/4.jpg" alt="" class="imgCarrito">
            <div class="contenido">
                <h3>Bolsa</h3>
                <span class="precioCarrito">$250.00/- &nbsp;</span>
                <span class="cantidadCarrito">qty : 1</span>
            </div>
        </div>

        <div class="cajaCarrito">
            <i class="fas fa-trash"></i>
            <img src="vistas/img/plantilla/2.jpg" alt="" class="imgCarrito">
            <div class="contenido">
                <h3>Tarjeta</h3>
                <span class="precioCarrito">$250.00/- &nbsp;</span>
                <span class="cantidadCarrito">qty : 1</span>
            </div>
        </div>

        <div class="cajaCarrito">
            <i class="fas fa-trash"></i>
            <img src="vistas/img/plantilla/8.jpg" alt="" class="imgCarrito">
            <div class="contenido">
                <h3>Sublimado</h3>
                <span class="precioCarrito">$250.00/- &nbsp;</span>
                <span class="cantidadCarrito">qty : 1</span>
            </div>
        </div>
        <div class="total">Total : $250.00/- </div>
        <a href="#" class="btn">Comprar</a>
    </div>
    <form action="" class="login-form">
        <h3>Hola <?php echo $_SESSION['usuario']?></h3>
        <ul class="cajaLogin">
            <li ><a href="perfil">Informacion Personal</a></li>
        </ul>
        <a href="salir">
        <input type="submit" value="Salir" class="btn">
        </a>
    </form>
</header>
<!-- fin del header -->