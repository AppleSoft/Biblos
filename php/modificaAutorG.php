<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();
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
        <?php
        $mipagina = $_SERVER['PHP_SELF'];
        $usuario = $_SESSION['usuario'];
        $dni = $_SESSION['dni'];

        if (isset($_GET['pagina']))
            $pagina = $_GET['pagina'];

        if (!isset($pagina)) {
            $pagina = "1";
        }

        $sql = "SELECT * FROM autor ORDER BY apellido1";
        $query = mysql_query($sql);
        $total_resultados = mysql_num_rows($query);
        $limite = "1";
        $total_libros = ceil($total_resultados / $limite);
        $offset = ($pagina - 1) * $limite;

        $query = "SELECT * FROM autor ORDER BY apellido1 LIMIT $offset, $limite";
        $result = mysql_query($query);

        echo "<div id='formulario_libro'>";
        echo "<form action='modificaAutorP.php' method='post' name='datos_autor'>";
        echo "<table>";
        while ($row = mysql_fetch_array($result)) {
            echo "<input type='hidden' name='id_autor' value='$row[0]'><br>\n";
            echo "<tr><td>Nombre:</td><td><input type='text' name='nombre' value='$row[1]'></td></tr>";
            echo "<tr><td>Apellido 1:</td><td><input type='text' name='apellido1' value='$row[2]'></td></tr>\n";
            echo "<tr><td>Apellido 2:</td><td><input type='text' name='apellido2' value='$row[3]'></td></tr>\n";
            echo "<tr><td>Nacionalidad:</td><td><input type='text' name='nacionalidad' value='$row[4]'></td></tr>\n";
        }

        echo "<tr><td colspan='2'>Hay $total_libros autores en el catalogo</td></tr>";
        echo "<tr><td colspan='2'>";
        if ($pagina != 1) {
            echo "<a href=$mipagina?pagina=1><< Primera</a>&nbsp;&nbsp;&nbsp;";
            $ant_pagina = $pagina - 1;
            echo "&nbsp;<a href=$mipagina?pagina=$ant_pagina><<</a>&nbsp;";
        }
        if ($pagina == $total_libros) {
            $to = $total_libros;
        } elseif ($pagina == $total_libros - 1) {
            $to = $pagina + 1;
        } elseif ($pagina == $total_libros - 2) {
            $to = $pagina + 2;
        } else {
            $to = $pagina + 3;
        }
        if ($pagina == 1 || $pagina == 2 || $pagina == 3) {
            $from = 1;
        } else {
            $from = $pagina - 3;
        }

        for ($i = $from; $i <= $to; $i++) {
            if ($i == $total_resultados)
                $to = $total_resultados;
            if ($i != $pagina) {
                echo "<a href=$mipagina?pagina=$i>$i</a>";
            } else {
                echo "<b>[$i]</b>";
            }
            if ($i != $total_libros)
                echo "&nbsp;";
        }
        if ($pagina != $total_libros) {
            $sig_pagina = $pagina + 1;
            echo "&nbsp;<a href=$mipagina?pagina=$sig_pagina>>></a>&nbsp;";
            echo "&nbsp;&nbsp;&nbsp;<a href=$mipagina?pagina=$total_libros>ultima >></a>";
        }
        echo "</td></tr>\n";
        echo "<tr><td colspan='2'><input type='submit' value='Modifica autor'/></td></tr>\n";
        echo "</table>";
        echo "</form>";
        echo "</div>";

        ?>
        <h1>Modifica autores en catalogo</h1>
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
    </body>
</html>