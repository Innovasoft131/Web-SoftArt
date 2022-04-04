<h1 class="recuperarh">RECUPERAR CONTRASEÑA</h1>
<div class="contenedorRecurperarPassword">
    <h2 class="correoRegis">Ingrese su correo con el que se ha registrado para enviar una contraseña nueva</h2>
    <form method="post" class="form-recuperar">
        <div class="form-correo-recuperar">
            <input required type="text" placeholder="Ingrese su correo electronico" class="correo-recuperar" name="correoRecuperar">
        </div>
        <div class="form__button">
            <a href="login" class="salir-recuperar">Salir</a>
            <button  type="submit" class="enviar-recuperar">Enviar enlace</button>
        </div>
        <?php
            $password = new ControladorUsuarios();
            $password->ctrOlvidoPassword();
        ?>
    </form>
</div>