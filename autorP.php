<?php
include "funciones.php";
include "defcon.php";
$campo1="0";
$campo2="0";
if(!$_POST['nombre']){  
    $campo1="1";
    if(!$_POST['apellido1']){  
    $campo2="1";
echo header("location: autorG.php?faltacampo1=$campo1&faltacampo2=$campo2");}}
else{
    
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido1=$_POST['apellido1'];
$nacionalidad=$_POST['nacionalidad'];



$query="INSERT INTO autor
        (nombre, apellido1, apellido2,nacionalidad)
        VALUES
        ($nombre, $apellido1, $apellido2,$nacionalidad)";

$result=  mysql_query($query);
}



?>
