<?php
include "funciones.php";
conexion();
$nombre_editorial=$_POST['nombre_editorial'];
$query="INSERT INTO editorial
        (nombre_editorial)
        VALUES
        ($nombre_editorial)";
$resultado=  mysql_query($query);
?>
