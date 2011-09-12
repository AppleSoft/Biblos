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

        <FORM ACTION="autorP.php" METHOD="post" onSubmit="return validacampo(this);">
            Nombre: <INPUT TYPE="text" NAME="nombre" SIZE=30 MAXLENGTH=30 class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/>*
            <BR>
            Primer apellido: <INPUT TYPE="text" NAME="apellido1" SIZE=35 MAXLENGTH=35 class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/>*
            <BR>
            Segundo apellido(s): <INPUT TYPE="text" NAME="apellido2" SIZE=35 MAXLENGTH=35 autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/>
            <BR>
            Nacionalidad: <INPUT TYPE="text" NAME="nacionalidad" SIZE=30 MAXLENGTH=30 autocomplete="off" onKeyPress="return no_caracter_esp(this,event);" />
            <BR>
            <INPUT TYPE="submit" CLASS="boton" VALUE="Registrar">
        </FORM>

        <h1>Insertar autor en el catalogo</h1>

        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
        <?php echo "<a href='salida.php' id='logout'>Logout</a>\n"; ?>
    </body>
</html>
