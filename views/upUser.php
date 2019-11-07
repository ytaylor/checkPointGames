<?php

	$newNif = $_POST['nifNum'].$_POST['nifLet'];
	$newName = $_POST['nom'];
	$newLastName = $_POST['ape'];
	$newPhone = $_POST['tlf'];
	$newAddress = $_POST['dire'];
	$newPostal = $_POST['cp'];
	$newProvince = $_POST["idProvi"];
	$newLocation = $_POST["idLocal"];
	$newNick = $_POST['nick'];
	$newEmail = $_POST["mail"];
	$newPassW = $_POST["passw"];
	$newRpassW = $_POST["rpassw"];

	// Comprobar que todos los campos están rellenados
	if($newNif== null || $newName == null || $newLastName == null ||
		$newPhone == null || $newAddress == null || $newPostal == null ||
		$newNick == null){

		echo "Error. Rellena todos los campos, por favor";
	}
	else{
		// Comprobar si las contraseñas coinciden y el email es correcto
		if($newPassW == $newRpassW && filter_var($newEmail, FILTER_VALIDATE_EMAIL)){

			// añadir juego a la base de datos
			$mysqli->query("INSERT INTO users (nifUser, name, lastName, phone, address, postal, location, province, nick, email, password) VALUES ('$newNif', '$newName', '$newLastName', '$newPhone', '$newAddress', '$newPostal', '$newLocation', '$newProvince', '$newNick', '$newEmail', '$newPassW')");
		}
		else{
			echo "La contraseña y/o el email no está bien escrito. Vuelve a intentarlo.";
		}
	}

?>
