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
        $tipousuario= extraeCampo2("tipos_usuario_id_tipo_usuario", "usuario", "dni", $usuario, 'clave', $pwd);
        $plantilla_usuario=extraeCampo2("plantilla_id_plantilla", "usuario", "dni", $usuario, 'clave', $pwd);
        if (!$existe_usr) {
            echo header("location: loginG.php?error=Usuario y/o clave erronea");
        } else {
            $_SESSION['logeado'] = TRUE;
            $_SESSION['usuario'] =$existe_usr;
            $_SESSION['dni']=$dni;
            $_SESSION['tipousuario']=$tipousuario;
            $_SESSION['plantilla']=$plantilla_usuario;
            echo header("location: menuG.php");
        }
        ?>
    </body>
</html>