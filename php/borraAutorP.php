<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$id_autor=trim($_POST['id_autor']);
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$nacionalidad=$_POST['nacionalidad'];

$query = "DELETE FROM autor where id_autor='".$id_autor."'";
$result = mysql_query($query);
echo mysql_error();
controlQuery($result, 'Autor eliminado con exito', 'Se ha verificado un error al eliminar el autor', 5, 'borraAutorG.php');

?>