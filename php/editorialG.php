<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos  - <?php echo $_SESSION['usuario']; ?></title>
        <?php eligeplantilla(); ?>
    </head>
    <body>
        <div id="menu">
            <?php include "menucss.php"; ?>
        </div>       
        <FORM ACTION="editorialP.php" METHOD="post" onSubmit="return validacampo(this);">
            Editorial : <INPUT TYPE="text" NAME="nombre_editorial" SIZE=45 MAXLENGTH=45 class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/>*
           <br/>
            <input type="submit" value="Alta editorial" />
        </form>
           <h1>Insertar editorial en catalogo</h1>
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
    </body>
</html>