<?php

	$mysqli = mysqli_connect("localhost", "root", "", "checkpointgames");
        if($mysqli){
        }else{
            echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
        }

	// Coger la referencia del ultimo id de producto de la base de datos
	$query = "SELECT idGame FROM games ORDER BY idGame DESC LIMIT 1";
    $resultado=$mysqli->query($query);
    	if($resultado->num_rows > 0){
    		while($ref = $resultado -> fetch_assoc()){
	            $ultiRef = $ref['idGame'] + 1;
	        
        	}
    	}

    	else{
	            $ultiRef = 1;
	        }
        
?>

<section class="bodyRegistro">
	<form class="form_contact" method="post" enctype="multipart/form-data" action="http://localhost/checkPointGames/index.php?registro=4">
		<table style="width:100%" class="tableSubir">
			<tr class="tableSubir">
				<td colspan="3" class="tableSubir">
					<h2>FORMULARIO PARA SUBIR PRODUCTO</h2>
				</td>
			</tr>

			<tr class="tableSubir">
				<!-- Número de referencia -->
				<td colspan="3" class="ref">
					<label for="ref">
						<h1>Ref.Producto
							<p id="ultiRef">
								<?php
									echo $ultiRef;
								?>
							</p>
						</h1>
					</label>
				</td>
			</tr>
			
			<tr class="tableSubir">
				<!-- Foto previsualizada -->
				<td rowspan="4" class="tableSubir">
					<div id="imagePreview">
						<img src="images/coversGames/game_empty.png" style="width: 50%" style="height: 50%" style="padding-left: 35px">
						<!-- Imagen cargada -->
					</div>
				</td>

				<td class="tableSubir">
					<!-- Etiqueta nombre juego -->
					<label for="nom">Nombre del juego: </label>
				</td>

				<td class="tableSubir">
					<!-- Etiqueta descripción -->
					<label for="nom">Descripción: </label>
				</td>
			</tr>

			<tr class="tableSubir">
				<td class="tableSubir">
					<!-- Campo texto nombre juego -->
					<input type="text" name="txtName" id="nomSub" class="txtArea">
				</td>

				<td rowspan="5" class="tableSubir">
					<!-- Campo texto descripción -->
					<input type="text" name="txtDescrip" class="txtArea" >
				</td>
			</tr>

			<tr class="tableSubir">
				<td class="tableSubir">
					<!-- Etiqueta precio -->
					<label for="nom">Precio: </label>
				</td>
			</tr>

			<tr class="tableSubir">
				<td class="tableSubir">
					<!-- Campo texto precio -->
					<input type="text" name="txtPrice" id="precio" class="txtArea">
				</td>
			</tr>

			<tr class="tableSubir">
				<td class="tableSubir">
					
					<label>Selecciona la plataforma: </label>
					<!-- Seleccionar categoría (plataforma) -->
					<?php

			          // Mostrar las categorias en el selector de plataformas
			          $query = "SELECT idCategory, nombre FROM category";
			          $resultado=$mysqli->query($query);

			          echo "<select name='platCat'>";
			          // Insertar cada opción
			          if($resultado-> num_rows > 0){
			            while ($rows = $resultado->fetch_assoc()) {
			              echo '<option value="'.$rows["idCategory"].'">'.$rows["nombre"].'</option>';
			            }
			          }  
			          echo "</select>";
              		?>
					
				</td>
				<td class="tableSubir">
					<!-- Etiqueta oferta -->
					<label for="nom">Oferta </label>
					<!-- CheckBox oferta -->
					<input type="checkbox" name="checkOfert" value=1>
				</td>
			</tr>

			<tr class="tableSubir">
				<td class="tableSubir">

					<label>Selecciona un género: </label>
					<!-- Seleccionar subcategoría (género) -->
					<?php
			          // Mostrar las subcategorias en el selector de plataformas
			          $query = "SELECT nombreSub, idSubCategory FROM subcategory";
			          $resultado=$mysqli->query($query);

			          echo "<select name='SubCat'>";
			          // Insertar cada opción
			          if($resultado-> num_rows > 0){
			            while ($rows = $resultado->fetch_assoc()) {
			              echo '<option value="'.$rows["idSubCategory"].'">'.$rows["nombreSub"].'</option>';
			            }
			          }  
			          echo "</select>";
              		?>
				</td>

				<td class="tableSubir">
					<!-- Etiqueta novedad -->
					<label for="nom">Novedad: </label>
					<!-- CheckBox novedad -->
					<input type="checkbox" name="checkNew" value=1>
				</td>
			</tr>

			<tr class="tableSubir">
				<td colspan="3" class="tableSubir">
					<!-- Etiqueta subir foto -->
					<label for="nom">Subir Foto: </label>
					<!-- Botón Examinar archivo -->
					<input type="file" name="archivo" accept="image/*" class="btnPrueba" id="archivo">
					<!-- Botón subir archivo -->
					<input id="myBtn" type="submit" name="submitUp" class="btnSubir" value="Subir juego"><p class="txtBtnWhite">Novedades</p></input>

					<!-- Ventana modal-->
					<div id="myModal" class="modal">

					  <!-- contenido de la ventana modal-->
					  <div class="modal-content">
					    <span class="close">&times;</span>
					    <p>
					    	<?php

					    	$newGame = $_SESSION['txtName'];

					    	// Recorrer la base de datos en busca de una coincidencia con el nombre
							$query = "SELECT idGame, nameGame FROM games ORDER BY nameGame";
						    $resultado=$mysqli->query($query);
								while($ref = $resultado -> fetch_assoc()){
						            if($newGame == $ref['nameGame']){
						            	$bdName = $ref['nameGame'];
						            	$refRepit = $ref['idGame'];
						            }
						            
						    	}

						    	echo "El valor es:".$bdName;
					    	// Si el nombre del juego coincide con con alguno de la base de datos existente
							if($newGame == $bdName){
								echo "Este producto ya existe en la base de datos y la referencia es ".$refRepit."";
							}
							else{
								include("subir.php");
							}

					    	?>

					    </p>
					  </div>

					</div> 

				</td>
			</tr>
		</table>
	</form>
</section>

<script type="text/javascript">
	
	// Función para comprobar el nombre del juego al subir
    // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
</script>
