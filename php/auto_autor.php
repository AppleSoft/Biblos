<?php

include "defcon.php";
$busqueda_usuario = strtolower($_GET["q"]);
if (!$busqueda_usuario)
    return;
$desde = count($busqueda_usuario);
$query_autor = "select nombre, apellido1, apellido2 from autor where nombre LIKE '%$busqueda_usuario%' OR apellido1 LIKE '%$busqueda_usuario%' OR apellido2 LIKE '%$busqueda_usuario%'";
$autores = mysql_query($query_autor);
$cuantos = mysql_num_rows($autores);
for ($i = 0; $i < $cuantos; $i++) {
    while ($var = mysql_fetch_row($autores)) {
        echo $var[$i] . " " . $var[$i + 1] . " " . $var[$i + 2] . "\n";
    }
}
?>