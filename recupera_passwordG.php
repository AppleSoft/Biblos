<?php
include "php/funciones.php";
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos - Home</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" /> 
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body>

        <h1>Introduzca la direccion de correo que utilizo al registrarse</h1>
        <form name="form" method="post" action="recupera_passwordP.php">
            <input name="email_to" type="text" id="mail_to" size="25">
            <input type="submit" name="Submit" value="Submit">
        </form>

    </body>
</html>