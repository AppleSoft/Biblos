<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$id_autor=$_POST['id_autor'];
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$nacionalidad=$_POST['nacionalidad'];

$query = "UPDATE autor set 
    nombre='".$nombre."', 
    apellido1='".$apellido1."', 
    apellido2='".$apellido2."',
    nacionalidad='".$nacionalidad."'
    where id_autor='".$id_autor."'";

$result = mysql_query($query);

controlQuery($result, 'Autor modificado con exito', 'Se ha verificado un error al modificar el autor', 5, 'modificaAutorG.php');

?>