<?php

$usuario = $_SESSION['usuario'];
$num_mp=4;
echo "Estas logeado como <b>$usuario</b>, tienes <b>$num_mp</b> <a href='mp.php'>mensaje(s) personal(es)</a> sin leer || <a href='envia_mp'>Envia</a> mensaje personal || Gestiona tu <a href='perfil.php'>perfil</a>";
     
?>
