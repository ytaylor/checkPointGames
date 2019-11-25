
<!-- VENTANA MODAL -->
<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock Insuficiente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                No hay stock suficiente para algunos de los productos elegidos.
                Vuelva a revisar, por favor.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div>
    <h1 align="center">CARRITO DE LA COMPRA</h1>
    <table class="table" style="padding: 0;margin: 0">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Referencia</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Subtotal</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php

    // Comprobar el stock con la cantidad indicada en el pedido...
    if(isset($_SESSION['stockLimit']) && isset($_SESSION['cantidadLinea'])) {
        //Si el stock es menor que la cantidad que se pide...
        if ($_SESSION['cantidadLinea'] != -1) {
            if ($_SESSION['stockLimit'] < $_SESSION['cantidadLinea']) {
                echo '<script>$("#actualizarModal").modal("show")</script>';
                $_SESSION['cantidadLinea'] = -1;
            }
        } else {
            //echo "estoy aqui";
            echo '<script>$("#actualizarModal").modal("hide")</script>';
        }
    }

    $total=0;

    if(isset($_SESSION['cartlines'])){
        foreach ($_SESSION['cartlines']->array_prod as $key=>$value){
            if($value!=null) {
                $total= ($value->cantidad*$value->price) + $total;
                echo '
            <tr>
            <th scope="row">' . $value->referencia . '</th>
            <td>' . $value->nombre . '</td>
            <td>' . $value->categoria . '</td>
            <td>
            <form name="form" method="GET">
                <input type="number" id="cantidadLinea" name="cantidadLinea'.$key .'" maxlength="8"  value="' . $value->cantidad . '">
                <input  hidden id="refLinea" name="refLinea'.$value->referencia .'" maxlength="8"  value="' . $value->referencia . '">
                <input  hidden id="posLinea" name="posLinea'.$key.'" maxlength="8"  value="' . $key . '">
                <input  hidden id="cartUpDate" name="cartUpDate" maxlength="8"  value="' . $key . '">
                <input  hidden id="stockLimit" name="stockLimit'.$value->referencia .'" maxlength="8"  value="' . $value->stock . '">
                <input  hidden id="cartDetail" name="cartDetail" maxlength="8"  value="cartDetail">
            </td>
                <td>' . $value->price . '</td>
                <td>' . $value->cantidad * $value->price . '</td>
                <td> 
                     <a href="index.php?cartdetail=cartdetail&linea=' . $key . '&price_minus='. $value->price.'">Eliminar</a>
                </td>
        </tr>';
            }
        }
    }
    else{
        echo "<tr><td><h2> No hay juegos en tu carrito </h2></td></tr>";
    }

    ?>
    </tbody>
</table>

    <?php
     echo '
        <h2>
         Total: '.$total.' Euros
         <input name="btnCartUpdate" value="ACTUALIZAR" type="submit" class="btnNormal2" href="index.php?cartDetail=cartDetail"></input>
         </form>
            
            <form method="get">
            <input type="submit" class="btnNormal2" href="index.php" value="SEGUIR COMPRANDO">
            </form>
            
            <button class="btnBuy" name="buyCart" onclick="getModal()">
            Comprar
            </button>
        
         </h2>
     ';
    ?>

</div>

