<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <?php eligeplantilla($_SESSION['plantilla']); ?>
        <script type='text/javascript'> 
            window.onload=esconde_div;
        </script>
    </head>
    <body>
        <br />
        <div id="menu_usuarios">
            <a href="#" onclick="window.opener.location.href='consulta_usuarios.php'; window.close();">Consulta usuario</a><br />
            <a href="#" onclick="window.opener.location.href='alta_usuarios.php'; window.close();">Alta usuario</a><br />
            <a href="#" onclick="window.opener.location.href='visualiza_usuarios.php'; window.close();">Modifica usuario</a><br />
            <a href="#" onclick="window.opener.location.href='baja_usuarios.php'; window.close();">Baja usuario</a><br />
        </div>
    </body>
</html>