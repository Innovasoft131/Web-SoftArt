<?php

$rutaWeb =  Ruta::ctrRutaWeb();
$rutaAdmin =  Ruta::ctrRutaAdmin();

$item = null;
$valor = null;
$configuracion_inicio = ControladorConfiguracion::ctrConfiguracionInicio($item, $valor);


?>
<!-- inicio de la seccion home -->
<section class="inicio" id="inicio">
    <div class="contenido">
        <h3><span><?php echo $configuracion_inicio[0]["slogan"]; ?></span> </h3>
        <p>
            <?php echo $configuracion_inicio[0]["parrafoSlogan"]; ?>
        </p>
        <a href="#productos" class="btn">Comprar ahora</a>
    </div>
</section>
<!-- fin de la seccion home -->

<!-- inicio de servicios -->
<section class="ofertas"  id="Servicios">
    <h1 class="titulo">Nuestros<span>servicios</span> </h1>
</section>
<section class="seccion_servicios">
    <div class="contenedor_servicios">

        <div class="row_servicios">
            <div class="column">
                <div class="card_servicios">
                    <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3 class="titulo_servicio">Titulo del servico</h3>
                    <p class="parrafo_servicio">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, sunt ut nostrum 

                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card_servicios">
                    <div class="icon-wrapper">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <h3 class="titulo_servicio">Titulo del servico</h3>
                    <p class="parrafo_servicio">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, sunt ut nostrum 
                      
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card_servicios">
                    <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3 class="titulo_servicio">Titulo del servico</h3>
                    <p class="parrafo_servicio">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, sunt ut nostrum 
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card_servicios">
                    <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3 class="titulo_servicio">Titulo del servico</h3>
                    <p class="parrafo_servicio">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, sunt ut nostrum 
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card_servicios">
                    <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3 class="titulo_servicio">Titulo del servico</h3>
                    <p class="parrafo_servicio">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, sunt ut nostrum 
                    </p>
                </div>
            </div>
            <div class="column">
                <div class="card_servicios">
                    <div class="icon-wrapper">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3 class="titulo_servicio">Titulo del servico</h3>
                    <p class="parrafo_servicio">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas, sunt ut nostrum 
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- fin de servicios -->

<!-- inicio del carousel de nuevos productos -->
<section class="ofertas"  id="nuevos_productos">
    <h1 class="titulo"> Productos <span>Nuevos</span> </h1>
</section>
<div class="contenedor_card owl-carousel owl-theme">
    <!-- inicio de card nuevos productos -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/modelo2.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Sublimado</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card nuevos productos -->
    <!-- inicio de card nuevos productos -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/1.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Vestido</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card nuevos productos -->
    <!-- inicio de card nuevos productos -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/2.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Bolsas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card nuevos productos -->
    <!-- inicio de card nuevos productos -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/3.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Tarjetas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card nuevos productos -->
    <!-- inicio de card nuevos productos -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/8.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>sublimado</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card nuevos productos -->
    <!-- inicio de card nuevos productos -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/7.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>tazas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card nuevos productos -->

</div>
<!-- fin del carousel de nuevos Productos -->

<!-- inicio de los productos -->
<section class="ofertas"  id="productos">
    <h1 class="titulo"><span>Productos</span> </h1>
    <div class="filtro_productos">
        <div class="botones-productos activar">todos</div>
        <div class="botones-productos">Nuevos</div>
        <div class="botones-productos">Ofertas</div>
        <div class="botones-productos">Tarjetas</div>
        <div class="botones-productos">Bolsas</div>
    </div>
</section>
<div class="contenedor">
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/modelo2.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Sublimado</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/2.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Bolsas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/3.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Tarjetas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/4.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>Bolso</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/9.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>bolsas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/6.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>bolsas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/7.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>tazas</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella gris"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
    <!-- inicio de card oferta -->
    <div class="card">
        <div class="imgBx">
            <img src="vistas/img/plantilla/8.jpg" alt="">
            <ul class="accion">
                <li> 
                    <i class="fa fa-heart"></i> 
                    <span>Comprar</span>
                </li>
                <li> 
                    <i class="fa fa-shopping-cart"></i> 
                    <span>Agregar a carrito</span>
                </li>
                <li> 
                    <i class="fa fa-eye"></i> 
                    <span>Ver</span>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="nombreProducto">
                <h3>sublimado</h3>
            </div>
            <div class="precio_calificacion">
                <h2>$13.45</h2>
                <div class="calificacion">
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                    <i class="fa fa-star imgEstrella"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de card oferta -->
</div>

<!-- inicio de paginación -->
<div class="pagination p12">
      <ul>
        <a href="#"><li><</li></a>
        <a href="#"><li>1</li></a>
        <a href="#"><li>2</li></a>
        <a href="#"><li>3</li></a>
        <a href="#"><li>4</li></a>
        <a href="#"><li>5</li></a>
        <a class="is-active" href="#"><li>6</li></a>
        <a href="#"><li>></li></a>
      </ul>
    </div>
<!-- fin de paginación -->

<!-- inicio de la seccion de testimonios  -->

<section class="ofertas"  id="testimonios">
    <h1 class="titulo">  <span>Testimonios</span> </h1>
</section>
<div class="contenedor-testimonios swiper mySwiper">
    <div class="swiper-wrapper">

        <!-- inicio de las cards de testimonios -->
        <?php
        $item = null;
        $valor = null;
        
        $testimonios = ControladorTestimonios::ctrMostrarTestimonios($item, $valor);
        foreach ($testimonios as $key => $value):
            if ($value["estado"] == 1):
        ?>
        <div class="slide-contenedor swiper-slide">
            <div class="slide">
            <i class="fas fa-quote-right icono"></i>
            <div class="usuarios">
                <img src="<?php echo $rutaAdmin.$value["foto"]; ?>" alt="">
                <div class="usuario-info">
                    <h3><?php echo $value["nombreCliente"]; ?></h3>
                    <div class="estrellas">
                        <?php $cantidadEstrellas = $value["calificacion"]; ?>
                        <?php for ($i=0; $i < $cantidadEstrellas ; $i++): ?>
                        <i class="fas fa-star tesEstrella"></i>
                        
                        <?php endfor; ?>
                        <?php if ($cantidadEstrellas < 5):?>
                            <?php 
                                $cantidadEstrellasGris = 5 - $cantidadEstrellas;  
                                for ($i=0; $i < $cantidadEstrellasGris ; $i++):
                            ?>
                                <i class="fas fa-star tesEstrella gris"></i>
                            <?php endfor; ?>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
            <p class="text">
                <?php echo $value["testimonio"]; ?>
            </p>
            </div>

        </div>
        <?php  endif; ?>
        <?php  endforeach; ?>
        <!-- fin de las cards de testimonios -->


     

   
        
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>

<!-- fin de la seccion de testimonios  -->

<!-- fin de los productos -->

<!-- inicio de la seccion de preguntas  -->
<section class="ofertas"  id="preguntas">
    <h1 class="titulo">  Preguntas <span>frecuentes</span> </h1>
</section>
<section class="seccion_preguntas">
    <div class="contenedor-preguntas">
        <div class="acordeon">
            <?php
                $item = null;
                $valor = null;
                
                $pregunta = ControladorPreguntas::ctrMostrarPreguntas($item, $valor);
                foreach ($pregunta as $key => $value):
            ?>
            <div class="acordeon-item" id="pregunta<?php echo $value["id"]; ?>">
                <a class="acordeon-link" href="#pregunta<?php echo $value["id"]; ?>">
                    <?php echo $value["pregunta"]; ?>
                    <i class="fas fa-plus icon-preguntas"></i>
                    <i class="fas fa-minus icon-preguntas"></i>
                </a>
                <div class="respuesta">
                    <p class="respuesta-parrafo">
                        <?php echo $value["respuesta"]; ?>
                    </p>
                   
                </div>
            </div>
            <?php endforeach; ?>

          
        </div>        
    </div>
</section>
<!-- fin de la seccion de preguntas  -->