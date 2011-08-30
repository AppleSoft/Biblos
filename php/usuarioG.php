<?php

$idusuario=$_POST['idusuario'];
$password=$_POST['password'];
$email=$_POST['email'];
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];

//include "conexion.php";

$query="SELECT FROM usuario";

$resultado= mysql_query($query,$conecta);

//cargar desde la tabla de tipo usuario los valores de root, admin, consulta
//si es root/admin puede crear otro administrador o consulta
//nadie toca root
//consulta solo crea usuario consulta
//admin no tiene poderes sobre root
//admin puede crear otro admin pero no puede eliminar otro admin (solo root elimina admin)
//root solo puede cambiar su contraseña pero no autoeliminarse
?>
