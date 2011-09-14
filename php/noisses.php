<?php
function controlaSesion() {
    if (!isset($_SESSION['logeado'])
            || $_SESSION['logeado'] != true) {
        header('Location: loginG.php');
        exit;
    }
}

?>
