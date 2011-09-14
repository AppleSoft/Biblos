<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$titulo=$_POST['titulo'];
$autor=$_POST['id_autor'];

$query = "DELETE FROM libro where titulo='".$titulo."'";

mysql_query($query) or die (mysql_error());

echo "La operacion fue exitosa, borraste el libro <b>$titulo</b> de <b>".$autor."</b><br>";
echo "Seras redireccionado en 5 segundos...";
header ("refresh:5; url=borraLibroG.php");

?>