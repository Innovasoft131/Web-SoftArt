<div class="container-peque cart-page single-product">
    <table class="tableCart">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>SubTotal</th>
        </tr>
        <tbody class="mostrarCarrito">

        </tbody>


    </table>

    <div class="total-price">
        <table class="tableCart">
            <tr>
                <td>Total</td>
                <td class="totalPedido">$0.00</td>
            </tr>
            <tr>
                <td></td>
                <?php
                if (isset($_SESSION['validarSesion'])) {
                    if ($_SESSION['validarSesion']  == 'ok') {
                        echo '<td><a id="btnCheckout" idUsuario="'.$_SESSION["id"].'" href="checkout"><button class="btn-checkout">Realizar pago</button></a></td>';
                    }
                }else{
                    echo '<td> <a id="btnCheckout" idUsuario="2" href="checkout" ><button class="btn-checkout">Realizar pago</button> </a></td>';
                }
                ?>
                
            </tr>
        </table>
    </div>
</div>