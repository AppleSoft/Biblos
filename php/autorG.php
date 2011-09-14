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
    <body oncontextmenu="return false;">

        <div id="menu">
            <?php include "menucss.php"; ?>
        </div> 

        <div id="formulario_libro">
            <FORM ACTION="autorP.php" METHOD="post" onSubmit="return validacampo(this);">
                <table>
                    <tr><td>Nombre *:</td><td><INPUT TYPE="text" NAME="nombre" class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/></td></tr>
                    <tr><td>Primer apellido *:</td><td><INPUT TYPE="text" NAME="apellido1" class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/></td></tr>
                    <tr><td>Segundo apellido(s):</td><td><INPUT TYPE="text" NAME="apellido2" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/></td></tr>
                    <tr><td>Nacionalidad:</td><td><INPUT TYPE="text" NAME="nacionalidad" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);" /></td></tr>
                    <tr><td colspan="2"><INPUT TYPE="submit" CLASS="boton" VALUE="Registrar" /></td></tr>
                </table>
            </FORM>

        </div>

        <h1>Insertar autor en el catalogo</h1>

        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
    </body>
</html>
