

<!-- ---------------- MIS COMPRAS ---------------------------------------------------------------------- -->
<div class="col-12">
    <h1 align="center">MIS COMPRAS</h1>

    

        <table id="tree-table" class="table table-hover table-bordered">
            <tbody>
            <?php
            $pedido = new Pedido();
            $array = $pedido->getDataPedido();
            // Mostrar las categorias
            foreach ($array as $key=>$rows) {
                echo '
     <tr  data-id='.$rows['refPedido'].' data-parent="0" data-level="1">
        
        <td class="zonePurple" colspan="6" data-column="name"><span class="icon-down-open"></span>Fecha :' . $rows['fecha'] . '</td>       
    </tr>
    
     <tr class="zonePurple2" data-id='.$rows['refPedido'].'+1 data-parent='.$rows['refPedido'].' data-level="2">
        
        <td colspan="2" data-column="name"><span class="icon-down-open"></span>Ref. Pedido: ' . $rows['refPedido'] . '</td>
        <td colspan="2">Cliente :' . $rows['dni'] . '</td>
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
        </tr>
    ';
                }
            }
            ?>

            </tbody>

        </table>
</div>
