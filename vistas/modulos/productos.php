<?php

$rutaWeb =  Ruta::ctrRutaWeb();
$rutaAdmin =  Ruta::ctrRutaAdmin();
$ruta = $rutas[0];
?>
<!-- PRODUCTS -->
<a href="https://api.whatsapp.com/send?phone=4775875940" class="btn-wsp" target="_blank">
  <i class="fa-solid fa-comment"></i>
</a>
<section class="section products sectionProducto mostrar">
  <div class="products-layout container">
    <div class="col-1-of-4">
      <?php
      $categorias = ControladorCategorias::ctrMostrarCategorias($item = "", $valor = "");

      foreach ($categorias as $key => $value) :
      ?>
        <div>
          <div class="block-title">
            <h3><?php echo $value["nombre"]; ?></h3>
          </div>

          <ul class="block-content">
            <?php
            $subcategorias = ControladorCategorias::ctrMostrarSubCategorias($item = "idCategoria", $valor = $value["id"]);
            foreach ($subcategorias as $key => $values) :
            ?>
              <li>
                <a href="<?php echo $rutaWeb . $ruta . '/1' . '/' . $value["nombre"] . '/' . $values["nombre"]; ?>">
                  <label for="">
                    <span class="filtroCateforia" subcategoria="<?php echo $values["nombre"]; ?>"><?php echo $values["nombre"]; ?></span>
                    <!-- small>(10)</small -->
                  </label>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>


    </div>
    <!-- inicio de productos -->
    <div class="contenedor">
      <!-- inicio de card oferta -->
      <?php
      if (
        isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1]) &&
        isset($rutas[2]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-ñÑ]+$/', $rutas[2]) &&
        isset($rutas[3]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-ñÑ]+$/', $rutas[3])
      ) {
        $base = ($rutas[1] - 1) * 9;
        $tope = 9;
        $ordenar = "nombre";
        $item1 = "nombre";
        $valor1 = $rutas[3];
        $subCategorias = ControladorCategorias::ctrMostrarSubCategorias($item1, $valor1);
        $item2 = "idSubCategoria";
        $valor2 = $subCategorias[0]["id"];
        $modo = "DESC";
      } elseif (
        isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1]) &&
        isset($rutas[2]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-]+$/', $rutas[2])
      ) {

        $base = ($rutas[1] - 1) * 9;
        $tope = 9;
        $ordenar = "nombre";
        $item1 = "nombre";
        $valor1 = $rutas[2];
        $categorias = ControladorCategorias::ctrMostrarCategoria($item1, $valor1);
        $item2 = "idCategoria";
        $valor2 = $categorias[0]["id"];
        $modo = "DESC";
      } elseif (isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1])) {

        $base = ($rutas[1] - 1) * 9;
        $tope = 9;
        $ordenar = "nombre";
        $item2 = NULL;
        $valor2 = NULL;
        $modo = "DESC";
      } else {
        $ordenar = "nombre";
        $item2 = null;
        $valor2 = null;
        $rutas[1] = 1;
        $base = 0;
        $tope = 9;
        $modo = "DESC";
      }





      $respuestaProductos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2, $base, $tope, $modo);
      $listaProductos = ControladorProductos::ctrListarProductos($ordenar, $item2, $valor2);
      if (!$respuestaProductos) :
      ?>
        <div class="error404">

          <h1><small>¡Oops!</small></h1>

          <h2>Aún no hay productos en esta sección</h2>

        </div>
      <?php
      endif;
      foreach ($respuestaProductos as $key => $value) :
      ?>
        <div class="card">
          <div class="imgBx">
            <img src="<?php echo $rutaAdmin . $value["foto"]; ?>" alt="">
            <ul class="accion">
              <li class="detalle" nombre="<?php echo $value["id"]; ?>" producto="<?php echo $value["id"]; ?>" modelo="<?php echo $value["nombre"]; ?>" precio="<?php echo $value["precio_venta"]; ?>" oferta="<?php echo $value["oferta_venta"]; ?>" imagen="<?php echo $rutaAdmin . $value["foto"]; ?>">
                <i class="fa fa-heart"></i>
                <span>Comprar</span>
              </li>
              <li class="agregarCarrito" idproducto="<?php echo $value["id"]; ?>" producto="<?php echo $value["nombre"]; ?>" precio="<?php echo $value["precio_venta"]; ?>" oferta="<?php echo $value["oferta_venta"]; ?>" imagen="<?php echo $rutaAdmin . $value["foto"]; ?>">
                <i class="fa fa-shopping-cart"></i>
                <span>Agregar a carrito</span>
              </li>
              <li class="detalle" nombre="<?php echo $value["id"]; ?>">
                <i class="fa fa-eye"></i>
                <span>Ver</span>
              </li>
            </ul>
          </div>
          <div class="content">
            <div class="nombreProducto">
              <h3><?php echo $value["nombre"]; ?></h3>
            </div>
            <div class="precio_calificacion">
              <?php if ($value["oferta_venta"] != "" || $value["oferta_venta"] != null) : ?>
                <h2>$<?php echo $value["oferta_venta"]; ?></h2>
              <?php else : ?>
                <h2>$<?php echo $value["precio_venta"]; ?></h2>
              <?php endif; ?>
              <div class="calificacion">
                <?php if ($value["oferta_venta"] != "" || $value["oferta_venta"] != null) : ?>
                  <h2 class="oferta">$<?php echo $value["precio_venta"]; ?></h2>
                <?php endif; ?>
                <!-- i class="fa fa-star imgEstrella"></i>
                <i class="fa fa-star imgEstrella"></i>
                <i class="fa fa-star imgEstrella gris"></i>
                <i class="fa fa-star imgEstrella gris"></i>
                <i class="fa fa-star imgEstrella gris"></i -->
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- fin de card oferta -->


    </div>
    <!-- fin de productos -->
  </div>

  <!--=====================================
			PAGINACIÓN
	======================================-->
  <!-- inicio de paginación -->
  <div class="pagination p12">
    <?php
    if (
      isset($rutas[1]) && preg_match('/^[0-9]+$/', $rutas[1]) &&
      isset($rutas[2]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-ñÑ]+$/', $rutas[2]) &&
      isset($rutas[3]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-ñÑ]+$/', $rutas[3])
    ) {
      $link = '/' . $rutas[2] . '/' . $rutas[3];
    } elseif (
      isset($rutas[2]) && preg_match('/^[0-9]+$/', $rutas[2]) &&
      isset($rutas[3]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-ñÑ]+$/', $rutas[3])
    ) {
      $link = '/' . $rutas[2] . '/' . $rutas[3];
    } elseif (isset($rutas[2]) && preg_match('/^[0-9]+$/', $rutas[2])) {
      $link = '/' . $rutas[2];
    } else {
      $link = '';
    }
    if (count($listaProductos) != 0) :
      $pagiProductos = ceil(count($listaProductos) / 9);
      if ($pagiProductos > 4) :
        /* los botones de las primeras 4 paginas y la ultima pagina*/
        if ($rutas[1] == 1) :
    ?>
          <ul>
            <?php
            for ($i = 1; $i <= 4; $i++) :
            ?>
              <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . $i . $link; ?>">
                <li> <?php echo $i; ?> </li>
              </a>
            <?php
            endfor;
            ?>
            <a disabled>
              <li>...</li>
            </a>
            <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . $pagiProductos . $link; ?>">
              <li><?php echo $pagiProductos; ?></li>
            </a>
            <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . '2' . $link; ?>">
              <li>></li>
            </a>
          </ul>

        <?php
        /* Los botones de la mitad de página hacia abajo */
        elseif ($rutas[1] != $pagiProductos && $rutas[1] != 1 && $rutas[1] < ($pagiProductos / 2) && $rutas[1] < ($pagiProductos - 3)) :
          $numPagActual = $rutas[1];
        ?>
          <ul>
            <a href="<?php echo $rutaWeb . $rutas[0] . '/' . ($numPagActual - 1) . $link; ?>">
              <li>
                < </li>
            </a>
            <?php
            for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) :
            ?>
              <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . $i . $link; ?>">
                <li> <?php echo $i; ?> </li>
              </a>
            <?php
            endfor;
            ?>
            <a disabled>
              <li>...</li>
            </a>
            <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . $pagiProductos . $link; ?>">
              <li><?php echo $pagiProductos; ?></li>
            </a>
            <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . ($numPagActual + 1) . $link; ?>">
              <li>></li>
            </a>
          </ul>
        <?php
        /* Los botones de la mitad de página hacia arriba */
        elseif ($rutas[1] != $pagiProductos && $rutas[1] != 1 && $rutas[1] >= ($pagiProductos / 2) && $rutas[1] < ($pagiProductos - 3)) :
          $numPagActual = $rutas[1];
        ?>
          <ul>
            <a href="<?php echo $rutaWeb . $rutas[0] . '/' . ($numPagActual - 1) . $link; ?>">
              <li>
                < </li>
            </a>
            <a href="<?php echo $rutaWeb . $rutas[0] . '/' . '1' . $link; ?>">
              <li>1</li>
            </a>
            <a disabled>
              <li>...</li>
            </a>
            <?php
            for ($i = $numPagActual; $i <= ($numPagActual + 3); $i++) :
            ?>
              <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . $i . $link; ?>">
                <li> <?php echo $i; ?> </li>
              </a>
            <?php
            endfor;
            ?>
            <a href="<?php echo $rutaWeb .  $rutas[0] . '/' . ($numPagActual + 1) . $link; ?>">
              <li>></li>
            </a>

          </ul>
        <?php
        /* los botones de las ultimas 4 paginas y la primera pag */
        else :
          $numPagActual = $rutas[1];
        ?>
          <ul>
            <a href="<?php echo $rutaWeb . $rutas[0] . '/' . ($numPagActual - 1) . $link; ?>">
              <li>
                < </li>
            </a>
            <a href="<?php echo $rutaWeb . $rutas[0] . '/' . '1' . $link; ?>">
              <li>1</li>
            </a>
            <a disabled>
              <li>...</li>
            </a>
            <?php
            for ($i = ($pagiProductos - 3); $i <= $pagiProductos; $i++) :
            ?>
              <a href="<?php echo $rutaWeb . $rutas[0] . '/' . $i . $link; ?>">
                <li> <?php echo $i; ?> </li>
              </a>
            <?php
            endfor;
            ?>

          </ul>
        <?php endif; ?>
        <!-- ul>
          <a href="#">
            <li>
              < </li>
          </a>
          <a href="1/#inicio">
            <li>1</li>
          </a>
          <a href="#">
            <li>2</li>
          </a>
          <a href="#">
            <li>3</li>
          </a>
          <a href="#">
            <li>4</li>
          </a>
          <a href="#">
            <li>5</li>
          </a>
          <a class="is-active" href="#">
            <li>6</li>
          </a>
          <a href="#">
            <li>></li>
          </a>
        </ul -->
      <?php
      else :
      ?>
        <ul>
          <?php
          for ($i = 1; $i <= $pagiProductos; $i++) :
          ?>
            <a href="<?php echo $rutaWeb . $rutas[0] . '/' . $i . $link; ?>">
              <li> <?php echo $i; ?> </li>
            </a>
          <?php
          endfor;
          ?>
        </ul>
    <?php
      endif;
    endif;
    ?>
  </div>
  <!-- fin de paginación -->
  </div>
</section>