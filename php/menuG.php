<?php
session_start();
if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: loginG.php'); //Redirige al inicio de sesion en caso de que no tengas hecho el login
    exit;
}
else {
    $usuario = $_SESSION['usuario'];
    $tipousuario = $_SESSION['tipousuario'];
    $usrdni=$_SESSION['dni'];
}
?>
<!DOCTYPE html>
<html>
    <?php
    include "funciones.php";
    include "defcon.php";
    eligeplantilla($_SESSION['plantilla']);
    ?>
    <body>
        <div id="menu">
        <?php
        echo "<h1>Hola '" . $_SESSION['usuario'] . "', eres tipo $tipousuario bienvenido a la biblioteca</h1>";
        if ($tipousuario == 1) {
            echo "<a href='libroG.php'>Agregar un libro a la biblioteca</a>||";
            echo "<a href='modificaLibroG.php'>Modificar un libro</a>||";
            echo "<a href='autorG.php'>Agregar autor a la biblioteca</a>||";
            echo "<a href='modificaAutorG.php'>Modificar autor</a>||";
            echo "<a href='editorialG.php'>Agregar una editorial a la biblioteca</a>||";
            echo "<a href='modificaEditorialG.php'>Modificar editorial</a>||";
        }
        echo "<a href='consulta_general.php'>Consulta la biblioteca</a>||";
        ?>
        <a href="javascript:;" onClick="window.open('plantilla.php','CSS','width=180, height=150, location=0, status=0, resizable=0, scrollbars=0')">Elige plantilla CSS</a>
        <?php
        echo "||<a href='salida.php'>Logout</a>";
        ?>
        </div>
    </body>
</html>