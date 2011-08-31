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
 <title>Biblos - Insertar nueva editorial</title>
        <link rel='shortcut icon' type='image/x-icon' href='imgs/favicon.ico'  />
        <?php eligeplantilla($_SESSION['plantilla']); ?>
        <script src='../js/funciones.js' type='text/javascript'></script>
    </head>
    <body>
<div id="menu">
        <?php
        if ($tipousuario == 1) {
            echo "<a href='libroG.php'>Agregar un libro a la biblioteca</a> ||\n";
            echo "<a href='modificaLibroG.php'>Modificar un libro</a> ||\n";
            echo "<a href='autorG.php'>Agregar autor a la biblioteca</a> ||\n";
            echo "<a href='modificaAutorG.php'>Modificar autor</a> ||\n";
            echo "<a href='editorialG.php' id='selecionado'>Agregar una editorial a la biblioteca</a> ||\n";
            echo "<a href='modificaEditorialG.php'>Modificar editorial</a> ||\n";
        }
        echo "<a href='consulta_general.php'>Consulta la biblioteca</a> ||\n";
        ?>
        <a href="javascript:;" onClick="window.open('plantilla.php','CSS','width=180, height=150, location=0, status=0, resizable=0, scrollbars=0')">Elige plantilla CSS</a>
        <?php
        echo " || <a href='salida.php'>Logout</a>\n";
        ?>
        </div>       
        <FORM ACTION="editorialP.php" METHOD="post" onSubmit="return validacampo(this);">
            Editorial : <INPUT TYPE="text" NAME="nombre_editorial" SIZE=45 MAXLENGTH=45 class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/>*
           <br/>
            <input type="submit" value="Entrar" />
            <input type="reset" value="Borrar" />
        </form>
            </body>
</html>