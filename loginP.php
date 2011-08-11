<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "funciones.php";
        conexion();
        
        $usuario = trim($_POST['nombre_usuario']);
        $pwd = trim($_POST['password']);
        
        $existe_usr=extraeCampo("nombre_usuario","usuario","dni",$usuario);
                
        if (!$existe_usr) {
            echo header("location: loginG.php?error=Usuario y/o clave erronea");
        } 
        else {
            $existe_pwd=extraeCampo("clave","usuario","dni",$usuario);
            if ($pwd == $existe_pwd) {
                echo "eres ".$existe_usr;
                echo "Usuario correcto, seras redirecionado en 5 segundos";
                echo header("refresh:5; url=menuG.php?usuario=$existe_usr");
            } else {
                echo  header("location: loginG.php?error=Usuario y/o clave erronea");
            }
        }
        ?>
    </body>
</html>
