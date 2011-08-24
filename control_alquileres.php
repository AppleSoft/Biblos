<?php
$alquilado = buscarCampo('fecha_hora_prestamo', 'usuario_has_libro', 'dni', $dni);
$restituido = buscarCampo('fecha_hora_devolucion_efectiva', 'usuario_has_libro', 'dni', $dni);

        if (!is_null($alquilado) && is_null($restituido)) {
        echo "<br><br><input type='submit' value='Alquila libro'/>";
        echo "</form>";
        }
        else {
            echo "Ya tienes alquilado un libro, devuelvelo si quieres alquilar otro";
            echo "</form>";
        }
?>
