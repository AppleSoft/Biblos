<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenid@ a Biblos - Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" /> 
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body oncontextmenu="return false;">
        <FORM ACTION="php/loginP.php" METHOD="post" onSubmit="return validacampo(this);" >
            <div id="usr">Usuario : <INPUT TYPE="text" NAME="nombre_usuario" SIZE=8 MAXLENGTH=8 autocomplete="off" onKeyPress="return solonumero(this,event);"/></div>
            <div id="pwd">Password: <INPUT TYPE="password" NAME="password" SIZE=8 MAXLENGTH=8 autocomplete="off" /></div>
            <input type="submit" id="login" value="Login" />
            <input type="reset" id="reset" value="Reset" />
            <?php
            if (isset($_GET['error']))
                echo $_GET['error'];
            ?>
        </form>
    </body>



</html>