<?php
session_start();
include "funciones.php";
controlSesion();
conexion();

$dni=$_SESSION['dni'];
$plantilla=$_GET['css'];
$query="UPDATE usuario SET plantilla_id_plantilla=$plantilla where dni=$dni";
$resultado=  mysql_query($query);
$_SESSION['css']=$plantilla;

?>
<SCRIPT LANGUAGE="javascript"> 
    window.opener.location.reload();
    self.close();    
</SCRIPT>

