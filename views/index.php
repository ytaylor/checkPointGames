<?php
//Incluimos todas las clases y funciones del proyecto
include 'controllers/functions.php';
include "models/Games.php";
include "models/Categoria.php";
include "models/CartLinea.php";
include "models/Users.php";
include "models/Provinces.php";
include "models/Municipio.php";
include "models/Cart.php";
include "models/Pedido.php";
session_start();

//Para las categorias
if(isset($_GET["cat"]) && isset($_GET["subcat"])){
    $_SESSION['cat'] = $_GET['cat'];
    $_SESSION['subcat'] = $_GET['subcat'];
}else{
    unset($_SESSION['cat']);
    unset($_SESSION['subcat']);
}

//Dandole valor a las unidades totales y euros totales
if(!isset($_SESSION["udsTotal"]) && !isset($_SESSION["eurosTotal"])){
    $_SESSION["udsTotal"] = 0;
    $_SESSION["eurosTotal"] = 0;
}

//Insertar producto en un carrito
if(isset($_GET['price']) ){
    // ... Añadirá 1 al total de unidades y X euros del producto seleccionado.
    $_SESSION["udsTotal"] = $_SESSION["udsTotal"] + 1;
    $_SESSION["eurosTotal"] = $_SESSION["eurosTotal"] + $_GET["price"];

    if(isset($_GET['ref']) ){
        $ref = $_GET['ref'];
    }
    if(isset($_GET['nameGame']) ){
        $nom = $_GET['nameGame'];
    }
    if(isset($_GET['cat']) ){
        $cat = $_GET['cat'];
    }
    if(isset($_GET['stockLimit']) ){
        $stock = $_GET['stockLimit'];
    }

    $price = $_GET['price'];

    //Creando el Carrito sino existe
    if (!isset($_SESSION['cartlines'])) {
        $_SESSION['cartlines'] = new Cart();
    }

    //Cuando voy a insertar en el carrito
    if(isset($_GET['ref'])){
            $pos = $_SESSION['cartlines']->buscar_producto($ref);
            if($pos!=-1) {
                $product = $_SESSION['cartlines']->array_prod[$pos];
                $newproduct = new CartLinea();
                $newproduct->nombre = $product->nombre;
                $newproduct->categoria = $product->categoria;
                $newproduct->price = $product->price;
                $newproduct->referencia = $product->referencia;
                $newproduct->cantidad = $product->cantidad+1;
                $newproduct->stock=$product->stock;
                $newproduct->totalUni = $newproduct->cantidad * $newproduct->price;

                $_SESSION['cartlines']->array_prod[$pos] = $newproduct;
            }
            else {
                //Creando la linea del producto a insertar
                $new_line = new CartLinea();
                //Dandole valores a esa linea del carrito
                $new_line->setValues($ref, $nom, $cat, 1, $price, $stock);
                //introduciendo esa linea en el carrito que ya esta en la sesion
                $_SESSION['cartlines']->introduce_producto($new_line);
            }
        }

}

//actualizar producto (cantidad de stock).
if(isset($_GET['cartUpDate'])){

    foreach($_SESSION['cartlines']->array_prod as $key=>$value){

        if(isset($_GET['cantidadLinea'.$key .''])){

            if($_GET['stockLimit'.$value->referencia .''] < $_GET['cantidadLinea'.$key .'']){
                // Guardar en variable de sesión el stock y la cantidad solicitada.
              // echo $_GET['stockLimit'.$value->referencia .'']. "stocklimit";
                //echo $_GET['cantidadLinea'.$value->referencia .''];
                $_SESSION['stockLimit'] = $_GET['stockLimit'.$value->referencia .''];
                $_SESSION['cantidadLinea'] = $_GET['cantidadLinea'.$key .''];
            }
            else{
                $product= $_SESSION['cartlines']->array_prod[$_GET['posLinea'.$key .'']];
                $newproduct = new CartLinea();
                $newproduct->nombre = $product->nombre;
                $newproduct->categoria = $product->categoria;
                $newproduct->price = $product->price;
                $newproduct->referencia = $product->referencia;
                $newproduct->cantidad= $_GET['cantidadLinea'.$key .''];
                $newproduct->stock= $product->stock;
                $newproduct->totalUni = $product->price*$newproduct->cantidad;
                $_SESSION['cartlines']->array_prod[$_GET['posLinea'.$key.'']]=$newproduct;
            }

        }
    }

}

//quiero eliminar
if(isset($_GET['linea']))
{
    //elimino el producto del carrito
    $_SESSION['cartlines']->elimina_producto($_GET['linea']);
    //resto la cantidad de unidades
    $_SESSION["udsTotal"] = $_SESSION["udsTotal"] -1;
    //resto el precio de producto eliminado
    $_SESSION["eurosTotal"] = $_SESSION["eurosTotal"]-$_GET["price_minus"];
}

if(isset($_GET["province"])){
    $_SESSION['provincia'] = $_GET['province'];

}

//Comprar
if(isset($_GET["comprar"])){
    if(isset($_SESSION['user'])){
    if(isset($_SESSION["cartlines"])) {
        $_SESSION["cartlines"]->guardar_pedido($_SESSION["eurosTotal"]);
        $_SESSION["udsTotal"] = 0;
        //resto el precio de producto eliminado
        $_SESSION["eurosTotal"] = 0;
        unset($_SESSION['cartlines']);
    }
    }
}
//Login
if(isset($_GET["user"]) && isset($_GET["password"])){
    $user = new Users();
    $array = $user->login($_GET["user"], $_GET["password"]);
    if(count($array)>0){
        $_SESSION['user']=$_GET["user"];
        $_SESSION['idCliente']=$array[0]['nifUser'];
    }
}
//Devolver
if(isset($_GET["cantDevolver"]) && isset($_GET["refPedido"])){
    $pedido = new Pedido();
    $result= $pedido->devolverPedido($_GET["refPedido"],$_GET["cantidad"],$_GET["cantDevolver"], $_GET["idProducto"] );
    if($result==true){

    }
}

require_once 'views/header.php';

?>

<!-- Page Content -->
<div class="container-fluid">

    <div class="d-flex bd-highlight">

        <div class="col-lg-2">

            <?php
            require_once 'views/sidebar.php';
            ?>
            <?php
            require_once 'views/filters.php';
            ?>
        </div>

        <div class="col-lg-8">
            <?php
            if(isset($_GET['cartDetail']))
            {
                require_once 'views/cartDetail.php';
            }
            else if(isset($_GET['registration'])){

                require_once 'views/registration.php';
            }
            else if(isset($_GET['upGame'])){

                require_once 'views/upGame.php';
            }
           else if(isset($_GET['pedidos'])){

                require_once 'views/pedidos.php';
            }
            else if(isset($_GET['devoluciones'])){

                require_once 'views/devoluciones.php';
            }
            else {
                require_once 'views/main.php';
            }
            ?>
        </div>

        <div class="col-lg-2">
            <?php
            include "views/myAccount.php";
            ?>
            <!-- Ofertas y novedades -->
            <?php
            include "views/news.php";
            ?>
            <!-- Lista de juegos más demandados entre otras cosas -->
            <?php
            include "views/featuredGames.php";
            ?>
            <!-- Listado de los juegos que se han subido recientemente-->
            <?php
            include "views/recentlyUploaded.php";
            ?>
            <!-- Lista de las categorías de juegos más vendidas-->
            <?php
            include "views/bestSellingCategory.php";
            ?>
        </div>

    </div>
    <?php
    require_once 'views/footer.php';
    ?>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                if(isset($_SESSION['user'])){
                    echo '                
                <h5 class="modal-title" id="exampleModalLabel">Compra Realizada</h5>';
                }else{
                    echo '                
                <h5 class="modal-title" id="exampleModalLabel">Error: Necesario Iniciar Sesión</h5>';
                }

                ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if(isset($_SESSION['user'])){
                    echo 'Su compra se ha realizado con exito. Muchas Gracias por confiar en nosotros.
';
                }else{
                    echo 'Para realizar la coompra es obligatorio iniciar sesión.';
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('select[name="idProvi"]').change(function() {
            var selected_option_value=$("#idProvi option:selected").val();
            //alert(selected_option_value);
           window.history.pushState('index.php?registration=registration', 'Registrar', "index.php?registration=registration&province="+selected_option_value);
           location.reload();
        });
    });

    function getModal(){
        $.ajax({
            url: 'index.php?cartDetail=cartDetail&comprar=comprar',
            type: 'get',
            success: function(response) {
                console.log(response);
                $('#exampleModal').modal('show');

            }
        });

    }


    function letraDNI(){
        var letter = document.getElementById("nifLet");
        var dni = document.getElementById("nifNum").value;
        // Un array donde guardar las letras
        var letras = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "j", "Z", "S", "Q", "V", "H", "L", "C", "K", "E", "F"];
        // Calculamos el resto de dividir el número del dni entre 23 posiciones del array
        var resto = dni % 23;
        // guardamos en la variable letra el resultado anterior que coincide con la posición del array
        var letra = letras[resto];
        // retorna el valor (letra);
        letter.value=letra;
    }
</script>

