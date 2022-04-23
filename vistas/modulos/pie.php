<?php
$rutaWeb =  Ruta::ctrRutaWeb();
$rutaAdmin =  Ruta::ctrRutaAdmin();
$item = null;
$valor = null;
$configuracion_ecommerce = ControladorConfiguracion::ctrConfiguracionGlobal($item, $valor);
?>
<div class="pie mostrar">
  <div class="container">
    <div class="row">
      <!--div class="pie-col-1">
        <h3>Descarga nuestra app</h3>
        <p>Descarga nuestra app para android y ios</p>
      </div -->
      <div class="pie-col-2">
        <img src="<?php echo $rutaAdmin.$configuracion_ecommerce[0]["logoPie"]; ?>" alt="">
        <p>Nuestro propósito es hacer que el placer y los beneficios del diseño grafico sean accesibles de manera sostenible para muchos.</p>
      </div>
      <div class="pie-col-3">
        <h3>Enlaces útiles</h3>
        <ul>
        <a href="https://www.iubenda.com/privacy-policy/63066360" class="iubenda-white iubenda-noiframe iubenda-embed iubenda-noiframe " title="Política de Privacidad ">Política de Privacidad</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
        </ul>
      </div>
      <div class="pie-col-4">
        <h3>Redes sociales</h3>
        <ul>
          <li> <i class="fa-brands fa-facebook"></i> Facebook</li>
          <li> <i class="fa-brands fa-instagram-square"></i>Twitter</li>
          <li> <i class="fab fa-instagram"></i>Instagram</li>
        </ul>
      </div>
    </div>
    <hr>
    <p class="copyright">Copyright © 2022 - INNOVASOFT</p>
  </div>
</div>