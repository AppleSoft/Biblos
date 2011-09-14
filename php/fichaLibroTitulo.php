<?php
controlSesion();

if (isset($_GET['pagina']))
    $pagina = $_GET['pagina'];

if (!isset($pagina)) {
    $pagina = "1";
}
$tipousuario = $_SESSION['tipousuario'];
$quebuscas = $_SESSION['quebuscas'];
$dondebuscas = $_SESSION['filtro'];
$sql = "SELECT * FROM libro WHERE titulo LIKE '%$quebuscas%'";
$query = mysql_query($sql);
$total_libros = mysql_num_rows($query);
$limite = "1";
$total_paginas = ceil($total_libros / $limite);

$offset = ($pagina - 1) * $limite;

$query = "SELECT * FROM libro WHERE titulo LIKE '%$quebuscas%' ORDER BY titulo LIMIT $offset, $limite";
$result = mysql_query($query);
$supertotal = mysql_num_rows($result);

echo "<div id='formulario_libro'>\n";
echo "<form action='#' method='post' name='datos_libro'>\n";
echo "<table>";
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td>Titulo:</td><td><input type='text' name='titulo' title='$row[4]' value='$row[4]'></td></tr>\n";
    echo "<tr><td>Autor:</td><td><input type='text' name='id_autor' value='" . buscarCampo('nombre', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido1', 'autor', 'id_autor', $row[10]) . "&nbsp;" . buscarCampo('apellido2', 'autor', 'id_autor', $row[10]) . "'></td></tr>\n";
    echo "<tr><td>Categoria:</td><td><input type='text' name='id_categoria' value='" . buscarCampo('nombre_categoria', 'categoria', 'id_categoria', $row[0]) . "'></td></tr>\n";
    echo "<tr><td>Idioma:</td><td><input type='text' name='id_idioma_639_1' value='" . buscarCampo('idioma', 'idiomas_639_1', 'id_idioma_639_1', $row[12]) . "'></td></tr>\n";
    echo "<tr><td>ISBN:</td><td><input type='text' name='isbn' value='$row[3]'></td></tr>\n";
    echo "<tr><td>Fecha pub:</td><td><input type='text' name='fecha_publicacion' value='$row[5]'></td></tr>\n";
    echo "<tr><td>Fecha adq:</td><td><input type='text' name='fecha_adquisicion' value='$row[6]'></td></tr>\n";
    echo "<tr><td>Paginas:</td><td><input type='text' name='num_paginas' value='$row[7]'></td></tr>\n";
    echo "<tr><td>Sinopsis:</td><td><input type='textarea' name='sinopsis' title='$row[8]' value='$row[8]'></td></tr>\n";
    echo "<tr><td>Edicion:</td><td><input type='text' name='edicion' value='$row[9]'></td></tr>\n";
    echo "<tr><td>Editor:</td><td><input type='text' name='id_editorial' value='" . buscarCampo('nombre_editorial', 'editorial', 'id_editorial', $row[11]) . "'></td></tr>\n";
    $fecha = date("Y/m/d-H:i:s");
    echo "<tr><td colspan='2'><input type='hidden' name='usuario_dni' value='" . buscarCampo('dni', 'usuario', 'nombre_usuario', $usuario) . "'></td></tr>\n"; //usuario ->dni
    echo "<tr><td colspan='2'><input type='hidden' name='libro_categoria_id_categoria' value='$row[0]'></td></tr>\n"; //categoria -> id_categoria 
    echo "<tr><td colspan='2'><input type='hidden' name='libro_cod_apellido' value='$row[1]'></td></tr>\n"; //libro -> cod_apellido
    echo "<tr><td colspan='2'><input type='hidden' name='libro_cod_titulo' value='$row[2]'></td></tr>\n"; //libro -> cod_titulo
    echo "<tr><td colspan='2'><input type='hidden' name='fecha_hora_prestamo' value='$fecha'></td></tr>\n"; //fecha y hora date("Ymd") date("H:i:s")

    $_SESSION['cat'] = $row[0];
    $_SESSION['ape'] = $row[1];
    $_SESSION['tit'] = $row[2];
}

echo "<tr><td colspan='2'>Hay <b>$total_libros</b> libros en la biblioteca cuyo <b>$dondebuscas</b> contenga <b>$quebuscas</b></td></tr>\n";

echo "<tr><td colspan='2'>";
if ($pagina != 1) {
    echo "<a href=$mipagina?pagina=1><< Primera</a>&nbsp;&nbsp;&nbsp;";
    $ant_pagina = $pagina - 1;
    echo "&nbsp;<a href=$mipagina?pagina=$ant_pagina><<</a>&nbsp;";
}
if ($pagina == $total_libros) {
    $to = $total_libros;
} elseif ($pagina == $total_libros - 1) {
    $to = $pagina + 1;
} elseif ($pagina == $total_libros - 2) {
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
    if ($i == $total_libros)
        $to = $total_libros;
    if ($i != $pagina) {
        echo "<a href=$mipagina?pagina=$i>$i</a>";
    } else {
        echo "<b>[$i]</b>";
    }
    if ($i != $total_libros)
        echo "&nbsp;";
}
if ($pagina != $total_libros) {
    $sig_pagina = $pagina + 1;
    echo "&nbsp;<a href=$mipagina?pagina=$sig_pagina>>></a>&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;<a href=$mipagina?pagina=$total_libros>ultima >></a>";
}
echo "</td></tr>";
echo "</table>";
echo "</form>\n";
echo "</div>\n";

echo "<div id='qr'>";
$data = qrlink($row[4], $row[12]);
qrgen($data);
echo "</div>";
?>
