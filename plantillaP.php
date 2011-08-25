<?php
session_start();
include "funciones.php";
include "defcon.php";

$plantilla=$_POST['opciones'];
$query="UPDATE usuario SET plantilla_id_plantilla=$plantilla";
$resultado=  mysql_query($query);

if ($resultado)
    echo "<b>Plantilla CSS ".$plantilla." guardada con exito</b>";
else 
    echo "ERROR al guardar la plantilla CSS";

$_SESSION['plantilla']=$plantilla;
?>
<br />
<a href="#" onclick="window.opener.location.reload(); window.close();">Cierra ventana</a>