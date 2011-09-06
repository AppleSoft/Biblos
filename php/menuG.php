<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos - Home</title>
        <?php eligeplantilla(); ?>
    </head>
    <body>
        <div id="menu">
            <?php include "menucss.php"; ?>
        </div>

        <h1>Bienvenid@ a Biblos, tu biblioteca digital</h1>

        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
        <div>
            <?php echo "<a href='salida.php' id='logout'>Logout</a>\n"; ?>
        </div>
    </body>
</html>