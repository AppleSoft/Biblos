<?php

function controlSesion() {
    if (!isset($_SESSION['logeado'])
            || $_SESSION['logeado'] != true) {
        header('Location: ../index.php');
        exit;
    } else {
        
    }
}

function controlAdmin() {
    $tipousuario = $_SESSION['tipousuario'];
    if ($tipousuario != 0) {
        echo "<script type='text/javascript'>
        window.alert('ahi listillo! tienes que ser administrador para poder modificar la base de datos!')
        </script>";
        header("Refresh: 2; URL=menuG.php");
        exit;
    }
}

function eligeplantilla() {
    $css = trim($_SESSION['css']);
    echo "<link rel='shortcut icon' type='image/x-icon' href='../imgs/favicon.ico'  />";
    echo "<link rel='stylesheet' type='text/css' href='../css/consulta" . $css . ".css' />";
    echo "<script src='../js/funciones.js' type='text/javascript'></script>";
}

function rellenarCampos($ftabla, $orden) {
    $query = "SELECT * FROM $ftabla ORDER BY $orden";
    $result = mysql_query($query);
    $contcol = mysql_num_fields($result);
    echo "<SELECT NAME='$ftabla'>";
    while ($col = mysql_fetch_row($result)) {
        echo "<OPTION VALUE='$col[0]'>";
        for ($i = 1; $i < $contcol; $i++) {
            echo $col[$i] . " ";
        }
        echo "(" . $col[0] . ")</OPTION>\n";
    }
    echo "</SELECT>";
}

function calcularDewey($id_categoria, $id_autor, $titulo) {
    $q1 = "SELECT apellido1 FROM autor where id_autor=$id_autor";
    $rt1 = mysql_query($q1);
    $r1 = mysql_fetch_row($rt1);
    $rf1 = $r1[0];
    $rf1 = substr($rf1, 0, 3);
    $rf2 = substr($titulo, 0, 3);
    $dewey = strtoupper($id_categoria . $rf1 . $rf2);
    return $dewey;
}

function conexion() {
    $server = "localhost";
    $usr = "phpusr";
    $pwd = "phppwd";
    $db = "biblos_g2";

    $conecta = mysql_connect($server, $usr, $pwd);
    if (!$conecta)
        echo "Error conectando a la base de datos.";
    $datos = mysql_select_db($db, $conecta);
    if (!$datos)
        echo "Error seleccionando la base de datos.";
}

function buscarCampo($nombre_campo, $tabla, $nombre_criterio, $criterio) {
    $query = "SELECT $nombre_campo FROM $tabla WHERE $nombre_criterio='$criterio'";
    $existe = mysql_query($query);
    $carga = mysql_fetch_row($existe);
    $campo = $carga[0];
    return $campo;
}

function extraeCampo2($scampo, $fcampo, $nombre_campo1, $criterio1, $nombre_campo2, $criterio2) {
    $query = "SELECT $scampo FROM $fcampo WHERE $nombre_campo1='$criterio1' and $nombre_campo2='$criterio2'";
    $existe = mysql_query($query);
    $carga = mysql_fetch_row($existe);
    $resultado = $carga[0];
    return $resultado;
}

function controlQuery($nombreVariable, $mensajeOK, $mensajeKO, $refresh, $paginaRetornoOK, $paginaRetornoKO) {
    if ($nombreVariable) {
        echo "$mensajeOK";
        echo "<br>Seras redireccionado en $refresh segundos...";
        header("refresh:$refresh; url=$paginaRetornoOK");
    } else {
        echo "$mensajeKO";
        echo "<br>Seras redireccionado en $refresh segundos...";
        header("refresh:$refresh; url=$paginaRetornoKO");
    }
    
}

function qrlink($nombrelibro, $ididioma) {
    $nombrelibro = trim($nombrelibro);
    $nombrelibbus = str_replace(" ", "_", $nombrelibro);
    $linkdata = "http://" . $ididioma . ".wikipedia.org/wiki/" . $nombrelibbus;
    return $linkdata;
}

function qrgen($linkdata) {
    include "../phpqrcode/qrlib.php";
    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
    $errorCorrectionLevel = 'H';
    $matrixPointSize = '2';

    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $filename = $PNG_TEMP_DIR . 'test.png';

    QRcode::png($linkdata, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    echo "<a href='$linkdata'><img src='" . $PNG_WEB_DIR . basename($filename) . "' /></a>";
}

function layoutFormUsuario($action, $method, $nombreBoton, $pool, $total_campos, $pagina, $total_paginas) {
    $mipagina = $_SERVER['PHP_SELF'];
    echo "<form action='$action' method='$method' name='datos_usuario'>\n";
    echo "<table>";
    while ($row = mysql_fetch_array($pool)) {
        echo "<tr><td>DNI:</td><td><input type='text' name='dni' value='$row[0]'></td></tr>\n";
        echo "<tr><td>Clave:</td><td><input type='password' name='clave' value='$row[1]'></td></tr>\n";
        echo "<tr><td>Nombre usuario:</td><td><input type='text' name='nombre_usuario' value='$row[2]'></td></tr>\n";
        echo "<tr><td>Apellido 1:</td><td><input type='text' name='apellido1_usuario' value='$row[3]'></td></tr>\n";
        echo "<tr><td>Apellido 2:</td><td><input type='text' name='apellido2_usuario' value='$row[4]'></td></tr>\n";
        echo "<tr><td>E-Mail:</td><td><input type='text' name='email' value='$row[5]'></td></tr>\n";
        echo "<tr><td>Telefono:</td><td><input type='text' name='telefono' value='$row[6]'></td></tr>\n";
        echo "<tr><td>Direccion:</td><td><input type='text' name='Direccion' value='$row[7]'></td></tr>\n";
        echo "<tr><td>Plantilla:</td><td><input type='textarea' name='plantilla' value='$row[8]'></td></tr>\n";
        echo "<tr><td>Tipo usuario:</td><td><input type='text' name='tipo_usuario' value='" . buscarCampo('tipo_usuario', 'tipos_usuario', 'id_tipo_usuario', $row[9]) . "'></td></tr>\n";
    }

    echo "<tr><td colspan='2'>Hay $total_campos usuarios en la base de datos</td></tr>\n";
    echo "<tr><td colspan='2'>";
    if ($pagina != 1) {
        echo "<a href=$mipagina?pagina=1><< Primera</a>&nbsp;&nbsp;&nbsp;";
        $ant_pagina = $pagina - 1;
        echo "&nbsp;<a href=$mipagina?pagina=$ant_pagina><<</a>&nbsp;";
    }
    if ($pagina == $total_paginas) {
        $to = $total_paginas;
    } elseif ($pagina == $total_paginas - 1) {
        $to = $pagina + 1;
    } elseif ($pagina == $total_paginas - 2) {
        $to = $pagina + 2;
    } else {
        $to = $pagina + 3;
    }
    if ($pagina == 1 || $pagina == 2 || $pagina == 3) {
        $from = 1;
    } else {
        $from = $pagina - 3;
    }

    for ($i = $from; $i <= $to; $i++) {
        if ($i == $total_paginas)
            $to = $total_paginas;
        if ($i != $pagina) {
            echo "<a href=$mipagina?pagina=$i>$i</a>";
        } else {
            echo "<b>[$i]</b>";
        }
        if ($i != $total_paginas)
            echo "&nbsp;";
    }
    if ($pagina != $total_paginas) {
        $sig_pagina = $pagina + 1;
        echo "&nbsp;<a href=$mipagina?pagina=$sig_pagina>>></a>&nbsp;";
        echo "&nbsp;&nbsp;&nbsp;<a href=$mipagina?pagina=$total_paginas>ultima >></a>";
    }
    echo "</td></tr>";
    echo "<tr><td colspan='2'><input type='submit' value='$nombreBoton' /></td></tr>";
    echo "</table>";
    echo "</form>\n";
}

function GeneRandom($digitos=15, $letras=TRUE, $numeros=TRUE) {
    $pool = 'abcdefghijklmnopqrstuvwxyz';
    if ($letras == 1)
        $pool .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($numeros == 1)
        $pool .= '1234567890';

    if ($digitos > 0) {
        $codigo = "";
        $pool = str_split($pool, 1);
        for ($i = 1; $i <= $digitos; $i++) {
            mt_srand((double) microtime() * 1000000);
            $num = mt_rand(1, count($pool));
            $codigo .= $pool[$num - 1];
        }
    }
    return $codigo;
}

function confirmaCorreo($email,$codigo) {

    $to = $email;
    $subject = "Confirma iscripcion a Biblos";
    $body = "El codigo de confirmacion es :$codigo\n Gracias por iscrivirte en Biblos\n BilosQR Team";

    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername('applesoftmt@gmail.com')
            ->setPassword('aquilacontraseña');

    //Creamos el mailer pasándole el transport con la configuración de gmail
    $mailer = Swift_Mailer::newInstance($transport);

    //Creamos el mensaje
    $message = Swift_Message::newInstance($subject)
            ->setFrom(array('applesoft@gmail.com' => 'Administrador Biblos G2'))
            ->setTo($to)
            ->setBody($body);

    $message->setContentType("text/html");

    //Enviamos

    $result = $mailer->send($message);
    
}