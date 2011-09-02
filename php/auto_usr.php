<?php
include "funciones.php";
conexion();

$usr_busqueda = strtolower($_GET["q"]);
if (!$usr_busqueda)
    return;
$query_titulo = "select nombre_usuario,apellido1_usuario,apellido2_usuario from usuario where nombre_usuario LIKE '%$usr_busqueda%' OR apellido1_usuario LIKE '%$usr_busqueda%' OR apellido2_usuario LIKE '%$usr_busqueda%'";
$usuarios = mysql_query($query_titulo);
$cuantos = mysql_num_rows($usuarios);
for ($i = 0; $i < $cuantos; $i++) {
    while ($var = mysql_fetch_row($usuarios)) {
        echo $var[$i]." ".$var[$i+1]." ".$var[$i+2]."\n";
    }
}
?>