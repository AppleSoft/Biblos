<?php

$titulo = $_POST['titulo'];
$id_autor = $_POST['autor'];
$id_categoria = $_POST['categoria'];
$id_idioma_639_1 = $_POST['idiomas_639_1'];
$id_editorial = $_POST['editorial'];
$isbn = $_POST['isbn'];
$fecha_publicacion = $_POST['fecha_publicacion'];
$fecha_adquisicion = $_POST['fecha_adquisicion'];
$num_paginas = $_POST['num_paginas'];
$sinopsis = $_POST['sinopsis'];
$edicion = $_POST['edicion'];

include "conexion.php";
include "funciones.php";

$q1 = "SELECT apellido1 FROM autor where id_autor=$id_autor";
$rt1 = mysql_query($q1);
$r1 = mysql_fetch_row($rt1);
$rf1 = $r1[0];
$rf1 = substr($rf1, 0, 3);
$rf2 = substr($titulo, 0, 3);
$dewey = calcularDewey($id_categoria, $id_autor, $titulo);
echo $dewey;

$query = "INSERT INTO libro ( 
    categoria_id_categoria, cod_apellido,    cod_titulo,    isbn,    titulo,    fecha_publicacion,    fecha_adquisicion,    num_paginas,
    sinopsis,    edicion,    autor_id_autor,    editorial_id_editorial,    idiomas_639_1_id_idioma_639_1 )
        VALUES (
        '$id_categoria','$rf1','$rf2','$isbn','$titulo','$fecha_publicacion','$fecha_adquisicion','$num_paginas',
        '$sinopsis','$edicion','$id_autor','$id_editorial','$id_idioma_639_1')
";
$result = mysql_query($query);
?>
