<?php 
session_start();

if (!isset($_SESSION['logeado'])
    || $_SESSION['logeado'] != true) {

    header('Location: loginG.php'); //Redirige al inicio de sesion en caso de que no tengas hecho el login

    exit;

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      	<link rel="stylesheet" type="text/css" href="css/screen.css">    
        <title></title>
    </head>
    <body>
        <?php
            include "funciones.php";
            include "defcon.php";
        ?>
        <FORM ACTION="libroP.php" METHOD="post">
            <fieldset class="login">
            <legend>Datos nuevo libro</legend>
            Titulo:<br> 
            <INPUT TYPE="text" NAME="titulo" id="titulo">

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
            <INPUT TYPE="text" NAME="isbn">
            <br>
            Fecha de publicaci&oacute;n [aaaa/mm/dd]: <br>
            <INPUT TYPE="text" NAME="fecha_publicacion">
            <br>
            Fecha de adquisici&oacute;n [aaaa/mm/dd]: <br>
            <INPUT TYPE="text" NAME="fecha_adquisicion">
            <br>
            Numero de p&aacute;ginas: <br>
            <INPUT TYPE="text" NAME="num_paginas">
            <br>
            Sinopsis:<br>
            <TEXTAREA NAME="sinopsis" COLS=40 ROWS=6></textarea>
            <br>
            Edici&oacute;n: <br>
            <INPUT TYPE="text" NAME="edicion">
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
