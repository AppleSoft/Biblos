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
    <body oncontextmenu="return false;">
        <div id="menu">
            <?php dibujaMenu(); ?>
        </div>   
        <FORM ACTION="libroP.php" METHOD="post" onSubmit="return validacampo(this);">
            <fieldset class="login">
                <legend>Datos nuevo libro</legend>
                Titulo:<br/>
                <INPUT TYPE=text NAME=titulo class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/>*
                <BR>
                Autor:<br>
                <?php
                rellenarCampos("autor", "apellido1");
                ?>
                <br>
                Categoria:<br> 
                <?php
                rellenarCampos("categoria", "nombre_categoria");
                ?>
                <br>
                Idioma:<br>
                <?php
                rellenarCampos("idiomas_639_1", "idioma");
                ?>
                <br>
                ISBN:<br>
                <INPUT TYPE="text" NAME="isbn" autocomplete="off" onKeyPress="return solonumero(this,event);"/>
                <br>
                Fecha de publicaci&oacute;n [aaaa/mm/dd]: <br>
                <INPUT TYPE="text" NAME="fecha_publicacion" autocomplete="off" onKeyPress="return solonumero(this,event);"/>
                <br>
                Fecha de adquisici&oacute;n [aaaa/mm/dd]: <br>
                <INPUT TYPE="text" NAME="fecha_adquisicion" autocomplete="off" onKeyPress="return solonumero(this,event);"/>
                <br>
                Numero de p&aacute;ginas: <br>
                <INPUT TYPE="text" NAME="num_paginas" autocomplete="off" onKeyPress="return solonumero(this,event);"/>
                <br>
                Sinopsis:<br>
                <TEXTAREA NAME="sinopsis" COLS=40 ROWS=6 autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"></textarea>
            <br>
            Edici&oacute;n: <br>
            <INPUT TYPE="text" NAME="edicion" autocomplete="off" onKeyPress="return solonumero(this,event)"/>
            <br>
            Editorial:<br>
                <?php
                rellenarCampos("editorial", "nombre_editorial");
                ?>
            <br><br>
</fieldset>
            <input type="submit" value="Guardar libro" />
                <input type="reset" value="Limpiar campos" />
        </FORM>
        
        <h1>Insertar libro en el catalogo</h1>
        
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
        <?php echo "<a href='salida.php' id='logout'>Logout</a>\n"; ?>
    </body>
</html>
