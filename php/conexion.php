<?php

$i = 0;
$fichero = fopen("files/config.aps", "r");        //abre el fichero para poder cargar los datos
while ($text[$i] = fgets($fichero, 1024)) { //pon cada linea del fichero en una variable text[i]
    $i++;                                   //siguiente linea del fichero
}

fclose($fichero);

$server = trim($text[0]);
$usr = trim($text[1]);
$pwd = trim($text[2]);
$db = trim($text[3]);
$tabla = trim($text[4]);

$conecta = mysql_connect($server, $usr, $pwd);
if (!$conecta)
    echo "Error conectando a la base de datos.";

$datos = mysql_select_db($db, $conecta);
if (!$datos)
    echo "Error seleccionando la base de datos.";
?>