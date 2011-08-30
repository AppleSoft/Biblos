<?php
session_start();
 include "funciones.php";
    include "defcon.php";
if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: ../index.php');
    exit;
} else {
    $usuario = $_SESSION['usuario'];
    $tipousuario = $_SESSION['tipousuario'];
    $usrdni = $_SESSION['dni'];
}
?>
<!DOCTYPE html>
<html>
 <title>Biblos - Insertar nueva editorial</title>
        <link rel='shortcut icon' type='image/x-icon' href='imgs/favicon.ico'  />
        <?php eligeplantilla($_SESSION['plantilla']); ?>
        <script src='../js/funciones.js' type='text/javascript'></script>
    </head>
    <body>
       
        <FORM ACTION="editorialP.php" METHOD="post" onSubmit="return validacampo(this);">
            Editorial : <INPUT TYPE="text" NAME="nombre_editorial" SIZE=45 MAXLENGTH=45 class="obligatorio" autocomplete="off" onKeyPress="return no_caracter_esp(this,event);"/>*
           <br/>
            <input type="submit" value="Entrar" />
            <input type="reset" value="Borrar" />
        </form>
            </body>
</html>