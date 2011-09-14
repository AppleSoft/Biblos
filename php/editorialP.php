<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$nombre_editorial=$_POST['nombre_editorial'];
$query="INSERT INTO editorial
        (nombre_editorial)
        VALUES
        ('$nombre_editorial')";
$resultado=  mysql_query($query);
controlQuery($resultado, 'Alta editorial efectuada con exito', 'Se ha verificado un error al dar de alta', 5, 'editorialG.php');
?>
