<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "funciones.php";
        include "defcon.php";


        $usuario = trim($_POST['nombre_usuario']);
        $pwd = trim($_POST['password']);

        $existe_usr = extraeCampo2("nombre_usuario", "usuario", "dni", $usuario, 'clave', $pwd);
        $dni= $usuario;
        
        if (!$existe_usr) {
            echo header("location: loginG.php?error=Usuario y/o clave erronea");
        } else {
            $_SESSION['logeado'] = TRUE;
            $_SESSION['usuario'] =$existe_usr;
            $_SESSION['dni']=$dni;
            echo header("location: menuG.php");
        }
        ?>
    </body>
</html>
