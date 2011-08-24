<?php
$server = "localhost";
<<<<<<< HEAD
$usr = "root";
$pwd = "";
=======
$usr = "phpusr";
$pwd = "phppwd";
>>>>>>> 6bae361ecf74a116dffd1a538338d379e0a1051b
$db = "biblos_g2";
$conecta = mysql_connect($server, $usr, $pwd);
if (!$conecta)
    echo "Error conectando a la base de datos.";
$datos = mysql_select_db($db, $conecta);
if (!$datos)
    echo "Error seleccionando la base de datos.";
?>