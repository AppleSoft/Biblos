<?php
include "funciones.php";
include "defcon.php";
$campo1="0";
if(!$_POST['nombre_editorial']){  
    $campo1="1";
echo header("location: editorialG.php?faltacampo1=$campo1&faltacampo2=$campo2");}
else{
 
$nombre_editorial=$_POST['nombre_editorial'];

$query="INSERT INTO editorial
        (nombre_editorial)
        VALUES
        ($nombre_editorial)";

$resultado=  mysql_query($query);
}
?>
