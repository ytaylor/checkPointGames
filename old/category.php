  <div class="block">
    <p class="txtPurple" style="text-align: center">CATEGORIAS</p>
    <div class="txtLateral">

      <div class="nav">

        <?php
          header ('Content-type: text/html; charset=utf-8');
          include ("conexionPHP.php");

          // Mostrar las categorias
          $query = "SELECT idCategory, nombre, icon FROM category";
          $resultado=$mysqli->query($query);
          if($resultado-> num_rows > 0){
            while ($rows = $resultado->fetch_assoc()) {
              echo("<button class='btnDrop'><img class='imagCat' src='images/icons/".$rows['icon']."'>"
                .$rows["nombre"].
                "<span class='icon-down-open'></span></button></button>"); // Icono consola, nombre e icono flecha

                // Mostrar las subcategorias
                $query = "SELECT nombreSub, idCategory, c.idSubCategory FROM subcategory s, categorysubcategory c WHERE s.idSubCategory = c.idSubCategory  
                AND c.idCategory = ".$rows ['idCategory']."";
                  $resultadoSub=$mysqli->query($query); 
                    echo'<li class="dropDown">';
                      echo"<ul>";
                        while ($rows = $resultadoSub->fetch_assoc()) {
                         echo'<li class="panelI"><a href="index.php?cat='.$rows["idCategory"].'&subcat='.$rows["idSubCategory"].'&registro=5" class="txtclick">'.$rows["nombreSub"].'</a></li>';
                        }
                      echo"</ul>";
                    echo"</li>";
            }
          }
        ?>
        </div>
    </div>
  </div>

<script>
/* DROPDOWN -> Menú desplegable */
var dropdown = document.getElementsByClassName("btnDrop");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");

  var dropdownContent = this.nextElementSibling; //cógeme el proximo elemento

  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";

  
  } 
  else {
  dropdownContent.style.display = "block";
  }


  /*
  // Ocultar el resto
  for (var j = 0; j < dropdown.length; j++) {
    if (j != i) {
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } 
      else {
      dropdownContent.style.display = "block";
      }
    }
  }
  */
  });
}
</script>
