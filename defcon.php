<?php
$server = "localhost";
$usr = "root";
$pwd = "";
$db = "biblos_g2";
$conecta = mysql_connect($server, $usr, $pwd);
if (!$conecta)
    echo "Error conectando a la base de datos.";
$datos = mysql_select_db($db, $conecta);
if (!$datos)
    echo "Error seleccionando la base de datos.";
?>