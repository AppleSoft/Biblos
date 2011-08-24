<?php
session_start();

if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: loginG.php'); //Redirige al inicio de sesion en caso de que no tengas hecho el login
    exit;
} else {
    $usuario = $_SESSION['usuario'];
    $tipousuario = $_SESSION['tipousuario'];
    $usuario_dni = $_SESSION['dni'];
}

if ($tipousuario != 1 || $tipousuario != 2) {
    echo "<script type='text/javascript'>
        window.alert('ahi listillo! tienes que ser administrador para poder modificar!')
        </script>";
    header("Refresh: 2; URL=consulta_general.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
        include "funciones.php";
        include "defcon.php";


        $titulo = $_POST['titulo'];
        $id_autor = $_POST['id_autor'];
        $id_categoria = $_POST['categoria'];
        $idioma_639_1 = $_POST['idiomas_639_1'];
        $id_editorial = $_POST['id_editorial'];
        $isbn = $_POST['isbn'];
        $fecha_publicacion = $_POST['fecha_publicacion'];
        $fecha_adquisicion = $_POST['fecha_adquisicion'];
        $num_paginas = $_POST['num_paginas'];
        $sinopsis = $_POST['sinopsis'];
        $edicion = $_POST['edicion'];
        $q1 = "SELECT apellido1 FROM autor where id_autor=$id_autor";
        $rt1 = mysql_query($q1);
        $r1 = mysql_fetch_row($rt1);
        $rf1 = $r1[0];
        $rf1 = substr($rf1, 0, 3);
        $rf2 = substr($titulo, 0, 3);
        $dewey = calcularDewey($id_categoria, $id_autor, $titulo);


        $actualiza = "
        UPDATE libro SET 
            'isbn'=" . $isbn . " 
            'titulo'=" . $titulo . "
            'fecha_publicacion'=" . $fecha_publicacion . "
            'fecha_adquisicion'=" . $fecha_adquisicion . "
            'num_paginas'=" . $num_paginas . "
            'sinopsis'=" . $num_paginas . "
            'edicion'=" . $edicion . "
            'autor_id_autor'=" . $id_autor . "
            'editorial_id_editorial'=" . $id_editorial . "
            'idiomas_639_1_id_idioma_639_1'=" . $idioma_639_1 . "
        WHERE categoria_id_categoria='" . $_SESSION['cat'] . "' AND cod_apellido='" . $_SESSION['cod'] . "' AND cod_titulo='" . $_SESSION['ape'] . "'";

        mysql_query($actualiza) or die(mysql_error());

        echo "<script type='text/javascript'>
        window.alert('Has modificado " . $_POST['titulo'] . " de " . $r1[0] . ".')
        </script>";
        header("Refresh: 3; URL=consulta_general.php");
        ?>
    </body>
</html>
