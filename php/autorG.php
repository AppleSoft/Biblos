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
        <title>Biblos - Insertar nuevo autor</title>
        <link rel='shortcut icon' type='image/x-icon' href='../imgs/favicon.ico'  />
        <?php eligeplantilla($_SESSION['plantilla']); ?>
        <script src='../js/funciones.js' type='text/javascript'></script>
    </head>
    <body oncontextmenu="return false;">
    <div id="menu">
        <?php
        if ($tipousuario == 1) {
            echo "<a href='libroG.php'>Agregar un libro a la biblioteca</a> ||\n";
            echo "<a href='modificaLibroG.php'>Modificar un libro</a> ||\n";
            echo "<a href='autorG.php' id='selecionado'>Agregar autor a la biblioteca</a> ||\n";
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
    </body>
</html>
    </body>
</html>
