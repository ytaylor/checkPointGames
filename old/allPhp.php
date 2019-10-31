<?php


//---------------------- REGISTRATION -----------------------------------

// SELECCIONAR PROVINCIA
function selectProvince(){

    // conecta con la Base de Datos
    include ("conexionPHP.php");

    $provincia = $_SESSION['provincia'];
    echo "<option>" . $provincia . "</option>";


// Coger el valor de todas las provincias de la BD
    $query = "SELECT id, provincia FROM provincias";
    // Guarda  en la variable resultado la ejecución de la consulta
    $resultado=$mysqli->query($query);
        // Recorre cada fila y lo va a mostrar en el combo
        if($resultado->num_rows > 0) {
            // fetch_assoc coge el valor actual durante el while
            while ($fila = $resultado->fetch_assoc()) {

                echo "
                    <option>
                        " . $fila['provincia'] . "
                    </option>
                ";



            }
        }
}

// SELECCIONAR LOCALIDAD
function selectLocation(){

    include ("conexionPHP.php");
    if(isset($_SESSION["provincia"])) {
        $provincia = $_SESSION['provincia'];
        //echo "<option>" . $provincia . "</option>";


    //Coger el valor de todas las localidades de la BD
    $query = "SELECT m.id, m.provincia, m.municipio FROM municipios m, provincias p WHERE p.provincia = '$provincia' and p.id=m.provincia";
    // Guarda  en la variable resultado la ejecución de la consulta
    $resultado=$mysqli->query($query);
        // Recorre cada fila y lo va a mostrar en el combo
        if($resultado->num_rows > 0) {
            // fetch_assoc coge el valor actual durante el while
            while ($fila = $resultado->fetch_assoc()) {

                echo "
                    <option>
                        " . $fila['municipio'] . "
                    </option>
                ";

            }
        }
    }
}

?>