<?php
session_start();
 include "funciones.php";
    include "defcon.php";
if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: loginG.php');
    exit;
} else {
    $usuario = $_SESSION['usuario'];
    $tipousuario = $_SESSION['tipousuario'];
    $usrdni = $_SESSION['dni'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <link rel='shortcut icon' type='image/x-icon' href='imgs/favicon.ico'  />
        <?php eligeplantilla($_SESSION['plantilla']); ?>
        <script src='js/funciones.js' type='text/javascript'></script>
        <script type='text/javascript'> 
            window.onload=esconde_div;
        </script>
    </head>
    <body>
        <div id="menu">
        <?php
        if ($tipousuario == 1) {
            echo "<a href='libroG.php'>Agregar un libro a la biblioteca</a> ||\n";
            echo "<a href='modificaLibroG.php'>Modificar un libro</a> ||\n";
            echo "<a href='autorG.php'>Agregar autor a la biblioteca</a> ||\n";
            echo "<a href='modificaAutorG.php'>Modificar autor</a> ||\n";
            echo "<a href='editorialG.php'>Agregar una editorial a la biblioteca</a> ||\n";
            echo "<a href='modificaEditorialG.php'>Modificar editorial</a> ||\n";
        }
        echo "<a href='consulta_general.php'>Consulta la biblioteca</a> ||\n";
        ?>
        <a href="javascript:;" onClick="window.open('plantilla.php','CSS','width=180, height=150, location=0, status=0, resizable=0, scrollbars=0')">Elige plantilla CSS</a>
        <?php
        echo " || <a href='salida.php'>Logout</a>\n";
        ?>
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

        $sql = "SELECT * FROM libro ORDER BY titulo";
        $query = mysql_query($sql);
        $total_resultados = mysql_num_rows($query);
        $limite = "1";
        $total_libros = ceil($total_resultados / $limite);
        $offset = ($pagina - 1) * $limite;

        $query = "SELECT * FROM libro ORDER BY cod_titulo LIMIT $offset, $limite";
        $result = mysql_query($query);

        echo "<div id='formulario_libro'>\n";
        if ($tipousuario == 1)
            echo "<form action='modifica.php' method='post' name='datos_libro'>\n";
        else
            echo "<form action='alquila.php' method='post' name='datos_libro'>\n";

        while ($row = mysql_fetch_array($result)) {
            echo "Titulo:<input type='text' name='titulo' value='$row[4]'><br>\n";
            echo "Autor:<input type='text' name='id_autor' value='" . buscarCampo('nombre', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido1', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido2', 'autor', 'id_autor', $row[10]) . "'><br>\n";
            echo "Categoria: <input type='text' name='id_categoria' value='" . buscarCampo('nombre_categoria', 'categoria', 'id_categoria', $row[0]) . "'><br>\n";
            echo "Idioma: <input type='text' name='id_idioma_639_1' value='" . buscarCampo('idioma', 'idiomas_639_1', 'id_idioma_639_1', $row[12]) . "'><br>\n";
            echo "ISBN: <input type='text' name='isbn' value='$row[3]'><br>\n";
            echo "Fecha pub: <input type='text' name='fecha_publicacion' value='$row[5]'><br>\n";
            echo "Fecha adq: <input type='text' name='fecha_adquisicion' value='$row[6]'><br>\n";
            echo "Paginas: <input type='text' name='num_paginas' value='$row[7]'><br>\n";
            echo "Sinopsis: <input type='textarea' name='sinopsis' value='$row[8]'><br>\n";
            echo "Edicion: <input type='text' name='edicion' value='$row[9]'><br>\n";
            echo "Editor: <input type='text' name='id_editorial' value='" . buscarCampo('nombre_editorial', 'editorial', 'id_editorial', $row[11]) . "'><br>\n";
            $fecha = date("Y/m/d-H:i:s");
            echo "<input type='hidden' name='usuario_dni' value='" . buscarCampo('dni', 'usuario', 'nombre_usuario', $usuario) . "'>\n"; //usuario ->dni
            echo "<input type='hidden' name='libro_categoria_id_categoria' value='$row[0]'>\n"; //categoria -> id_categoria 
            echo "<input type='hidden' name='libro_cod_apellido' value='$row[1]'>\n"; //libro -> cod_apellido
            echo "<input type='hidden' name='libro_cod_titulo' value='$row[2]'>\n"; //libro -> cod_titulo
            echo "<input type='hidden' name='fecha_hora_prestamo' value='$fecha'>\n"; //fecha y hora date("Ymd") date("H:i:s")
            $_SESSION['cat'] = $row[0];
            $_SESSION['ape'] = $row[1];
            $_SESSION['tit'] = $row[2];
            echo "<div id='qr'>";
            $data = qrlink($row[4], $row[12]);
            qrgen($data);
            echo "</div>";
        }

        echo "<br>Hay $total_libros libros en la biblioteca<br>\n";
        if ($pagina != 1) {
            echo "<br><a href=$mipagina?pagina=1><< Primera</a>&nbsp;&nbsp;&nbsp;";
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

        if ($tipousuario == 1)
            echo "<br><br><input type='submit' value='Modifica libro'/>\n";
        else
            echo "<br><br><input type='submit' value='Alquila libro'/>\n";

        echo "</form>\n";
        echo "</div>\n";
        mysql_close();
        ?>
        <div class="filtros">
            <input type="radio" name="visualizacion" value="Filtrar" onClick="grafica_filtro('block');" />Campos<br />
            <input type="radio" name="visualizacion" value="Filtrar2" onClick="grafica_filtro2('block');" />Input<br />
            <input type="radio" name="visualizacion" value="Listado general" onClick="esconde_filtros('none');" />Consulta general
        </div>

        <div id="oculto">
            <?php include "consulta_criterios.php" ?>
        </div>

        <div id="oculto2">
            <?php include "/auto/input.php" ?>
        </div>

        <h1>Consulta general</h1>
    </body>
</html>