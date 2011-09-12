<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <?php eligeplantilla(); ?>
        <script type='text/javascript'> 
            window.onload=esconde_div;
        </script>
    </head>
    <body>
        <div id="menu">
            <?php include "menucss.php"; ?>
        </div> 
        <?php
        $mipagina = $_SERVER['PHP_SELF'];
        $usuario = $_SESSION['usuario'];
        $dni = $_SESSION['dni'];

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
                $_SESSION['filtro']="autor";
                include "fichaLibroAutor.php";
                break;
            case 2:
                $_SESSION['filtro']="titulo";
                include "fichaLibroTitulo.php";
                break;
            case 3:
                $_SESSION['filtro']="categoria";
                include "fichaLibroCategoria.php";
                break;
        }
        ?>

        <div class="filtros">
            <input type="radio" name="visualizacion" value="Filtrar" onClick="grafica_filtro('block');" />Campos<br />
            <input type="radio" name="visualizacion" value="Listado general" onClick="window.location='consulta_general.php'" />Consulta general
        </div>
        <div id="oculto">
            <?php include "consulta_criterios.php" ?>
        </div>

        <div id="oculto2"></div>

        <h1>Consulta con filtro</h1>
        
        <div id="pie">
            <?php include "pie_pagina.php"; ?>
        </div>
    </body>
</html>