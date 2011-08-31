<?php
session_start();
include "funciones.php";
include "defcon.php";
if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: ../index.php');
    exit;
} else {
    $usuario = $_SESSION['usuario'];
    $tipousuario = $_SESSION['tipousuario'];
    $usrdni = $_SESSION['dni'];
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Biblos - Insertar nuevo libro</title>
        <link rel='shortcut icon' type='image/x-icon' href='../imgs/favicon.ico'  />
        <?php eligeplantilla($_SESSION['plantilla']); ?>
        <script src='../js/funciones.js' type='text/javascript'></script>
    </head>
    <body oncontextmenu="return false;">
<div id="menu">
        <?php
        if ($tipousuario == 1) {
            echo "<a href='libroG.php' id='selecionado'>Agregar un libro a la biblioteca</a> ||\n";
            echo "<a href='modificaLibroG.php'>Modificar un libro</a> ||\n";
            echo "<a href='autorG.php'>Agregar autor a la biblioteca</a> ||\n";
            echo "<a href='modificaAutorG.php'>Modificar autor</a> ||\n";
            echo "<a href='editorialG.php'>Agregar una editorial a la biblioteca</a> ||\n";
            echo "<a href='modificaEditorialG.php'>Modificar editorial</a> ||\n";
        }
        echo "<a href='consulta_general.php'>Consulta la biblioteca</a> ||\n";
        ?>
        <a href="javascript:;" onClick="window.open('plantilla.php','CSS','width=180, height=150, location=0, status=0, resizable=0, scrollbars=0')">Elige plantilla CSS</a>
        <?php
        echo " || <a href='salida.php'>Logout</a>\n";
        ?>
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
    </body>
</html>
