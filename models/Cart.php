<?php


class Cart
{
    public $num_productos;
    public $array_prod;

    function carrito () {
        $this->num_productos=0;
    }
    //introduce un nuevo elemento en el carrito
    function introduce_producto($cartline){
        $this->array_prod[$this->num_productos] = $cartline;
        $this->num_productos++;
    }
    //Dado el numero de la linea que quieres borrar
    function elimina_producto($linea){
        $this->array_prod[$linea]=null;
    }

    //actualizar producto dado una posicion
    function buscar_producto($ref){
        //validar que el producto no exista previamente
        $pos= -1;
        if($this->array_prod != null){
            foreach ($this->array_prod as $key => $value){
                if($value->referencia == $ref){
                    return $key;
                }
            }
        }
        
        if($pos==-1){
            return $pos;
        }
    }

    //verificar que exista el stock
    function verificar_stock($cant, $ref, $posLinea){
        //llamar a la bases de datos para hacer la funcionalidad
        // de verificar el stock

        /*$sql = "";
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;*/
    }

    // Guardar compra del carrito
    function guardar_pedido (){
        $fecha = date ("Y/m/d");
        $idCliente = "03876311Y";
        $sql = "INSERT INTO pedido (fecha, dni) VALUES ('$fecha', '$idCliente')";
        $tool = new Tools();
        $result = $tool->insertData($sql);

        // BUSCAR RefPedido
        $sql = "SELECT refPedido FROM pedido WHERE fecha='$fecha' AND dni='$idCliente' ORDER BY refPedido desc LIMIT 1";
        $array = $tool->getArraySQL($sql);
        foreach ($this->array_prod as $key => $value) {
            $ref = $array[0]['refPedido'];
            $sql = "INSERT INTO lineapedido (refPedido, precio, cantidad, idProducto) VALUES ('$ref', '$value->price', '$value->cantidad', '$value->referencia')";
            $result = $tool->insertData($sql);

        }
        return $result;
    }
}
