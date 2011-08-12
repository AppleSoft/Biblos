<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
      <link rel="stylesheet" type="text/css" href="css/screen.css">   
    </head>
    <body>
        <FORM ACTION="loginP.php" METHOD="post">
            Usuario : <INPUT TYPE="text" NAME="nombre_usuario" SIZE=8 MAXLENGTH=8 /><br><BR>
            Password: <INPUT TYPE="password" NAME="password" SIZE=8 MAXLENGTH=8 /><BR><BR>

            <input type="submit" value="Entrar" />
            <input type="reset" value="Borrar" />
             <?php 
                if (isset($_GET['error'])) echo $_GET['error']; 
            ?>
        </form>
            </body>
</html>