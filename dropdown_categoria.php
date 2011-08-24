<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="dropdown_filtros">
        <?php
        include "defcon.php";
   
        $query = "SELECT * FROM categoria ORDER BY id_categoria";
        $result = mysql_query($query);
        
        echo "Categorias disponibles:<br>";
        echo "<select onchange='cambiaInput(this.value)'>";
                echo "<option name='autor' value=''>Seleciona una opcion</option>";
        while ($row = mysql_fetch_row($result)) {
            echo "<option name='autor' value='$row[1]'>$row[1] (ID:$row[0])</option>";
        }
        echo "</select>";
        ?>
        </div>
    </body>
</html>
