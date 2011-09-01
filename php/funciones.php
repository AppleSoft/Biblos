<?php

function controlSesion() {
    if (!isset($_SESSION['logeado'])
            || $_SESSION['logeado'] != true) {
        header('Location: ../index.php');
        exit;
    }
}

function dibujaMenu() {
    if ($_SESSION['tipousuario'] == 1) {
        echo "<a href='libroG.php'>Agregar un libro a la biblioteca</a>||";
        echo "<a href='modificaLibroG.php'>Modificar un libro</a>||";
        echo "<a href='autorG.php'>Agregar autor a la biblioteca</a>||";
        echo "<a href='modificaAutorG.php'>Modificar autor</a>||";
        echo "<a href='editorialG.php'>Agregar una editorial a la biblioteca</a>||";
        echo "<a href='modificaEditorialG.php'>Modificar editorial</a>||";
    }
    echo "<a href='consulta_general.php'>Consulta la biblioteca</a>||";
}

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

function qrlink($nombrelibro, $ididioma) {
    $nombrelibro = trim($nombrelibro);
    $nombrelibbus = str_replace(" ", "_", $nombrelibro);
    $linkdata = "http://" . $ididioma . ".wikipedia.org/wiki/" . $nombrelibbus;
    return $linkdata;
}

function qrgen($linkdata) {
    include "../phpqrcode/qrlib.php";
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

function eligeplantilla($plantilla_usuario) {
    echo "<link rel='shortcut icon' type='image/x-icon' href='..imgs/favicon.ico'  />";
    echo "<link rel='stylesheet' type='text/css' href='../css/consulta" . $plantilla_usuario . ".css' />";
    echo "<script src='../js/funciones.js' type='text/javascript'></script>";
}

?>