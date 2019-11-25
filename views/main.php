<?php
//Incluimos todas las clases y funciones del proyecto
$games = new Games();
$array = $games->getData();
?>
<div class="row">
    <div class="card-group">

    <?php
foreach ($array as $item=>$rows){

    echo ' <div class="col-4">
<div class="card mb-2" style="max-width: 540px;">
    <div class="row no-gutters">
        <div id="boxLeft">
          <h2>
            <img src="images/coversGames/'.$rows["nameImg"].'" width="65%" height="55%">
          </h2>
          <h2>
            <p class="txtPurple">Precio: '.$rows["price"].'€</p>
            <input type="hidden" name="price" value="'.$rows["price"].' id="price"></input>';
            if($rows["new"] == 1){
              echo'<img src="images/icons/icon_new.png" width="20%" height="12%">';
            }
            if($rows["ofert"] == 1){
              echo'<img src="images/icons/icon_ofert.png" width="20%" height="12%">';
            }
        echo'
          </h2>
        </div>

        <div id="boxRight">
          <h2 class="txtPurple">Nombre: '.$rows["nameGame"].' - '.$rows["nombre"].' -</h2>
          <h2>
            <p>'.$rows["description"].'</p>
            </h2>
            <h2>
              <button class="btnBuy" name="btnBuy">
                <img src="images/icons/icon_cart.png" width="10%" height="40%"> 
                <a href="index.php?price='.$rows["price"].'&ref='.$rows["idGame"].'&nameGame='.$rows["nameGame"].'&cat='.$rows["nombre"].'&stockLimit='.$rows["stock"].'" type="button" class="btnBuy">Comprar</a>
              </button>
            </h2>
        </div>
    </div>
</div>
</div>';
}
?>
</div>
</div>
