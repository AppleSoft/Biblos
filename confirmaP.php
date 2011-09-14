<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenid@ a Biblos</title>
    </head>
    <body>
        <?php
        include "php/funciones.php";
        conexion();

        $email=trim($_POST['email']);
        $codigo=trim($_POST['codigo']);
        
        $existe_alta_pendiente = extraeCampo2("email", "alta_pendiente", "email", $email, 'codigo', $codigo);
        $pwd=extraeCampo2("password", "alta_pendiente", "email", $email, 'codigo', $codigo);
        $usuario=extraeCampo2("nombre_usuario", "alta_pendiente", "email", $email, 'codigo', $codigo);
        
        
        echo "usr:$usuario, pwd:$pwd, email:$existe_alta_pendiente";
        if (!$existe_alta_pendiente) 
            echo header("location: confirmaG.php?error=E-mail/codigo no correcto");
        else {
        $query ="INSERT INTO usuario 
            (dni, clave, nombre_usuario, apellido1_usuario, apellido2_usuario, email, telefono, direccion, plantilla_id_plantilla, tipo_usuario_id_tipo_usuario)
        VALUES
            ('001', '$pwd', '$usuario', 'abc1', '', '$existe_alta_pendiente', '', '', '2', '1')";
        controlQuery($query, 'Tu cuenta se ha activado!', mysql_error(), 5, 'index.php', 'confirmaG.php');
        }
        
        ?>
    </body>
</html>