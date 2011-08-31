<?php
session_start();
include "funciones.php";
include "defcon.php";

if (!isset($_SESSION['logeado'])
        || $_SESSION['logeado'] != true) {
    header('Location: loginG.php');
    exit;
} else {
    $usuario = $_SESSION['usuario'];
    $tipousuario = $_SESSION['tipousuario'];
    $usrdni = $_SESSION['dni'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <link rel='shortcut icon' type='image/x-icon' href='../imgs/favicon.ico'  />
        <?php eligeplantilla($_SESSION['plantilla']); ?>
        <script src='../js/funciones.js' type='text/javascript'></script>
        <script type='text/javascript'> 
            window.onload=esconde_div;
        </script>
    </head>
    <body>
        <div id="menu">
            <?php
            if ($tipousuario == 1) {
                echo "<a href='libroG.php'>Agregar un libro a la biblioteca</a>||";
                echo "<a href='modificaLibroG.php'>Modificar un libro</a>||";
                echo "<a href='autorG.php'>Agregar autor a la biblioteca</a>||";
                echo "<a href='modificaAutorG.php'>Modificar autor</a>||";
                echo "<a href='editorialG.php'>Agregar una editorial a la biblioteca</a>||";
                echo "<a href='modificaEditorialG.php'>Modificar editorial</a>||";
            }
            echo "<a href='consulta_general.php' id='selecionado'>Consulta la biblioteca</a>||";
            ?>
            <a href="javascript:;" onClick="window.open('plantilla.php','CSS','width=180, height=150, location=0, status=0, resizable=0, scrollbars=0')">Elige plantilla CSS</a>
        </div>
        <?php
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
                $filtracion = "Autor";
                listadoPorAutor($usuario, $filtracion, $quebuscas, $pagina, $mipagina);
                break;
            case 2:
                $filtracion = "Titulo";
                listadoPorTitulo($usuario, $filtracion, $quebuscas, $pagina, $mipagina);
                break;
            case 3:
                $filtracion = "Categoria";
                listadoPorCategoria($usuario, $filtracion, $quebuscas, $pagina, $mipagina);
                break;
        }

        mysql_close();
        ?>

        <div class="filtros">
            <input type="radio" name="visualizacion" value="Filtrar" onClick="grafica_filtro('block');" />Campos<br />
            <!-- <input type="radio" name="visualizacion" value="Filtrar2" onClick="grafica_filtro2('block');" />Input<br /> -->
            <input type="radio" name="visualizacion" value="Listado general" onClick="window.location='consulta_general.php'" />Consulta general
        </div>
        <div id="oculto">
            <?php include "consulta_criterios.php" ?>
        </div>

        <div id="oculto2">
            
        </div>

        <h1>Consulta con filtro</h1>
        
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
    </body>
</html>