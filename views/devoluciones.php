<!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

<div class="col-12">
    <h1 align="center">¿Quiere realizar una devolución?</h1>
    <table id="tree-table" class="table table-hover table-bordered">
        <tbody>
<?php
$pedido = new Pedido();
$array = $pedido->getDataPedido();
// Mostrar las categorias
foreach ($array as $key=>$rows) {
    echo '
     <tr  data-id='.$rows['refPedido'].' data-parent="0" data-level="1">
        <td class="zonePurple" colspan="7" data-column="name"><span class="icon-down-open"></span>Fecha :' . $rows['fecha'] . '</td>       
    </tr>
    
     <tr class="zonePurple2" data-id='.$rows['refPedido'].'+1 data-parent='.$rows['refPedido'].' data-level="2">
        <td colspan="3" data-column="name"><span class="icon-down-open"></span>Ref. Pedido: ' . $rows['refPedido'] . '</td>
        <td colspan="3">Cliente :' . $rows['dni'] . '</td>
        <td colspan="2">Total :' . $rows['total'] . '</td>
    </tr>
    ';
    $array_lineaspedido = $pedido->getDataLineaPedido($rows['refPedido']);
    echo '
    <tr class="zonePurple3" data-id='.$rows['refPedido'].'+2 data-parent='.$rows['refPedido'].'+1 data-level="3">
        <td>Linea de Pedido</td>
        <td>Nombre</td>
        <td>PrecioUnidad</td>
        <td>Cantidad</td>
        <td>IdProducto</td>
        <td>Total a Pagar</td>
        <td>Devolver</td>
    </tr>
';
    foreach ($array_lineaspedido as $item2 => $rows2) {
        echo '
    <tr data-id='.$rows2['numPedido'].' data-parent='.$rows['refPedido'].'+1 data-level="3">
        <td>'.$rows2['numPedido'].'</td>
        <td>'.$rows2['nombre'].'</td>
        <td>'.$rows2['precio'].'</td>
        <td>'.$rows2['cantidad'].' </td>
        <td> '.$rows2['idProducto'].'</td>
        <td>'.$rows2['totalUni'].'</td>
        
        <td>
            <form action="index.php">
                <input name="cantDevolver'.$item2.'" type="text" size="1">
                <input hidden name="cantidad'.$item2.'" type="text"  value="'.$rows2['cantidad'].'">
                <input hidden name="idProducto'.$item2.'" type="text"  value="'.$rows2['idProducto'].'">
                <input hidden name="numPedido'.$item2.'" type="text"  value="'.$rows2['numPedido'].'">
                <input hidden name="refPedido" type="text"  value="'.$rows['refPedido'].'">
                

        </td>
    </tr>
    ';
    }
    echo '
    <tr data-id='.$rows2['numPedido'].' data-parent='.$rows['refPedido'].'+1 data-level="3">
        <td colspan="8">

         <button name="devoluciones" type="submit" class="btnDevolver" value="devoluciones">OK</button>
        </form> 
        </td>
        </tr>
    ';
}
   ?>

   </tbody>

</table>
</div>


