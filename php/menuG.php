<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <?php eligeplantilla($_SESSION['plantilla']); ?>
    </head>
    <body>
        <div id="menu">
            <?php dibujaMenu(); ?>
            <a href="javascript:;" onClick="window.open('plantilla.php','CSS','width=180, height=150, location=0, status=0, resizable=0, scrollbars=0')">Elige plantilla CSS</a>
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