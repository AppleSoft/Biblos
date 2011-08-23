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
   
        $query = "SELECT * FROM libro ORDER BY titulo";
        $result = mysql_query($query);
        
        echo "Libros disponiles<br>";
        echo "<select onchange='cambiaInput(this.value)'>";
                echo "<option name='autor' value=''>Seleciona una opcion</option>";
        while ($row = mysql_fetch_row($result)) {
            echo "<option name='autor' value='$row[4]'>$row[4]</option> ";
        }
        echo "</select>";
        ?>
        </div>
    </body>
</html>
