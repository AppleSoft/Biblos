<?php
session_start();
include "funciones.php";
conexion();
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido1'];
$nacionalidad=$_POST['nacionalidad'];
$query="INSERT INTO autor
        (nombre, apellido1, apellido2,nacionalidad)
        VALUES
        ('$nombre', '$apellido1', '$apellido2','$nacionalidad')";

$result=  mysql_query($query);

controlQuery($result, 'Alta autor terminada con exito', 'Se ha verificado un error al dar de alta', 5, 'autorG.php');

?>
