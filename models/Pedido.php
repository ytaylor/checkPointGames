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
    function devolverPeddido($refPedido, $refProducto, $cant){

    }


}
