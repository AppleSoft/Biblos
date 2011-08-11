<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" media="screen" type="text/css" href="css/style.css" />        
        <title></title>
    </head>
    <body>
        <?php
            include "funciones.php"
        ?>
        <FORM ACTION="libroP.php" METHOD="post">
            Titulo: 
            <INPUT TYPE="text" NAME="titulo" SIZE=28 MAXLENGTH=255>

            <BR>
            Autor: 
            <?php
            rellenarCampos("autor", "apellido1");
            ?>
            <br>
            Categoria: 
            <?php
            rellenarCampos("categoria", "nombre_categoria");
            ?>
            <br>
            Idioma:
            <?php
            rellenarCampos("idiomas_639_1", "idioma");
            ?>
            <br>
            ISBN: 
            <INPUT TYPE="text" NAME="isbn" SIZE=11 MAXLENGTH=11>
            <br>
            Fecha de publicaci&oacute;n [aaaa/mm/dd]: 
            <INPUT TYPE="text" NAME="fecha_publicacion" SIZE=10 MAXLENGTH=10>
            <br>
            Fecha de adquisici&oacute;n [aaaa/mm/dd]: 
            <INPUT TYPE="text" NAME="fecha_adquisicion" SIZE=10 MAXLENGTH=10>
            <br>
            Numero de p&aacute;ginas: 
            <INPUT TYPE="text" NAME="num_paginas" SIZE=5 MAXLENGTH=5>
            <br>
            Sinopsis:<br>
            <TEXTAREA NAME="sinopsis" COLS=40 ROWS=6></textarea>
            <br>
            Edici&oacute;n: 
            <INPUT TYPE="text" NAME="edicion" SIZE=3 MAXLENGTH=3>
            <br>
            Editorial:
            <?php
            rellenarCampos("editorial", "nombre_editorial");
            ?>
            <br>
            <p><INPUT TYPE="submit" CLASS="boton" VALUE="Registrar">
                <input type="reset" value="Limpiar" /></p>
        </FORM>
    </body>
</html>
