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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <FORM ACTION="editorialP.php" METHOD="post">
            Editorial : <INPUT TYPE="text" NAME="nombre_editorial" SIZE=45 MAXLENGTH=45>
            <input type="submit" value="Entrar" />
            <input type="reset" value="Borrar" />
        </form>
            </body>
</html>