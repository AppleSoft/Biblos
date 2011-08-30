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
    <body>
        <FORM ACTION="registrarautor.php" METHOD="post">
            Nombre: <INPUT TYPE="text" NAME="nombre" SIZE=30 MAXLENGTH=30>
            <BR>
            Primer apellido: <INPUT TYPE="text" NAME="apellido1" SIZE=35 MAXLENGTH=35>
            <BR>
            Segundo apellido(s): <INPUT TYPE="text" NAME="apellido2" SIZE=35 MAXLENGTH=35>
            <BR>
            Nacionalidad: <INPUT TYPE="text" NAME="nacionalidad" SIZE=30 MAXLENGTH=30>
            <BR>
            <INPUT TYPE="submit" CLASS="boton" VALUE="Registrar">
        </FORM>
    </body>
</html>
    </body>
</html>
