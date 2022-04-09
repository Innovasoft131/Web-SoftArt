<div class="wrap">
		<ul class="tabs">
			<li><a href="#tab1"><span class="fa-solid fa-user-gear"></span><span class="tab-text">Informacion Personal</span></a></li>
			<li><a href="#tab2"><span class="fa-solid fa-truck"></span><span class="tab-text">Pedidos</span></a></li>
		</ul>
    
		<div class="secciones">
			<article id="tab1">
                <div>
                <input type="text" class="inputs_perfil" placeholder="Nombre" value="<?php echo $_SESSION['nombre'] ?>">
                <input type="text" class="inputs_perfil" placeholder="Usuario" value="<?php echo $_SESSION['usuario'] ?>">
                <input type="text" class="inputs_perfil" placeholder="Correo" value="<?php echo $_SESSION['email'] ?>">
                <input type="text" class="inputs_perfil" placeholder="Modo" value="<?php echo $_SESSION['modo'] ?>">
			</article>
			<article id="tab2">
            <table id="table_id" class="display">
                <thead>
                    <tr> 
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $item = "idCliente";
                      $valor = $_SESSION['id'];
                      
                      $respuesta = ControladorUsuarios::ctrPedidosUsuarios($item, $valor);
                     
                      foreach($respuesta as $key => $value):
                    ?>
                       <tr>
                        <td><?php echo $value['fechaPedido'];?></td>
                        <td><?php echo $value['total'];?></td>
                        <td><?php echo $value['estado'];?></td>
                       </tr>
                     <?php endforeach; ?>
                </tbody>
            </table>
			</article> 
		</div>
	</div>