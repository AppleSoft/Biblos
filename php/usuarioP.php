<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
controlAdmin();

$dni=$_POST['dni'];
$clave=$_POST['clave'];
$nombre_usuario=$_POST['nombre_usuario'];
$apellido1_usuario=$_POST['apellido1_usuario'];
$apellido2_usuario=$_POST['apellido2_usuario'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$plantilla=$_POST['css'];
$tipo_usuario=$_POST['tipo_usuario'];

$query ="INSERT INTO usuario 
    (dni, clave, nombre_usuario, apellido1_usuario, apellido2_usuario, email, telefono, direccion, plantilla_id_plantilla, tipo_usuario_id_tipo_usuario)
VALUES
    ('$dni', '$clave', '$nombre_usuario', '$apellido1_usuario', '$apellido2_usuario', '$email', '$telefono', '$direccion', '$plantilla', '$tipo_usuario')";
$result=  mysql_query($query);
controlQuery($result, 'Alta usuario efectuada con exito', 'Error al dar de alta al usuario', 5, 'usuarioG.php');
?>