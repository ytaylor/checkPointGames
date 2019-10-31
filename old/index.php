<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>CheckPoint Game</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/estilosHome.css">
    <link rel="stylesheet" type="text/css" href="../css/fontello.css">
  </head>

    <body>
      <!-- CABECERA -->
      <header>
        <!-- HEADER - cabecera superior de la web -->
        <?php

          session_start(); // Recoger las variables globales para todas las páginas
   if(!isset($_SESSION["udsTotal"]) && !isset($_SESSION["eurosTotal"])){
                $_SESSION["udsTotal"] = 0;
                $_SESSION["eurosTotal"] = 0;
          }
          if(isset($_GET['price'])){
                echo "<script>alert('Estoy aqui')</script>";

                // ... Añadirá 1 al total de unidades y X euros del producto seleccionado.
                $_SESSION["udsTotal"] = $_SESSION["udsTotal"] + 1;
                $_SESSION["eurosTotal"] = $_SESSION["eurosTotal"] + $_GET["price"];

          }
          include "views/header.php";
        ?>
      </header>

      <!-- PANEL GENERAL -->
      <section>
        <!-- panel izquierdo - categorias y busqueda avanzada. -->
        <panelLeft>
          <!-- categorías -->
          <?php
            include "views/category.php";
          ?>

          <!-- Búsqueda avanzada -->
          <?php
            include "views/filters.php";
          ?>
        </panelLeft>
        
        <!-- Panel Central/ artículos.-->
        <panelCentral>

          <?php
       
          if(isset($_GET['registro'])){

            if($_GET['registro'] == 0){
                include "views/main0.php";
            }

            if($_GET['registro'] == 2){
              // Si existe ese valor que viene por POST...
                if (isset($_POST["provincia"])) {
                  //... guardalo en la variable SESSION de provincia el valor que viene por POST.
                    $_SESSION['provincia'] = $_POST['provincia'];
                }
                include "views/registration.php";
            }

            if($_GET['registro'] == 3){
                include "views/recoverPassw.php";
            }

            if($_GET['registro'] == 4){
                // Valores que llegan desde mi formulario subir juego.
                 if(isset($_POST["txtName"]) &&
                 isset($_POST["txtPrice"]) &&
                 isset($_POST["txtDescrip"]) &&
                 isset($_POST["checkOfert"]) &&
                 isset($_POST["checkNew"]) &&
                 isset($_POST["platCat"]) &&
                 isset($_POST["SubCat"])){
                      $_SESSION["txtName"] = $_POST["txtName"];
                      $_SESSION["txtPrice"] = $_POST["txtPrice"];
                      $_SESSION["txtDescrip"] = $_POST["txtDescrip"];
                      $_SESSION["checkOfert"] = $_POST["checkOfert"];
                      $_SESSION["checkNew"] = $_POST["checkNew"];
                      $_SESSION["platCat"] = $_POST["platCat"];
                      $_SESSION["SubCat"] = $_POST["SubCat"];
                      echo "POST ".$_POST["txtName"];
 
                 }
                include "views/upGame.php";
            }

            if($_GET['registro'] == 5){
              // Comprobar si el num de categoría(cat) y subcategoría(sub) se corresponden
              if(isset($_GET['cat'])){
                $_SESSION['cat'] = $_GET['cat'];
                $_SESSION['subcat'] = $_GET['subcat'];
                include "views/main.php";
              }
            }

            
          }
          else{
              include "views/main0.php";
          }
          ?>

        </panelCentral>

        <!-- Panel derecho - Login y productos demandados.-->
        <panelRight>
          <!-- Login - Registrar Usuario -->
          <?php
            include "views/myAccount.php";
          ?>

          <!-- Ofertas y novedades -->
          <?php
            include "views/news.php";
          ?>

          <?php
            include "views/oferts.php";
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
        </panelRight>
      </section>

      <!-- Pie de página - iconos redes sociales.-->
      <?php
        include "views/footer.php";
      ?>
    </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- incluir mi archivo java Script-->
  <script src="../models/allJavaScript.js"></script>
</html>
