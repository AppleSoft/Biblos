<?php

session_start();

if (isset($_SESSION['logueado'])) {

   unset($_SESSION['logeado']);

}

header('Location: loginG.php');

exit;
