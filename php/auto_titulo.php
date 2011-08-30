<?php

include "defcon.php";
$busqueda_usuario = strtolower($_GET["q"]);
if (!$busqueda_usuario)
    return;
$desde = count($busqueda_usuario);
$query_titulo = "select titulo from libro where titulo LIKE '%$busqueda_usuario%'";
$titulos = mysql_query($query_titulo);
$cuantos = mysql_num_rows($titulos);
for ($i = 0; $i < $cuantos; $i++) {
    while ($var = mysql_fetch_row($titulos)) {
        echo $var[$i] . "\n";
    }
}
?>