<!DOCTYPE html>
<html>
  <head>
        <title>Biblos</title>
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <link rel="stylesheet" type="text/css" href="css/consulta.css" />   
        <script src="js/funciones.js" type="text/javascript"></script>
        <script type="text/javascript"> 
            window.onload=esconde_div;
        </script>
    </head>
    <body>
        <form name="formulario_consulta" id="formulario_consulta" action="consulta_especifica.php" method="post">
            <input type="radio" name="filtracion" value="1" onClick="grafica_filtro_autor('block');" />Autor<br />
            <input type="radio" name="filtracion" value="2" onClick="grafica_filtro_titulo('block');"/>Titulo<br />
            <input type="radio" name="filtracion" value="3" onClick="grafica_filtro_categoria('block');"/>Categoria<br />
            <input type="text" size="30" value="" id="quebuscas" name="quebuscas" />
            <input type="submit" value="Filtra" />
        </form>

        <div id="oculto_autor">
            <?php include "dropdown_autor.php" ?>
        </div>

        <div id="oculto_titulo">
            <?php include "dropdown_titulo.php" ?>
        </div>

        <div id="oculto_categoria">
            <?php include "dropdown_categoria.php" ?>
        </div>

    </body>
</html>