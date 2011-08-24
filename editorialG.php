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
        ?>
        <FORM ACTION="editorialP.php" METHOD="post">
            Editorial : <INPUT TYPE="text" NAME="nombre_editorial" SIZE=45 MAXLENGTH=45 <?php if(!isset($_GET['faltacampo1']))echo "/>*"; else echo controlacampo($_GET['faltacampo1']);?>
           <br/>
            <input type="submit" value="Entrar" />
            <input type="reset" value="Borrar" />
        </form>
            </body>
</html>