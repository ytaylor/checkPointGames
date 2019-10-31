  <div class="block">
    <p class="txtPurple" style="text-align: center">CATEGORIAS</p>
    <div class="txtLateral">

      <div class="nav">

        <?php
            $categorias = new Categoria();
            $array = $categorias->getData();

            foreach ($array as $key=>$rows) {
                echo("<button class='btnDrop'><img class='imagCat' src='images/icons/" . $rows['icon'] . "'>"
                    . $rows["nombre"] .
                    "<span class='icon-down-open'></span></button></button>"); // Icono consola, nombre e icono flecha

                $subcategories = $categorias->getDataSubcategorias($rows['idCategory']);

                echo '<li class="dropDown">';
                echo "<ul>";
                foreach ($subcategories as $item2 => $rows2) {
                    echo '<li class="panelI"><a href="index.php?cat=' . $rows2["idCategory"] . '&subcat=' . $rows2["idSubCategory"] . '&registro=5" class="txtclick">' . $rows2["nombreSub"] . '</a></li>';
                }
                echo "</ul>";
                echo "</li>";
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
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling; //cógeme el proximo elemento
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
</script>

