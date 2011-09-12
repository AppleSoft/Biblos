<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <?php eligeplantilla(); ?>
        <script src='../js/jquery.autocomplete.js' type='text/javascript'></script>
        
    </head>
    <body>
        <div id="menu">
            <?php include "menucss.php" ?>
        </div>        
        <h1>Usuarios registrados en Biblos</h1>
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
        echo "<form action='#' method='post' name='datos_usuario'>\n";

        while ($row = mysql_fetch_array($result)) {
            echo "DNI:<input type='text' name='dni' value='$row[0]'><br>\n";
            echo "Clave:<input type='password' name='clave' value='$row[1]'><br>\n";
            echo "Nombre usuario: <input readonly='on' type='text' name='id_categoria' value='$row[2]'><br>\n";
            echo "Apellido 1: <input type='text' name='id_idioma_639_1' value='$row[3]'><br>\n";
            echo "Apellido 2: <input type='text' name='isbn' value='$row[4]'><br>\n";
            echo "E-Mail: <input type='text' name='fecha_publicacion' value='$row[5]'><br>\n";
            echo "Telefono: <input type='text' name='fecha_adquisicion' value='$row[6]'><br>\n";
            echo "Direccion: <input type='text' name='num_paginas' value='$row[7]'><br>\n";
            echo "Plantilla: <input type='textarea' name='sinopsis' value='$row[8]'><br>\n";
            echo "Tipo usuario: <input type='text' name='edicion' value='" . buscarCampo('tipo_usuario', 'tipos_usuario', 'id_tipo_usuario', $row[9]) . "'><br>\n";
        }

        echo "<br>Hay $total_usuarios usuarios en la base de datos<br>\n";
        if ($pagina != 1) {
            echo "<br><a href=$mipagina?pagina=1><< Primera</a>&nbsp;&nbsp;&nbsp;";
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
        echo "</form>\n";
        echo "</div>\n";
        ?>

        <div id="busca_usr">
            <input type="text" name="usr_busqueda" value="Introduce usuario" id="usr_busqueda" onfocus="if(this.value=='Introduce usuario') value='';" onblur="cambiaInput(this.value);"  />
        </div>
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
        <?php echo "<a href='salida.php' id='logout'>Logout</a>\n"; ?>
        
        <script type="text/javascript">
            function buscaStringaUsuario(stringa) {
                if( !!stringa.extra ) var sValue = stringa.extra[0];
                else var sValue = stringa.seleccionaResultadoUsuario;
            }
            function seleccionaResultadoUsuario(stringa) {
                buscaStringaUsuario (stringa);
            }
            
            function lookupAjax(){
                var oSuggest = $("#usr_busqueda")[0].autocompleter;
                oSuggest.buscaStringaUsuario();
                return false;
            }
            $("#usr_busqueda").autocomplete(
            "auto_usr.php",
            {
                delay:10,
                minChars:1,
                matchSubset:1,
                matchContains:1,
                cacheLength:10,
                onItemSelect:seleccionaResultadoUsuario,
                onbuscaStringa:buscaStringaUsuario,
                autoFill:true
            }
        );
        </script>
    </body>
</html>
