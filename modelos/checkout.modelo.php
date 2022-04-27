<?php
require_once "conexion.php";
class ModeloCheckout{

    static public function mdlGuardar($datosPedido, $carrito){
        $cn = Conexion::conectar();
        try {
            $cn -> beginTransaction();
            
            $stmt = $cn -> prepare("INSERT INTO pedidos(id, idCliente, idUsuario, fechaPedido, total, estado, id_transaccion, id_clientePaypal, correoPaypal, estadoCompra)VALUES(NULL, :idCliente, NULL, :fechaPedido, :total, 'pendiente', :id_transaccion, :id_clientePaypal, :correoPaypal, :estadoCompra)");
            $stmt -> bindParam(":idCliente", $datosPedido['idcliente'], PDO::PARAM_STR);
            $stmt -> bindParam(":fechaPedido", $datosPedido['fechaNueva'], PDO::PARAM_STR);
            $stmt -> bindParam(":total", $datosPedido['monto'], PDO::PARAM_STR);
            $stmt -> bindParam(":id_transaccion", $datosPedido['id_transaccion'], PDO::PARAM_STR);
            $stmt -> bindParam(":id_clientePaypal", $datosPedido['id_cliente'], PDO::PARAM_STR);
            $stmt -> bindParam(":correoPaypal", $datosPedido['correo'], PDO::PARAM_STR);
            $stmt -> bindParam(":estadoCompra", $datosPedido['status'], PDO::PARAM_STR);
            $stmt -> execute();

            $idPedido = $cn -> lastInsertId();
            $stmtDetalle = $cn -> prepare("INSERT INTO desglosePedidos(id, idPedido, idProducto, producto, precio, cantidad)VALUES(NULL, :idPedido, :idProducto, :producto, :precio, :cantidad)");
            $stmtDetalle -> bindParam(":idPedido", $idPedido, PDO::PARAM_STR);
            var_dump($carrito);
            var_dump($idPedido);

            for ($i=0; $i < count($carrito); $i++) { 
                
                $stmtDetalle -> bindParam(":idProducto", $carrito[$i]["idProducto"], PDO::PARAM_STR);
                $stmtDetalle -> bindParam(":producto", $carrito[$i]["producto"], PDO::PARAM_STR);
                if($carrito[$i]["oferta"] != ""){
                    $stmtDetalle -> bindParam(":precio", $carrito[$i]["oferta"], PDO::PARAM_STR);
                    var_dump($carrito[$i]["oferta"]);
                }else{
                    $stmtDetalle -> bindParam(":precio", $carrito[$i]["precio"], PDO::PARAM_STR);
                    var_dump($carrito[$i]["precio"]);
                }
                $stmtDetalle -> bindParam(":cantidad", $carrito[$i]["cantidad"], PDO::PARAM_STR);
                $stmtDetalle -> execute();
            }

            if($cn -> commit()){
                return "ok";
            }else{
                return "error";
            }
        } catch (\Throwable $th) {
            $cn->rollBack();
        }
    }
}