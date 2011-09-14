<?php
session_start();
$_SESSION['dni'] = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <title>Hasta la vista, baby</title>
        <style type="text/css">
            body
            {
                background-image: url("../imgs/libroback.jpg");
                background-repeat: no-repeat;
                background-position: center 200px;
            }
        </style>
    </head>
    <body>

        <?php
        echo "<div align=center>";
        echo "<h1>Gracias <b>" . $_SESSION['usuario'] . "</b> por utilizar nuestros servicios</h1>";
        echo "<h3>Logout executado con exito";
        echo "</div>";
        $query = "UPDATE usuario set plantilla_id_plantilla='".$_SESSION['css']."' where dni='".$_SESSION['dni']."'";
        $_SESSION['usuario'] = "";
        $_SESSION['logeado'] = "";
        $_SESSION['dni'] = "";
        $_SESSION['filtracion'] = "";
        $_SESSION['quebuscas'] = "";
        session_destroy();
        header('refresh: 5; url=../index.php');
        ?>

    </body>
</html>
