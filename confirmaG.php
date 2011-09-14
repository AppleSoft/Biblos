<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenid@ a Biblos - Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" /> 
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="form_general_confirma">
            <form action="confirmaP.php" method="POST" >
                <div id="cabecera">
                    <strong>Biblos</strong> Confirma alta </div>
                <div id="mail_confirma">
                    <input class="input" name="email" onblur="if (value =='') {value = 'E-mail'}" onfocus="if (value == 'E-mail') {value =''}" type="text" value="E-mail" /></div>
                <div id="codigo_confirma">
                    <input class="input" name="codigo" onblur="if (value =='') {value = 'Codigo'}" onfocus="if (value == 'Codigo') {value =''}" type="text" value="Codigo" /></div>
                <div id="alinea">
                    <div id="enviar">
                        <input class="login" name="Submit" type="submit" value="" /></div>
                </div>
                           
                <div id="error">
            <?php
            if (isset($_GET['error']))
                echo $_GET['error'];
            ?>
                </div>
            </form>
        </div>

    </body>

</html>