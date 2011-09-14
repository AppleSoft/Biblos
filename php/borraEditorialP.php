<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$id_editorial=$_POST['id_editorial'];
$nombre_editorial=$_POST['nombre_editorial'];
$query = "DELETE FROM editorial where id_editorial='".$id_editorial."'";

$result=mysql_query($query);
controlQuery($result, 'La editorial se elimino con exito', 'Error al eliminar la editorial', 5, 'borraEditorialG.php')
?>