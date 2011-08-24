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
        <title>Biblos</title>
        <link rel="stylesheet" type="text/css" href="css/consulta.css" />
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
    </head>
    <body>

        <?php
        echo "<h1>Hola '" . $_SESSION['usuario'] . "', bienvenido a la biblioteca</h1>";

        echo "|-<a href='libroG.php'>Agregar un libro a la biblioteca</a>-||-";
        echo "<a href='consulta_general.php'>Consulta la biblioteca</a>-||-";
        echo "<a href='editorialG.php'>Agregar una editorial a la biblioteca</a>-|";

        echo "<br><br><a href='salida.php'>Logout</a>";

        $_SESSION['logeado'] = true;
        ?>

    </body>