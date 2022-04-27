<?php

class ControladorCheckout
{

    static public function ctrGuardar($datosPedido, $carrito)
    {

        $respuesta = ModeloCheckout::mdlGuardar($datosPedido, $carrito);

        if ($respuesta == 'ok') {
            $enviarCorreo = new ControladorCheckout();
            $enviarCorreo->enviarCorreo($datosPedido['usuario'], $datosPedido["monto"], $datosPedido["fechaNueva"]);
        }
    }

    static public function enviarCorreo($usuario, $total, $fecha)
    {
        try {
            $nueva_fecha = date('Y-m-d', strtotime($fecha));
            $mail = new PHPMailer();
            //Server settings
            $url = Ruta::ctrRutaWeb();
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'euro-latina.com.mx';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'softart@euro-latina.com.mx';
            $mail->Password   = 'softart_2022';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
            $mail->setFrom('softart@euro-latina.com.mx', 'SoftArt');
            $mail->Subject = "Por favor verifique su direccion de correro electronico SoftArt";
            $mail->addAddress($_POST['correoCliente']);

            $mail->msgHTML(
                '<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
                                  <center>
                                     <img style="padding:20px; width:10%" src="">
                                   </center>
                    
                            <div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
                                <center>
                                <img style="padding:20px; width:15%" src="https://png.pngtree.com/png-vector/20190826/ourlarge/pngtree-email-png-image_1697542.jpg">
                                <h3 style="font-weight:100; color:#999">Informe de pedido</h3>
                                <hr style="border:1px solid #ccc; width:80%">
                                <h4 style="font-weight:100; color:#007bff; padding:0 20px">Hola '.$usuario.',</h4>
                                <br>
                                <div style="line-height:60px; background:#0aa; width:60%; color:white">Gracias por tu pedido. En cuanto tu pedido sea revisado plástico boutique te enviará un correo electrónico con más detalles.</div>
                                <h4 style="font-weight:100; color:#999; padding:0 20px">Tu fecha del pedido es: '.$nueva_fecha.'</h4>
                                <h4 style="font-weight:100; color:#999; padding:0 20px">Total del pedido: '.$total.'</h4>
                               
                                <br>
                                <hr style="border:1px solid #ccc; width:80%">
                                <h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>
                            </center>
                    
                        </div>
                    
                    </div>'
            );

            $mail->Send();

            echo '<script>

                        Swal.fire({
    
                            icon: "success",
                            title: "¡Se he realizado con éxito su pedido, plástico boutique te enviará un correo electrónico con más detalles.!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
                            
                            if(result.value){
                                localStorage.removeItem("listaProductos");
                                window.location = "inicio";
    
                            }
    
                        });
                    
    
                        </script>';
        } catch (Exception $e) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Se he realizado con éxito su pedido',
                    text: '!plástico boutique te enviará un correo electrónico con más detalles.!',
                  }),
                  function(isConfirm){
                      if(isConfirm){
                        localStorage.removeItem('listaProductos');
                        window.location = 'inicio';
                      }
                  }
                </script>";
        }
    }
}
