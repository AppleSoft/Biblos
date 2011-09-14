<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos - <?php echo $_SESSION['usuario']; ?></title>
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
    </body>
</html>