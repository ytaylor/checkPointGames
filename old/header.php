<?php 
  include("allPhp.php");
 ?>

<section>
  <table>
    <tr class="tableHeader">
      <!-- LOGO -->
      <th>
        <a href="index.php?registro=0"><img src="images/icons/logo_completo.png" width="65%" height="65%"></a>
      </th>
      <!-- BUSCADOR -->
      <th style="width:50%">
        <section>
          <form action="method">        
            <input class="searchBar" type="search" placeholder="Busca en todas las categorias...">         
            <button>Buscar</button>
          </form>
        </section>
      </th>
      <!-- MI CESTA / CARRO -->
      <th style="width:25%">
        <table class="cart">
          <tr>
            <td>
              <img src="images/icons/icon_cart.png" width="40%" height="40%">
            </td>
            <td>
              <?php 
                // Inicio una sesión con las variables de unidades y total de euros en el carrito
              // En el caso de que no exista un número total de unidades y euros se aplica la condición
              if(!isset($_SESSION["udsTotal"]) && !isset($_SESSION["eurosTotal"])){
                $_SESSION["udsTotal"] = 0;
                $_SESSION["eurosTotal"] = 0;
              }

              // Si recoge algún valor por POST del formulario al hacer clic en el botón de comprar...
              
                // Imprime por pantalla el resultado.
                echo '<label class="cartText">Uds: '.$_SESSION["udsTotal"].'</label><br>
                  <label class="cartText">Euros: '.$_SESSION["eurosTotal"].'</label><br>
                  <a href="#">Detalle</a>
                ';

               ?>
            </td>
            <td colspan="2">
              <input type="submit" value="Mi cesta" onclick = "location='index.php?registro=0'" class="btnBuy"/>
            </td>
          </tr>
        </table>
      </th>
    </tr>
  </table>
</section>



  