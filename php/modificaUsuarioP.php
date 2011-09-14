<?php

session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$dni = $_POST['dni'];
$clave = $_POST['clave'];
$nombre_usuario = $_POST['nombre_usaurio'];
$apellido1_usuario = $_POST['apellido1_usuario'];
$apellido2_usuario = $_POST['apellido2_usuario'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$plantilla = $_POST['css'];
$tipo_usuario = $_POST['tipo_usuario'];

$query = "UPDATE libro set 
    clave='" . $clave . "', 
    nombre_usuario='" . $nombre_usuario . "', 
    apellido1_usuario='" . $apellido1_usuario . "',
    apellido2_usuario='" . $apellido2_usuario . "',
    email='" . $email . "',
    telefono='" . $telefono . "',
    direccion='" . $direccion . "',
    plantilla_id_plantilla='" . $plantilla . "'
    tipo_usuario_id_tipo_usuario='" . $tipo_usaurio . "'
    where dni='" . $dni . "'";

$result = mysql_query($query);

controlQuery($result, 'Los datos del usuario se han actualizado con exito', 'Error al actualizar los datos', 5, 'modificaUsuarioG.php');
?>