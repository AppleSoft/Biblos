<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenid@ a Biblos - Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" /> 
        <link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico"  />
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="form_general_signup">
            <form action="registroP.php" method="POST" onSubmit="return validacampo(this);" >
                <div id="cabecera">
                    <strong>Biblos</strong> Sign-up </div>
                <div id="user_sign">
                    <input class="campo" name="nombre_usuario" onblur="if (value =='') {value = 'Usuario'}" onfocus="if (value == 'Usuario') {value =''}" type="text" value="Usuario" title="Introduce el nombre usuario que deseas utilizar" /></div>
                <div id="pw_sign">
                    <input class="campo" name="password" onblur="if (value =='') {value = '123456'}" onfocus="if (value == '123456') {value =''}" type="password" value="123456" title="Introduce tu contraseña"/></div>
                <div id="pw2_sign">
                    <input class="campo" name="password2" onblur="if (value =='') {value = '123456'}" onfocus="if (value == '123456') {value =''}" type="password" value="123456" title="Vuelve a introducir contraseña por confirmacion"/></div>
                <div id="email_sign">
                    <input class="campo" name="email" onblur="if (value =='') {value = 'correo@dominio.net'}" onfocus="if (value == 'correo@dominio.net') {value =''}" type="text" value="correo@dominio.net" title="Recuerda introducir una direccion valida ya que se te enviara un codigo de confirmacion"/></div>
                <div id="alinea_signup">
                    <div id="enviar_sign">
                        <input class="signin" name="Submit1" type="submit" value="" /></div>
                </div>
            </form>
        </div>

        <div id="error">
            <?php
            if (isset($_GET['error']))
                echo $_GET['error'];
            ?>
        </div>
    </body>
</html>
