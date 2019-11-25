
<div class="col-12">
    <h1 align="center">
    <?php

        if(isset($_COOKIE['countPedidosUser'])) {
            $cant = $_COOKIE['countPedidosUser'];
            echo "Tienes $cant Pedidos";
        }
    ?>
    </h1>
</div>

<div>
    <table id="tree-table" class="table table-hover table-bordered">
        <thead>
        <tr class="zonePurple2">
            <th scope="col">Referencia</th>
            <th scope="col">Fecha</th>
            <th scope="col">Fecha pedido enviado</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <?php

        	if(isset($_COOKIE['pedidosPendientesUser'])) {
                $data = unserialize($_COOKIE['pedidosPendientesUser'], ["allowed_classes" => false]);
                foreach ($data as $item => $value) {
                    if ($value['fechaEnvio'] != null) {
                        $timefromdatabase = strtotime($value['fechaEnvio']);
                        $dif = time() - $timefromdatabase;
                        if ($dif < 86400) {
                            echo '
                    <tr class="zonePurple3">
                       <td>' . $value['refPedido'] . '</td>
                       <td>' . $value['fecha'] . '</td>
                       ';
                            if ($value['fechaEnvio'] != null) {
                                echo '
                       <td>' . $value['fechaEnvio'] . '</td>
                       ';
                            } else {
                                echo '
                       <td>No se ha envido</td>
                       ';
                            }
                            echo '
                       <td>' . $value['total'] . '</td>
                    </tr>
                ';
                        }
                    }else{
                        echo '
                    <tr class="zonePurple3">
                       <td>' . $value['refPedido'] . '</td>
                       <td>' . $value['fecha'] . '</td>
               
                       <td>No se ha envido</td>
                       <td>' . $value['total'] . '</td>
                       </tr>
                       ';

                    }
                }
            }

    	?>
        </tbody>
    </table>
</div>
