<?php

session_start();

if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {

    header('Location: loginG.php'); //Redirige al inicio de sesion en caso de que no tengas hecho el login

    exit;
}

echo "<h1>Hola '" . $_SESSION['usuario'] . "', bienvenido a la biblioteca</h1>";

echo "<a href='libroG.php'>Agregar un libro a la biblioteca</a>";
echo "<a href='autorG.php'>Agregar un autor a la biblioteca</a>";
echo "<a href='editorialG.php'>Agregar una editorial a la biblioteca</a>";

$_SESSION['logeado'] = true;
?>
