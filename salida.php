<?php 
session_start();

$_SESSION['dni']="";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <title></title>
    </head>
    <body>
        <?php
        echo "<h1>Gracias <b>".$_SESSION['usuario']."</b> por utilizar nuestros servicios</h1>";
        echo "<h3>Logout executado con exito";
        $_SESSION['usuario']="";
        $_SESSION['logeado']="";
        $_SESSION['dni']="";
        $_SESSION['filtracion'] = "";
        $_SESSION['quebuscas'] = "";
        session_destroy();
        header( 'refresh: 5; url=loginG.php' );
        ?>
    </body>
</html>
