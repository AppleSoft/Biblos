<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos - <?php echo $_SESSION['usuario']; ?></title>
        <?php eligeplantilla(); ?>
    </head>
    <body>
        <div id="menu">
            <?php include "menucss.php"; ?>
        </div>  

        <h1>Elimina usuarios registrados en Biblos</h1>

        <?php
        $mipagina = $_SERVER['PHP_SELF'];
        $usuario = $_SESSION['usuario'];
        $dni = $_SESSION['dni'];

        if (isset($_GET['pagina']))
            $pagina = $_GET['pagina'];

        if (!isset($pagina)) {
            $pagina = "1";
        }

        $sql = "SELECT * FROM usuario ORDER BY apellido1_usuario";
        $query = mysql_query($sql);
        $total_usuarios = mysql_num_rows($query);
        $limite = "1";
        $total_paginas = ceil($total_usuarios / $limite);
        $offset = ($pagina - 1) * $limite;

        $query = "SELECT * FROM usuario ORDER BY apellido1_usuario LIMIT $offset, $limite";
        $result = mysql_query($query);

        echo "<div id='formulario_usuarios'>\n";
        layoutFormUsuario('borraUsuarioP.php', 'POST', 'Confirma', $result, $total_usuarios, $pagina, $total_paginas);
        echo "</div>\n";
        ?>

        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>

    </body>
</html>
