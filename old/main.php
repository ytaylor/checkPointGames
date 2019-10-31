
<form method="post"> 
  <section>
        <?php
        require_once 'controllers/functions.php';
        if($resultado-> num_rows > 0){
            while ($rows = $resultado->fetch_assoc()) {
              echo '
              <div class="col-4">
                <div class="box1">
                  <div id="boxLeft">
                    <h2>
                      <img src="images/coversGames/'.$rows["nameImg"].'" width="100%" height="100%">
                    </h2>
                    <h2>
                      <p class="txtPurple">Precio: '.$rows["price"].'€</p>
                      <input type="hidden" name="price" value="'.$rows["price"].' id="price"></input>';
                      if($rows["new"] == 1){
                        echo'<img src="images/icons/icon_new.png" width="45%" height="45%">';
                      }
                      if($rows["ofert"] == 1){
                        echo'<img src="images/icons/icon_ofert.png" width="45%" height="45%">';
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
                        <a></a>
                        <button class="btnBuy" name="btnBuy">
                          <img src="images/icons/icon_cart.png" width="10%" height="40%"> 
                          <a href="http://localhost/checkPointGames/index.php?price='.$rows["price"].'">COMPRAR</a>
                        </button>
                      </h2>
                  </div>
                </div>
              </div>
              ';
            }
          }
        ?>
  </section> 
</form>


