<!DOCTYPE html>
<html>
    <head>
        <title>Insertar nuevo autor</title>
        <link rel="stylesheet" media="screen" type="text/css" href="css/style.css" />
    </head>
    <body>
          <?php
            include "funciones.php";
            include "defcon.php";
        ?>
        <FORM ACTION="autorP.php" METHOD="post">
            Nombre: <INPUT TYPE="text" NAME="nombre" SIZE=30 MAXLENGTH=30 <?php if(!isset($_GET['faltacampo1']))echo "/>*"; else echo controlacampo($_GET['faltacampo1']);?>
            <BR>
            Primer apellido: <INPUT TYPE="text" NAME="apellido1" SIZE=35 MAXLENGTH=35 <?php if(!isset($_GET['faltacampo2']))echo "/>*"; else echo controlacampo($_GET['faltacampo2']);?>
            <BR>
            Segundo apellido(s): <INPUT TYPE="text" NAME="apellido2" SIZE=35 MAXLENGTH=35>
            <BR>
            Nacionalidad: <INPUT TYPE="text" NAME="nacionalidad" SIZE=30 MAXLENGTH=30>
            <BR>
            <INPUT TYPE="submit" CLASS="boton" VALUE="Registrar">
        </FORM>
    </body>
</html>
    </body>
</html>
