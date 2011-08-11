<?php

function rellenarCampos($ftabla, $orden) {
    include "conexion.php";
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

function configuraAcceso ($server,$usuario,$password,$db) {
$fichero = fopen("files/config.aps", "w+");
$string1 = $server . chr(13) . chr(10);
fputs($fichero, $string1);
$string2 = $usuario . chr(13) . chr(10);
fputs($fichero, $string2);
$string3 = $password . chr(13) . chr(10);
fputs($fichero, $string3);
$string4 = $db . chr(13) . chr(10);
fputs($fichero, $string4);

if ($fichero)
    echo "Configuracion guardada con exito!";
else
    echo "Error al guardar la configuracion";

fclose($fichero);
}

function conexion() {
$i = 0;
$fichero = fopen("files/config.aps", "r");        //abre el fichero para poder cargar los datos

while ($text[$i] = fgets($fichero, 1024)) { //pon cada linea del fichero en una variable text[i]
    $i++;                                   //siguiente linea del fichero
}

fclose($fichero);

$server = trim($text[0]);
$usr = trim($text[1]);
$pwd = trim($text[2]);
$db = trim($text[3]);
$tabla = trim($text[4]);

$conecta = mysql_connect($server, $usr, $pwd);
if (!$conecta)
    echo "Error conectando a la base de datos.";

$datos = mysql_select_db($db, $conecta);
if (!$datos)
    echo "Error seleccionando la base de datos.";
}

function extraeCampo ($scampo,$fcampo,$wcampo,$wcampo1){
        $query = "SELECT $scampo FROM $fcampo WHERE $wcampo=$wcampo1";
        $existe = mysql_query($query);
        $carga= mysql_fetch_row($existe);
        $resultado=$carga[0];
        return $resultado;
}

?>
