<?php

	//include "./conexionPHP.php";
	//$conexion = conectar();

	$mysqli = mysqli_connect("localhost", "root", "parribadellio*89", "checkpointgames");
    if($mysqli){
    }else{
        echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
    }

	$newGame = $_SESSION['txtName'];
    $newPrice = $_SESSION['txtPrice'];
    $newDescrip = $_SESSION['txtDescrip'];
    $newOfert = (isset($_SESSION['checkOfert'])) ? 1 : 0;
    $newNew = (isset($_SESSION['checkNew'])) ? 1 : 0;
    $newCategory = $_SESSION["platCat"];
    $newSubCategory = $_SESSION["SubCat"];

	include("busqueda.php");

	//$numRef = $_POST['nrefe'];
	//echo "num: ".$numRef;


	/*
	if (isset ($_POST['checkNew'])){
		$newNew = $_POST['checkNew'];
	}

	$mysqli->query("INSERT INTO game (refGame, nameGame, price, description, stock, ofert, new, nameImg) VALUES (2, '$newGame', $newPrice, 'txtDescrip', 4, 1, newNew, 'nombreImagen2')");
	*/

	//$mysqli->query("INSERT INTO game (refGame, nameGame, price, description, stock, ofert, new, nameImg) VALUES (1, 'Juego1', 50, 'Texto de prueba', 3, 1, 0, 'nombreImagen1')");

	//$query = "SELECT * FROM game";
	//$resultado=$mysqli->query($query);

	/*
	echo '<pre>';
	print_r($_FILES['archivo']);
	echo '</pre>';
	*/
	
	// Variables con la ruta temporal y nombre del archivo ($newNameImg)
	$temporal = $_FILES['archivo'] ['tmp_name'];
	$newNameImg = $_FILES['archivo'] ['name'];

	//Abrir la foto original
	// Si el archivo es JPG
	if($_FILES['archivo'] ['type'] == 'image/jpeg'){
		$original = imagecreatefromjpeg($temporal);
	}
	// Si el archivo es PNG
	else if($_FILES['archivo'] ['type'] == 'image/png'){
		$original = imagecreatefrompng($temporal);
	}
	// En caso de un formato erróneo
	else{
		die ('El formato no es válido. Solo jpg o png');
	}

	// En estas dos variables se guardará el ancho/alto de la imagen original subida
	$ancho_original = imagesx($original);
	$alto_original = imagesy($original);

	// Crear un lienzo vacío (foto destino 156x216 px)
	// Escalar proporcionalmente la imagen al formato deseado:
	$ancho_nuevo = 156;
	$alto_nuevo = round($ancho_nuevo * $alto_original / $ancho_original);
	$copia = imagecreatetruecolor($ancho_nuevo, $alto_nuevo); // para imagenes con más calidad

	//copiar original a la copia
	// 1-2 destinos-original
	// 3-4 eje X-ejeY de la copia --> 0,0
	// 5-6 eje X-eje Y del original --> 0,0
	// 7-8 ancho-alto de la iamgen destino --> WIDTH - HEIGHT
	// 9-10 ancho-alto de la iamgen original --> WIDTH - HEIGHT
	imagecopyresampled($copia, $original, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho_original, $alto_original);

	// exportar/guardar iamgen
	imagepng($copia, "../images/coversGames/upGames/".$newNameImg, 5); 
	

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

	// Recorrer la base de datos en busca de una coincidencia con el nombre
	$query = "SELECT idGame, nameGame FROM games ORDER BY nameGame";
    $resultado=$mysqli->query($query);
		while($ref = $resultado -> fetch_assoc()){
            if($newGame == $ref['nameGame']){
            	$bdName = $ref['nameGame'];
            	$refRepit = $ref['idGame'];
            }
            
    	}

	// Si el nombre del juego coincide con con alguno de la base de datos existente
	if($newGame !== $bdName){
		// añadir juego a la base de datos
		$mysqli->query("INSERT INTO games (idGame, nameGame, price, idCategory, idSubCategory, description, stock, ofert, new, nameImg) VALUES ('$ultiRef', '$newGame', '$newPrice', '$newCategory', '$newSubCategory', '$newDescrip', 0,' $newOfert', '$newNew', '$newNameImg')");
	}

?>
