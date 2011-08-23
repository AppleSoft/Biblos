<?php
session_start();
if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: loginG.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Biblos - Consulta especifica</title>
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <link rel="stylesheet" type="text/css" href="css/consulta.css" />   
        <script src="js/funciones.js" type="text/javascript"></script>
        <script type="text/javascript"> 
            window.onload=esconde_div;
        </script>
    </head>

    <body>

        <?php
        include "funciones.php";
        include "defcon.php";

        $mipagina = $_SERVER['PHP_SELF'];
        $usuario = $_SESSION['usuario'];
        $dni = $_SESSION['dni'];

        if (isset($_GET['pagina']))
            $pagina = $_GET['pagina'];

        if (!isset($pagina)) {
            $pagina = "1";
        }

        if (isset($_POST['filtracion'])) {
            $filtracion = trim($_POST['filtracion']);
            $_SESSION['filtracion'] = trim($_POST['filtracion']);
        }
        else
            $filtracion = $_SESSION['filtracion'];

        if (isset($_POST['quebuscas'])) {
            $quebuscas = trim($_POST['quebuscas']);
            $_SESSION['quebuscas'] = trim($_POST['quebuscas']);
        }
        else
            $quebuscas = $_SESSION['quebuscas'];

        switch ($filtracion) {
            case 1:
            $filtracion="Autor";
            listadoPorAutor($usuario,$filtracion, $quebuscas, $pagina, $mipagina);
            break;
            case 2:
            $filtracion="Titulo";
            listadoPorTitulo($usuario,$filtracion, $quebuscas, $pagina, $mipagina);
            break;
            case 3:
            $filtracion="Categoria";
            listadoPorCategoria($usuario,$filtracion, $quebuscas, $pagina, $mipagina);
            break;
        }

        mysql_close();
        ?>

        <div id="grafica">
            <input type="radio" name="visualizacion" value="Filtrar" onClick="grafica_filtro('block');" />Filtrar por campo<br />
            <input type="radio" name="visualizacion" value="Filtrar2" onClick="grafica_filtro2('block');" />Filtrar por input<br />
            <input type="radio" name="visualizacion" value="Listado general" onClick="window.location='consulta_general.php'" />Lista completa
        </div>
        <div id="oculto">
            <?php include "consulta_criterios.php" ?>
        </div>
        <div id="oculto2">
            <?php include "/auto/input.php" ?>
        </div>
        <h1>Consulta por campo</h1>
    </body>
</html>