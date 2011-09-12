<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$categoria=$_POST['categoria'];
$idioma=$_POST['idioma'];
$isbn=$_POST['isbn'];
$fecha_pub=$_POST['fecha_publicacion'];
$fecha_adq=$_POST['fecha_adquisicion'];
$paginas=$_POST['paginas'];
$sinopsis=$_POST['sinopsis'];
$edicion=$_POST['edicion'];
$editor=$_POST['editor'];
$categoria_dewey=$_POST['libro_categoria_id_categoria'];
$apellido_dewey=$_POST['libro_cod_apellido'];
$titulo_dewey=$_POST['libro_cod_titulo'];

$query = "UPDATE libro set 
    edicion='".$edicion."', 
    editor='".$editor."', 
    paginas='".$paginas."', 
    sinopsis='".$sinopsis."',
    fecha_publicacion='".$fecha_pub."',
    fecha_adquisicion='".$fecha_adq."',
    isbn='".$isbn."'
    where titulo='".$titulo."'";

mysql_query($query) or die ("problema con query");

echo "enhorabuena, modificaste el libro";

?>