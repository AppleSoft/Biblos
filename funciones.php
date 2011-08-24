<?php

function rellenarCampos($ftabla, $orden) {
    include "defcon.php";
    $query = "SELECT * FROM $ftabla ORDER BY $orden";
    $result = mysql_query($query);
    $contcol = mysql_num_fields($result);
    echo "<SELECT NAME='$ftabla'>";
    while ($col = mysql_fetch_row($result)) {
        echo "<OPTION VALUE='$col[0]'>";
        for ($i = 1; $i < $contcol; $i++) {
            echo $col[$i] . " ";
        }
        echo "(" . $col[0] . ")</OPTION>\n";
    }
    echo "</SELECT>";
}

function calcularDewey($id_categoria, $id_autor, $titulo) {
    $q1 = "SELECT apellido1 FROM autor where id_autor=$id_autor";
    $rt1 = mysql_query($q1);
    $r1 = mysql_fetch_row($rt1);
    $rf1 = $r1[0];
    $rf1 = substr($rf1, 0, 3);
    $rf2 = substr($titulo, 0, 3);

    $dewey = strtoupper($id_categoria . $rf1 . $rf2);
    return $dewey;
}

function configuraAcceso($server, $usuario, $password, $db) {
    $fichero = fopen("files/config.aps", "w+");
    $string1 = $server . chr(13) . ";";
    fputs($fichero, $string1);
    $string2 = $usuario . chr(13) . ";";
    fputs($fichero, $string2);
    $string3 = $password . chr(13) . ";";
    fputs($fichero, $string3);
    $string4 = $db . chr(13) . ";";
    fputs($fichero, $string4);

    if ($fichero)
        echo "Configuracion guardada con exito!";
    else
        echo "Error al guardar la configuracion";

    fclose($fichero);
}

function conexion() {
    /* $i = 0;
      $fichero = fopen("files/config.aps", "r");        //abre el fichero para poder cargar los datos

      while ($text[$i] = fgetcsv($fichero, 1024, ";")) { //pon cada linea del fichero en una variable text[i]
      $i++;                                   //siguiente linea del fichero
      }

      fclose($fichero);

      $server = trim($text[0]);
      $usr = trim($text[1]);
      $pwd = trim($text[2]);
      $db = trim($text[3]);
      $tabla = trim($text[4]);
     */

    $server = "localhost";
    $usr = "phpusr";
    $pwd = "phppwd";
    $db = "biblos_g2";


    $conecta = mysql_connect($server, $usr, $pwd);
    if (!$conecta)
        echo "Error conectando a la base de datos.";

    $datos = mysql_select_db($db, $conecta);
    if (!$datos)
        echo "Error seleccionando la base de datos.";
}

function buscarCampo($nombre_campo, $tabla, $nombre_criterio, $criterio) {
    $query = "SELECT $nombre_campo FROM $tabla WHERE $nombre_criterio='$criterio'";
    $existe = mysql_query($query);
    $carga = mysql_fetch_row($existe);
    $campo = $carga[0];
    return $campo;
}

// juntar las dos funciones poniendo un if que averigue si queremos usar la funcion 1 o la 2 (segun este o no la segunda variable)

function extraeCampo2($scampo, $fcampo, $nombre_campo1, $criterio1, $nombre_campo2, $criterio2) {
    $query = "SELECT $scampo FROM $fcampo WHERE $nombre_campo1='$criterio1' and $nombre_campo2='$criterio2'";
    $existe = mysql_query($query);
    $carga = mysql_fetch_row($existe);
    $resultado = $carga[0];
    return $resultado;
}

//LISTADO POR AUTOR
function listadoPorAutor($usuario, $dondebuscas, $quebuscas, $pagina, $mipagina) {
    $sql = "SELECT * FROM autor WHERE nombre LIKE '%$quebuscas%' or apellido1 LIKE '%$quebuscas%' or apellido2 LIKE '%$quebuscas%' ORDER BY apellido1";
    $query = mysql_query($sql);
    $i = 0;
    while ($row = mysql_fetch_row($query)) {
        $array_identificador[$i] = $row[0];
        $i++;
    };
    $total_resultados = mysql_num_rows($query);

    $array_busqueda = "";
    for ($i = 1; $i < $total_resultados; $i++) {
        $array_busqueda = $array_busqueda . " OR autor_id_autor='" . $array_identificador[$i] . "'";
    }

    $primer_campo = $array_identificador[0];

    $buscaesto = "autor_id_autor='" . $primer_campo . "'" . $array_busqueda;
    $limite = "1";
    $total_paginas = ceil($total_resultados / $limite);
    $offset = ($pagina - 1) * $limite;
    $query = "SELECT * FROM libro WHERE $buscaesto ORDER BY titulo LIMIT $offset, $limite";
    $result = mysql_query($query);
    $supertotal = mysql_num_rows($result);

    echo "<div id='formulario_libro'>";
    echo "<form action='alquila.php' method='post' name='datos_libro'>";
    while ($row = mysql_fetch_array($result)) {
        echo "Titulo:<input type='text' name='titulo' value='$row[4]'><br>";
        echo "Autor:<input type='text' name='abc' value='" . buscarCampo('nombre', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido1', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido2', 'autor', 'id_autor', $row[10]) . "'><br>";
        echo "Categoria: <input type='text' name='abc' value='" . buscarCampo('nombre_categoria', 'categoria', 'id_categoria', $row[0]) . "'><br>";
        echo "Idioma: <input type='text' name='abc' value='" . buscarCampo('idioma', 'idiomas_639_1', 'id_idioma_639_1', $row[12]) . "'><br>";
        echo "ISBN: <input type='text' name='abc' value='$row[3]'><br>";
        echo "Fecha pub: <input type='text' name='abc' value='$row[5]'><br>";
        echo "Fecha adq: <input type='text' name='abc' value='$row[6]'><br>";
        echo "Paginas: <input type='text' name='abc' value='$row[7]'><br>";
        echo "Sinopsis: <input type='textarea' name='abc' value='$row[8]'><br>";
        echo "Edicion: <input type='text' name='abc' value='$row[9]'><br>";
        echo "Editor: <input type='text' name='abc' value='" . buscarCampo('nombre_editorial', 'editorial', 'id_editorial', $row[11]) . "'><br>";
        echo "<input type='hidden' name='usuario_dni' value='" . buscarCampo('dni', 'usuario', 'nombre_usuario', $usuario) . "'>"; //usuario ->dni
        echo "<input type='hidden' name='libro_categoria_id_categoria' value='$row[0]'>"; //categoria -> id_categoria 
        echo "<input type='hidden' name='libro_cod_apellido' value='$row[1]'>"; //libro -> cod_apellido
        echo "<input type='hidden' name='libro_cod_titulo' value='$row[2]'>"; //libro -> cod_titulo
        $fecha = date("Y/m/d-H:i:s");
        echo "<input type='hidden' name='fecha_hora_prestamo' value='$fecha'>"; //fecha y hora date("Ymd") date("H:i:s")
        echo "<div id='qr'>";
            $data = qrlink($row[4], $row[12]);
            qrgen($data);
            echo "</div>";
    }
    echo "<br>Se han encontrado <b>$supertotal</b> libro(s) con tu criterio de busqueda<br>";
    echo "(Libro cuyo <b>$dondebuscas</b> contenga <b>$quebuscas</b>)<br>";
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
        if ($i == $total_resultados)
            $to = $total_resultados;
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
    echo "<br><br><input type='submit' value='Alquila libro'/>";
    echo "</form>";
    echo "</div>";
}

// LISTADO POR TITULO
function listadoPorTitulo($usuario, $dondebuscas, $quebuscas, $pagina, $mipagina) {
    $sql = "SELECT * FROM libro WHERE titulo LIKE '%$quebuscas%' ORDER BY titulo";
    $query = mysql_query($sql);
    $total_resultados = mysql_num_rows($query);
    $limite = "1";
    $total_paginas = ceil($total_resultados / $limite);

    $offset = ($pagina - 1) * $limite;

    $query = "SELECT * FROM libro WHERE titulo LIKE '%$quebuscas%' ORDER BY titulo LIMIT $offset, $limite";
    $result = mysql_query($query);
    $supertotal = mysql_num_rows($result);

    echo "<div id='formulario_libro'>";
    echo "<form action='alquila.php' method='post' name='datos_libro'>";
    while ($row = mysql_fetch_array($result)) {
        echo "Titulo:<input type='text' name='titulo' value='$row[4]'><br>";
        echo "Autor:<input type='text' name='abc' value='" . buscarCampo('nombre', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido1', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido2', 'autor', 'id_autor', $row[10]) . "'><br>";
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
        echo "<div id='qr'>";
            $data = qrlink($row[4], $row[12]);
            qrgen($data);
            echo "</div>";
    }

    echo "<br>Se han encontrado <b>$total_resultados</b> libro(s) con tu criterio de busqueda<br>";
    echo "(Libro cuyo <b>$dondebuscas</b> contenga <b>$quebuscas</b>)<br>";
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
        if ($i == $total_resultados)
            $to = $total_resultados;
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

    echo "<br><br><input type='submit' value='Alquila libro'/>";

    echo "</form>";
    echo "</div";
}

//LISTADO POR CATEGORIA
function listadoPorCategoria($usuario, $dondebuscas, $quebuscas, $pagina, $mipagina) {
    $sql = "SELECT * FROM libro where categoria_id_categoria='$quebuscas' ORDER BY titulo";
    $query = mysql_query($sql);
    $total_resultados = mysql_num_rows($query);
    $limite = "1";
    $total_paginas = ceil($total_resultados / $limite);

    $offset = ($pagina - 1) * $limite;

    $query = "SELECT * FROM libro where categoria_id_categoria='$quebuscas' ORDER BY titulo LIMIT $offset, $limite";
    $result = mysql_query($query);
    $supertotal = mysql_num_rows($result);

    echo "<div id='formulario_libro'>";
    echo "<form action='alquila.php' method='post' name='datos_libro'>";
    while ($row = mysql_fetch_array($result)) {
        echo "Titulo:<input type='text' name='titulo' value='$row[4]'><br>";
        echo "Autor:<input type='text' name='abc' value='" . buscarCampo('nombre', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido1', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido2', 'autor', 'id_autor', $row[10]) . "'><br>";
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
        echo "<div id='qr'>";
            $data = qrlink($row[4], $row[12]);
            qrgen($data);
            echo "</div>";
    }

    echo "<br>Se han encontrado <b>$total_resultados</b> libro(s) con tu criterio de busqueda<br>";
    echo "(Libro cuya <b>$dondebuscas</b> sea <b>$quebuscas</b>)<br>";
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
        if ($i == $total_resultados)
            $to = $total_resultados;
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

    echo "<br><br><input type='submit' value='Alquila libro'/>";

    echo "</form>";
    echo "</div>";
}

function qrlink($nombrelibro, $ididioma) {
    $nombrelibro = trim($nombrelibro);
    $nombrelibbus = str_replace(" ", "_", $nombrelibro);
    $linkdata = "http://" . $ididioma . ".wikipedia.org/wiki/" . $nombrelibbus;
    return $linkdata;
}

function qrgen($linkdata) {
    include "/phpqrcode/qrlib.php";
    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
    $errorCorrectionLevel = 'H';
    $matrixPointSize = '2';

    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);

    $filename = $PNG_TEMP_DIR . 'test.png';

    QRcode::png($linkdata, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" />';
}

function eligeplantilla($id){
echo "<head>
        <title>Biblos - Consulta general</title>
        <link rel='shortcut icon' type='image/x-icon' href='imgs/favicon.ico'  />
        <link rel='stylesheet' type='text/css' href='css/consulta".$id.".css' />   
        <script src='js/funciones.js' type='text/javascript'></script>
        <script type='text/javascript'> 
            window.onload=esconde_div;
        </script>
    </head>";
}
?>
