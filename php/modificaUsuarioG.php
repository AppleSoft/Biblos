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
        <title>Biblos</title>
        <?php eligeplantilla(); ?>
        
    </head>
    <body>
        <div id="menu">
            <?php include "menucss.php" ?>
        </div>        
        <h1>Modifica usuarios registrados en Biblos</h1>
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

        echo "<div id='formulario_libro'>\n";
        echo "<form action='modificaUsuarioP.php' method='post' name='datos_usuario'>\n";
        echo "<table>";
        while ($row = mysql_fetch_array($result)) {
            echo "<tr><td>DNI:</td><td><input type='text' name='dni' value='$row[0]'></td></tr>\n";
            echo "<tr><td>Clave:</td><td><input type='password' name='clave' value='$row[1]'></td></tr>\n";
            echo "<tr><td>Nombre usuario:</td><td><input type='text' name='nombre_usuario' value='$row[2]'></td></tr>\n";
            echo "<tr><td>Apellido 1:</td><td><input type='text' name='apellido1_usuario' value='$row[3]'></td></tr>\n";
            echo "<tr><td>Apellido 2:</td><td><input type='text' name='apellido2_usuario' value='$row[4]'></td></tr>\n";
            echo "<tr><td>E-Mail:</td><td><input type='text' name='email' value='$row[5]'></td></tr>\n";
            echo "<tr><td>Telefono:</td><td><input type='text' name='telefono' value='$row[6]'></td></tr>\n";
            echo "<tr><td>Direccion:</td><td><input type='text' name='Direccion' value='$row[7]'></td></tr>\n";
            echo "<tr><td>Plantilla:</td><td><input type='textarea' name='plantilla' value='$row[8]'></td></tr>\n";
            echo "<tr><td>Tipo usuario:</td><td><input type='text' name='tipo_usuario' value='" . buscarCampo('tipo_usuario', 'tipos_usuario', 'id_tipo_usuario', $row[9]) . "'></td></tr>\n";
        }

        echo "<tr><td colspan='2'>Hay $total_usuarios usuarios en la base de datos</td></tr>\n";
        echo "<tr><td colspan='2'>";
        if ($pagina != 1) {
            echo "<a href=$mipagina?pagina=1><< Primera</a>&nbsp;&nbsp;&nbsp;";
            $ant_pagina = $pagina - 1;
            echo "&nbsp;<a href=$mipagina?pagina=$ant_pagina><<</a>&nbsp;";
        }
        if ($pagina == $total_paginas) {
            $to = $total_paginas;
        } elseif ($pagina == $total_paginas - 1) {
            $to = $pagina + 1;
        } elseif ($pagina == $total_paginas - 2) {
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
            if ($i == $total_paginas)
                $to = $total_paginas;
            if ($i != $pagina) {
                echo "<a href=$mipagina?pagina=$i>$i</a>";
            } else {
                echo "<b>[$i]</b>";
            }
            if ($i != $total_paginas)
                echo "&nbsp;";
        }
        if ($pagina != $total_paginas) {
            $sig_pagina = $pagina + 1;
            echo "&nbsp;<a href=$mipagina?pagina=$sig_pagina>>></a>&nbsp;";
            echo "&nbsp;&nbsp;&nbsp;<a href=$mipagina?pagina=$total_paginas>ultima >></a>";
        }
        echo "</td></tr>";
        echo "<tr><td colspan='2'><input type='submit' value='Modifica' /></td></tr>";
        echo "</table>";
        echo "</form>\n";
        echo "</div>\n";
        ?>
        
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
        
    </body>
</html>
