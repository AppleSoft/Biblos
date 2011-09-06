<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CSS</title>
       
    </head>
    <body>
        <form action="plantillaP.php" method="POST">
            <br />
            <div style="display: block;color: #B8860B;background-color: #000;width: 150px;"><input type="radio" name="opciones" value="1" />CSS 1</div>
            <br />
            <div style="display:block;color:#00bfff;background-color: #ffdead;width: 150px;"><input type="radio" name="opciones" value="2" />CSS 2</div>
            <br />
            <input type="submit" value="Guardar" />
        </form>
    </body>
</html>
