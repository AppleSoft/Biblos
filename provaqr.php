<?php
include "funciones.php";

$nombrelibro ="War and peace";
$ididioma="en";
echo "este link enlaza a '$nombrelibro', en Wikipedia.$ididioma";
$data=qrlink($nombrelibro,$ididioma);

qrgen($data);
?>
