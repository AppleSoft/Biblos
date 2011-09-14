<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$titulo=$_POST['titulo'];
$autor=$_POST['id_autor'];
$categoria=$_POST['id_categoria'];
$idioma=$_POST['id_idioma_639_1'];
$isbn=$_POST['isbn'];
$fecha_pub=$_POST['fecha_publicacion'];
$fecha_adq=$_POST['fecha_adquisicion'];
$paginas=$_POST['num_paginas'];
$sinopsis=$_POST['sinopsis'];
$edicion=$_POST['edicion'];
$editor=$_POST['id_editorial'];
$categoria_dewey=$_POST['libro_categoria_id_categoria'];
$apellido_dewey=$_POST['libro_cod_apellido'];
$titulo_dewey=$_POST['libro_cod_titulo'];

$query = "UPDATE libro set 
    edicion='".$edicion."', 
    num_paginas='".$paginas."', 
    sinopsis='".$sinopsis."',
    fecha_publicacion=str_to_date('$fecha_pub','%d/%m/%Y'),
    fecha_adquisicion=str_to_date('$fecha_adq','%d/%m/%Y'),
    isbn='".$isbn."'
    where titulo='".$titulo."'";

mysql_query($query) or die ('Hubo un problema al guardar las modificas');


echo "Enhorabuena, modificaste el libro <b>$titulo</b> de <b>".$autor."</b><br>";
echo "Seras redireccionado en 5 segundos...";
header ("refresh:5; url=modificaLibroG.php");


?>