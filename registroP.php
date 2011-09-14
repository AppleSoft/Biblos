<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenid@ a Biblos</title>
    </head>
    <body>
        <?php
        include "php/funciones.php";
        include "js/swift_required.php";
        conexion();

        $usuario = trim($_POST['nombre_usuario']);
        $pwd = trim($_POST['password']);
        $pwd2=trim($_POST['password2']);
        $email=trim($_POST['email']);
        $codigo=GeneRandom();
        
        $existe_usr = extraeCampo2("nombre_usuario", "usuario", "dni", $usuario, 'clave', $pwd);

        //if (!strcmp($pwd, $pwd2))
        //        echo header("location: registroG.php?error=Las contraseñas no coinciden");
        
        if ($existe_usr) 
            echo header("location: registroG.php?error=Nombre usuario ya en uso, elige otro");
       
        $query_alta="INSERT INTO alta_pendiente
            (nombre_usuario, password, email, codigo)
            VALUES
            ('$usuario','$pwd','$email','$codigo')";
        $queryadd=  mysql_query($query_alta);
                
        controlQuery($queryadd, 'Proceso de alta terminado con exito, sigue el link enviado a tu correo por activar tu cuenta', 'Error en el proceso de alta, vuelve a intentarlo', 5, 'confirmaG.php','registroG.php');
        
        confirmaCorreo($email, $codigo);
        
        ?>
    </body>
</html>

