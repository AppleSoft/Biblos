<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$id_editorial=$_POST['id_editorial'];
$nombre_editorial=$_POST['nombre_editorial'];

$query = "UPDATE editorial set 
    nombre_editorial='".$nombre_editorial."', 
    where id_editorial='".$id_editorial."'";

$result = mysql_query($query);

controlQuery($result, 'Editorial modificada con exito', 'Se ha verificado un error al modificar la editorial', 5, 'modificaEditorialG.php');

?>