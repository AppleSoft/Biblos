<?php
include "php/funciones.php";
include "js/swift_required.php";
conexion();

$email=$_POST['email_to'];
$sql="SELECT clave FROM usuario WHERE email='$email'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$sql2="SELECT nombre_usuario FROM usuario WHERE email='$email'";
$result2=mysql_query($sql2);
$rows2=mysql_fetch_array($result2);
$usuario=$rows2['nombre_usuario'];

if($count==1){
$rows=mysql_fetch_array($result);
$clave=$rows['clave'];
$to=$email; 
$subject="Recuperacion contraseña";
$body="Tu contraseña es:$clave";

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
             ->setUsername('applesoftmt@gmail.com')
             ->setPassword('password');
 
//Creamos el mailer pasándole el transport con la configuración de gmail
$mailer = Swift_Mailer::newInstance($transport);
 
//Creamos el mensaje
$message = Swift_Message::newInstance($subject)

            ->setFrom(array('applesoft@gmail.com' => 'Admin Biblos G2'))

            ->setTo($to)

            ->setBody($body);

$message->setContentType("text/html");
 

//Enviamos

$result = $mailer->send($message);
if ($result) {
    echo "Su contraseña se ha enviado con exito a la direccion: $to";
     header('Refresh: 5, url= index.php');
}
else {
    "ERROR: no ha sido posible eviar su contraseña, contact con el <a href='mailto:applesoftmt@gmail.com'>administrador</a>";
 header('Refresh: 5, url= index.php');
}
}

else {
echo "No hay ninguna cuenta associada a la direccion $email";
 header('Refresh: 5, url= index.php');
}


?>