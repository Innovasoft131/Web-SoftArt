<?php
 require_once '../controladores/productos.controlador.php';
 require_once '../modelos/productos.modelo.php';

 class AjaxProductos{
    public $id;

    public function ajaxMostrarProducto(){
        $item = "id";
        $valor = $this -> id;
        $respuesta = ControladorProductos::ctrMostrarProducto($item, $valor);
        echo json_encode($respuesta);
    }
 }

 if(isset($_POST["id"])){
    $ajaxProductos = new  AjaxProductos();
    $ajaxProductos -> id = $_POST["id"];
    $ajaxProductos -> ajaxMostrarProducto();
 }