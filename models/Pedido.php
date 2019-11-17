<?php


class Pedido
{
    /* Devuelve la informacion de los pedidos */
    function getDataPedido(){
        $sql = "SELECT refPedido,fecha,dni, total FROM pedido";
        //obtenemos el array de pedidos
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
    //Obtener la lineas de un pedido
    function getDataLineaPedido($refPedido){
        $sql = "SELECT numPedido,refPedido,precio,cantidad,idProducto,nombre,totalUni FROM lineapedido where refPedido='$refPedido'";
        //obtenemos el array de pedidos
        //echo $sql;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    //Devolver un atributo de un pedido
    function devolverPedido($numLineaPedido, $cant, $cantDevolver, $idProducto){
        echo $cantDevolver;
        echo $cant;
        $tool = new Tools();
        //actualizar la linea de pedido si no se ha devuelto todo
        if($cant>$cantDevolver) {
            $nuevaCant = $cant-$cantDevolver;
            $sqlUpdatePedido = "UPDATE lineapedido set cantidad='$nuevaCant'";
            $tool->insertData($sqlUpdatePedido);
        }
        //Eliminar la linea de pedido si elimino el valor
        if($cant==$cantDevolver){
            $sqlEliminarPedido = "DELETE FROM lineapedido where numPedido='$numLineaPedido'";
            $tool->insertData($sqlEliminarPedido);
        }
        //Aumentar el stock del juego
        //Buscar el producto
        $sqlFindProduct = "SELECT stock FROM games WHERE idGame='$idProducto'";
        $resultFindProduct = $tool->getArraySQL($sqlFindProduct);

        $new_stock = $resultFindProduct[0]['stock'] + $cantDevolver;
        $sqlUpdateStock = "UPDATE games set stock = '$new_stock'where idGame='$idProducto'";
        $result = $tool->insertData($sqlUpdateStock);
        return $result;
    }

    function pedidosPendientes(){
        $sql = "SELECT * FROM pedido WHERE fechaEnvio is null";
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }

    function enviarPedidosPendientes($refPedido){
        $tool = new Tools();
        $date=date("m.d.y");
        $sqlUpdate = "UPDATE pedido set fechaEnvio = '$date' where refPedido=$refPedido";
        $tool->insertData($sqlUpdate);
    }




}
