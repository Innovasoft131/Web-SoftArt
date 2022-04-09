<?php
$rutaWeb =  Ruta::ctrRutaWeb();
$rutaAdmin =  Ruta::ctrRutaAdmin();
$ruta = $rutas[1];

if (isset($ruta)) :
  $item = "id";
  $valor = $ruta;
  $producto = ControladorProductos::ctrMostrarProducto($item, $valor);

?>
  <!--BOTON DE WHATSAPP FLOTANTE-->
  <a href="https://api.whatsapp.com/send?phone=4775875940" class="btn-wsp" target="_blank">
    <i class="fa-solid fa-comment"></i>
  </a>
  <div class="card-wrapper">
    <div class="card-detail">
      <!-- card left -->
      <div class="product-imgs">
        <div class="img-display">
          <div class="img-showcase">
            <img src="<?php echo $rutaAdmin . $producto[0]["foto"]; ?>" alt="shoe image">
          </div>
        </div>
        <!--div class="img-select">
           <div class="img-item">
             <a href="#" data-id="1">
               <img src="vistas/img/plantilla/1.jpg" alt="shoe image">
             </a>
           </div>
           <div class="img-item">
             <a href="#" data-id="2">
               <img src="vistas/img/plantilla/2.jpg" alt="shoe image">
             </a>
           </div>
           <div class="img-item">
             <a href="#" data-id="3">
               <img src="vistas/img/plantilla/3.jpg" alt="shoe image">
             </a>
           </div>
           <div class="img-item">
             <a href="#" data-id="4">
               <img src="vistas/img/plantilla/1.jpg" alt="shoe image">
             </a>
           </div>
         </div -->
      </div>
      <!-- card right -->
      <div class="product-content mostrar">
        <h2 class="product-title"><?php echo $producto[0]["nombre"]; ?></h2>
        <!-- a href="#" class="product-link">visit nike store</a>
         <div class="product-rating">
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star"></i>
           <i class="fas fa-star-half-alt"></i>
           <span>4.7(21)</span>
         </div>

         <div class="product-price">
           <p class="last-price">Old Price: <span>$257.00</span></p>
           <p class="new-price">New Price: <span>$249.00 (5%)</span></p>
         </div -->

        <div class="product-detail">
          <h2>Descripción: </h2>
          <?php echo $producto[0]["descripcion"]; ?>
          <!-- p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
           <ul>
             <li>Color: <span>Black</span></li>
             <li>Available: <span>in stock</span></li>
             <li>Category: <span>Shoes</span></li>
             <li>Shipping Area: <span>All over the world</span></li>
             <li>Shipping Fee: <span>Free</span></li>
           </ul -->
        </div>

        <div class="purchase-info">
          <input type="number"  name="txtCantidad" id="txtCantidad" min="1" value="1">
          <button type="button" class="btnAgregarCarrito agregarCarrito" idproducto="<?php echo $producto[0]["id"]; ?>" producto="<?php echo $producto[0]["nombre"]; ?>" precio="<?php echo $producto[0]["precio_venta"]; ?>" oferta="<?php echo $producto[0]["oferta_venta"]; ?>" imagen="<?php echo $rutaAdmin . $producto[0]["foto"]; ?>">
            Agregar al carrito
          </button>
          <button type="button" class="btnPagarPayPal">Comprar con PayPal </button>
          <button type="button" class="btnPagarPayPal">Comprar con Tarjeta / oxxo </button>
        </div>

        <!-- div class="social-links">
           <p>Share At: </p>
           <a href="#">
             <i class="fab fa-facebook-f"></i>
           </a>
           <a href="#">
             <i class="fab fa-twitter"></i>
           </a>
           <a href="#">
             <i class="fab fa-instagram"></i>
           </a>
           <a href="#">
             <i class="fab fa-whatsapp"></i>
           </a>
           <a href="#">
             <i class="fab fa-pinterest"></i>
           </a>
         </div -->
      </div>
    </div>
  </div>
<?php else : ?>
  <div class="error404">

    <h1><small>¡Oops!</small></h1>

    <h2>Aún no hay productos en esta sección</h2>

  </div>
<?php endif; ?>