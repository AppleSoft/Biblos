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
   
        $query = "SELECT * FROM autor ORDER BY apellido1";
        $result = mysql_query($query);
        
        echo "Autores disponibles<br>";
        echo "<select onchange='cambiaInput(this.value)'>";
        echo "<option name='autor' value=''>Seleciona una opcion</option>";
        while ($row = mysql_fetch_row($result)) {
            echo "<option name='autor' value='$row[1] $row[2] $row[3]'>$row[1] $row[2] $row[3]</option>";
        }
        echo "</select>";
        ?>
        </div>
    </body>
</html>
