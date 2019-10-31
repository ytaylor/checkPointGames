<?php


class Pedido
{
    /* Devuelve la informacion de los juegos */
    function getDataPedido(){
        $sql = "SELECT refPedido,fecha,dni FROM pedido";
        //obtenemos el array de pedidos
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
    function getDataLineaPedido($refPedido){
        $sql = "SELECT numPedido,refPedido,precio,cantidad,idProducto FROM lineapedido where refPedido='$refPedido'";
        //obtenemos el array de pedidos
        //echo $sql;
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
}
