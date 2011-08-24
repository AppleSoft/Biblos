<?php
session_start();
if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: loginG.php'); //Redirige al inicio de sesion en caso de que no tengas hecho el login
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos - Consulta general</title>
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <link rel="stylesheet" type="text/css" href="css/consulta.css" />   
        <script src="js/funciones.js" type="text/javascript"></script>
        <script type="text/javascript"> 
            window.onload=esconde_div;
        </script>
    </head>
    <body>

        <?php
        include "funciones.php";
        include "defcon.php";

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

        echo "<div id='formulario_libro'>";
        echo "<form action='alquila.php' method='post' name='datos_libro'>";
        while ($row = mysql_fetch_array($result)) {
<<<<<<< HEAD
            echo "Titulo:<input type='text' name='titulo' <?php readonly='readonly' value='$row[4]'><br>";
            echo "Autor:<input type='text' name='abc' readonly='readonly' value='" . buscarCampo('nombre', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido1', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido2', 'autor', 'id_autor', $row[10]) . "'><br>";
=======
            echo "Titulo:<input type='text' name='titulo' value='$row[4]'><br>";
            echo "Autor:<input type='text' name='abc' value='" . buscarCampo('nombre', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido1', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido2', 'autor', 'id_autor', $row[10]) . "'><br>";
>>>>>>> 6bae361ecf74a116dffd1a538338d379e0a1051b
            echo "Categoria: <input type='text' name='abc' value='" . buscarCampo('nombre_categoria', 'categoria', 'id_categoria', $row[0]) . "'><br>";
            echo "Idioma: <input type='text' name='abc' value='" . buscarCampo('idioma', 'idiomas_639_1', 'id_idioma_639_1', $row[12]) . "'><br>";
            echo "ISBN: <input type='text' name='abc' value='$row[3]'><br>";
            echo "Fecha pub: <input type='text' name='abc' value='$row[5]'><br>";
            echo "Fecha adq: <input type='text' name='abc' value='$row[6]'><br>";
            echo "Paginas: <input type='text' name='abc' value='$row[7]'><br>";
            echo "Sinopsis: <input type='textarea' name='abc' value='$row[8]'><br>";
            echo "Edicion: <input type='text' name='abc' value='$row[9]'><br>";
            echo "Editor: <input type='text' name='abc' value='" . buscarCampo('nombre_editorial', 'editorial', 'id_editorial', $row[11]) . "'><br>";
            $fecha = date("Y/m/d-H:i:s");
            echo "<input type='hidden' name='usuario_dni' value='" . buscarCampo('dni', 'usuario', 'nombre_usuario', $usuario) . "'>"; //usuario ->dni
            echo "<input type='hidden' name='libro_categoria_id_categoria' value='$row[0]'>"; //categoria -> id_categoria 
            echo "<input type='hidden' name='libro_cod_apellido' value='$row[1]'>"; //libro -> cod_apellido
            echo "<input type='hidden' name='libro_cod_titulo' value='$row[2]'>"; //libro -> cod_titulo
            echo "<input type='hidden' name='fecha_hora_prestamo' value='$fecha'>"; //fecha y hora date("Ymd") date("H:i:s")
        }

        echo "<br>Hay $total_libros libros en la biblioteca<br>";
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

        echo "<br><br><input type='submit' value='Alquila libro'/>";

        echo "</form>";
        mysql_close();
        ?>
        <div id="grafica">
            <input type="radio" name="visualizacion" value="Filtrar" onClick="grafica_filtro('block');" />Campos<br />
            <input type="radio" name="visualizacion" value="Filtrar2" onClick="grafica_filtro2('block');" />Input<br />
            <input type="radio" name="visualizacion" value="Listado general" onClick="esconde_filtros('none');" />Lista completa
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