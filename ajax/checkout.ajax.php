<?php
 require_once '../controladores/checkout.controlador.php';
 require_once '../modelos/checkout.modelo.php';
class AjaxChekout{
    public $id_transaccion;
    public $monto;
    public $status;
    public $fecha;
    public $fechaNueva;
    public $correo;
    public $id_cliente;
    public $cliente;
    public $usuario;

    public function ajaxGuardarPedido($carrito){
        $datosPedido = array(
            'id_transaccion' => $this -> id_transaccion,
            'monto' => $this -> monto,
            'status' => $this -> status,
            'fechaNueva' => $this -> fechaNueva,
            'correo' => $this -> correo,
            'id_cliente' => $this -> id_cliente,
            'idcliente' => $this -> cliente,
            'usuario' => $this -> usuario
        );

        $respuesta = ControladorCheckout::ctrGuardar($datosPedido, $carrito);

        echo json_encode($respuesta, true);
    }

}

if(isset($_POST['paypal']) && isset($_POST['carrito'])){
    $paypal = json_decode($_POST['paypal'], true); 
    $carrito = $_POST['carrito'];
    
    $ajaxCheckout = new AjaxChekout;
    $ajaxCheckout -> cliente = $_POST['cliente'];
    $ajaxCheckout -> usuario = $_POST['usuario'];
    $ajaxCheckout -> id_transaccion = $paypal['id'];
    $ajaxCheckout -> monto = $paypal['purchase_units'][0]['amount']['value'];
    $ajaxCheckout -> status = $paypal['status'];
    $fecha = $paypal['update_time'];
    $ajaxCheckout -> fechaNueva = date('Y-m-d H:i:s', strtotime($fecha));
    $ajaxCheckout -> correo = $paypal['payer']['email_address'];
    $ajaxCheckout -> id_cliente = $paypal['payer']['payer_id'];
    $datosCarrito = json_decode($carrito, true);
    $ajaxCheckout -> ajaxGuardarPedido($datosCarrito);

}
