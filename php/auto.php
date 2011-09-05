<?php
session_start();
include "funciones.php";
controlSesion();
conexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Biblos</title>
        <?php eligeplantilla($_SESSION['plantilla']); ?>
    </head>
    
    <body>
        <form onsubmit="return false;" action=""  id="oculto2">
            <p>
                <input type="text" style="width: 200px;" value="Introduce titulo" id="campo_busqueda" class="ac_input" onfocus="if(this.value=='Introduce titulo') value='';" onblur="if(this.value=='') value='Introduce titulo';" />
            </p>
        </form>
        <script type="text/javascript">
            function buscaStringa(stringa) {
                if( !!stringa.extra ) var sValue = stringa.extra[0];
                else var sValue = stringa.seleccionaResultado;
            }
            function seleccionaResultado(stringa) {
                buscaStringa(stringa);
            }
            
            function lookupAjax(){
                var oSuggest = $("#campo_busqueda")[0].autocompleter;
                oSuggest.buscaStringa();
                return false;
            }
            $("#campo_busqueda").autocomplete(
            "autocomplete.php",
            {
                delay:10,
                minChars:1,
                matchSubset:1,
                matchContains:1,
                cacheLength:10,
                onItemSelect:seleccionaResultado,
                onbuscaStringa:buscaStringa,
                autoFill:true
            }
        );
        </script>
    </body>
</html>