<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <?php eligeplantilla(); ?>

    </head>
    <body>
        <div id="menu">
            <?php include "menucss.php" ?>
        </div>        
        <h1>Alta usuario en Biblos</h1>
        <?php
        echo "<div id='formulario_libro'>";
        echo "<form action='usuarioP.php' method='post' name='datos_usuario'>";
        echo "<table>";
        echo "<tr><td>DNI:</td><td><input type='text' name='dni'></td></tr>\n";
        echo "<tr><td>Clave:</td><td><input type='password' name='clave'></td></tr>\n";
        echo "<tr><td>Nombre usuario:</td><td> <input type='text' name='nombre_usuario'></td></tr>\n";
        echo "<tr><td>Apellido 1:</td><td> <input type='text' name='apellido1'></td></tr>\n";
        echo "<tr><td>Apellido 2:</td><td> <input type='text' name='apellido2'></td></tr>\n";
        echo "<tr><td>E-Mail:</td><td> <input type='text' name='email'></td></tr>\n";
        echo "<tr><td>Telefono:</td><td> <input type='text' name='telefono'></td></tr>\n";
        echo "<tr><td>Direccion:</td><td> <input type='text' name='direccion'></td></tr>\n";
        echo "<tr><td>Plantilla:</td><td> <input type='textarea' name='css'></td></tr>\n";
        echo "<tr><td>Tipo usuario:</td><td> <input type='text' name='tipo_usuario'></td></tr>\n";
        echo "<tr><td colspan='2'><input type='submit' value='Confirma'></td></tr>\n";
        echo "</table>";
        echo "</form>";
        ?>
        
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
    </body>
</html>