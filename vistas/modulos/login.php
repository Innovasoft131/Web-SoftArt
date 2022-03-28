<section class="login mostrar">
  <div class="contenedor">
      <!-- login -->
        <div class="user singinBx">
            <div class="imgBx"><img src="vistas/img/plantilla/login.jpg" class="img-login"></div>
            <div class="formBx">
                <form method="post">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Usuario" name="ingUsuario">
                    <input type="password" placeholder="Contraseña" autocomplete="on" name="ingPassword">
                    <input type="submit" value="Entrar">
                    <p class="signup">¿No tienes cuenta? <a href="#" onclick="toggleForm();" >Crear Cuenta</a></p>
                  
                </form>
                <button id="buttonFacebook">Entrar con facebook</button>
                <button id="buttonGmail">Entrar con Gmail</button>
            </div>
            
        </div>
        <!-- registro -->
        <div class="user singupBx">
            <div class="formBx">
                <form method="post" onsubmit="return registroUsuarios()">
                    <h2>Registro</h2>
                    <input type="text" placeholder="Nombre" name="nombreCliente" id="nombreCliente" required>
                    <input type="text" placeholder="Usuario" name="usuarioCliente" id="usuarioCliente" required>
                    <input type="text" placeholder="Correo" name="correoCliente" required id="correoCliente">
                    <input type="password" placeholder="Crear Contraseña" autocomplete="on" name="passwordCliente" id="passwordCliente" required>
                    <input type="password" placeholder="Confirmar contraseña" autocomplete="on" name="confirmarPasswor" id="confirmarPasswor" required>
                    <input type="submit" id="btnEntrar" value="Crear">
                    <p class="signup">¿tienes cuenta? <a href="#" onclick="toggleForm();" >Iniciar sesión</a></p>
                    <?php
                     $registro = new ControladorUsuarios();
                     $registro->ctrRegistroUsuario();
                    ?>
                </form>
            </div>
            <div class="imgBx"><img src="vistas/img/plantilla/login2.jpg" class="img-login"></div>
        </div>

    </div>  
</section>
