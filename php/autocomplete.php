<?php
include "defcon.php";
$busqueda_criterio = strtolower($_GET["crit"]);
$busqueda_usuario = strtolower($_GET["q"]);
if (!$busqueda_usuario) return;

$desde=count($busqueda_usuario);

$query_titulo = "select titulo from libro where titulo LIKE '%$busqueda_usuario%'";
$titulos=mysql_query($query_titulo);

/*
$query_autor = "select nombre, apellido1, apellido2 from autor where nombre LIKE '%$busqueda_usuario%' OR appelido1 LIKE '%$busqueda_usuario%' OR appelido2 LIKE '%$busqueda_usuario%'";
$autores=mysql_query($query_autor);
$query_editor = "select nombre_editorial from editorial where nombre_editorial LIKE '%$busqueda_usuario%'";
$editores=mysql_query($query_editor);
$medio1=array_merge($titulos,$autores);
$medio2=array_merge($medio1,$editores);
$items=array_merge($medio1,$medio2);
*/
$cuantos=mysql_num_rows($titulos);

for ($i=0;$i<$cuantos;$i++) {
while ($prova=mysql_fetch_row($titulos)){
    echo $prova[$i]."\n";
}
}

?>