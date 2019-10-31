<?php


class Municipio
{
    function getData($provincia){

        $sql = 'SELECT m.id, m.provincia, m.municipio FROM municipios m, provincias p WHERE p.provincia = "'.$provincia.'"and p.id=m.provincia';
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }


}


/*session_start();

$conexion = mysqli_connect("localhost", "root", "parribadellio*89", "checkpointgames");
if($conexion){
}else{
    echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
}
mysqli_query ($conexion,"SET NAMES 'utf8'");
mysqli_set_charset($conexion, "utf8");
$provincia = "Salamanca";
echo $provincia;
$sql = 'SELECT m.id, m.provincia, m.municipio FROM municipios m, provincias p WHERE p.provincia = "'.$provincia.'"and p.id=m.provincia';
$result = $conexion->query($sql);
if(!$result = mysqli_query($conexion, $sql)) die(mysqli_error($conexion));
$datamun = array();
//guardamos en un array multidimensional todos los datos de la consulta
$i=0;
while($row = mysqli_fetch_array($result))
{
    $datamun[$i] = $row['municipio'];
    $i++;
}
//echo json_encode($datamun);
//echo "ggtb";
print_r($datamun);
$_SESSION['data']= $datamun;
$conexion->close();*/








