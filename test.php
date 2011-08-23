<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "funciones.php";
        include "defcon.php";
        $mipagina = $_SERVER['PHP_SELF'];
        
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
       
        if (isset($_GET['pagina']))
            $pagina = $_GET['pagina'];

        if (!isset($pagina)) {
            $pagina = "1";
        }
        
        switch ($filtracion) {
            case 1:
                $filtracion="Autor";
                listadoPorAutor($filtracion,$quebuscas,$pagina,$mipagina);
                break;
            case 2:
                $filtracion="Titulo";
                listadoPorTitulo($filtracion,$quebuscas,$pagina,$mipagina);
                break;
            case 3:
                $filtracion="Categoria";
                listadoPorCategoria($filtracion,$quebuscas,$pagina,$mipagina);
                break;
        }
        
        
        
       ?>
    </body>
</html>
