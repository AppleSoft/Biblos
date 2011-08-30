<div id="dropdown_filtros">
    <?php
    include "defcon.php";
    $query = "SELECT * FROM autor ORDER BY apellido1";
    $result = mysql_query($query);
    echo "Introduce busqueda";
    ?>

    <input type="text" value="Introduce autor" id="autor_busqueda" class="ac_input" onfocus="if(this.value=='Introduce autor') value='';" onblur="cambiaInput(this.value);"  />
    <br />

    <?php
    echo "Autores disponibles<br>";
    echo "<select onchange='cambiaInput(this.value)'>";
    echo "<option name='autor' value=''>Seleciona una opcion</option>";
    while ($row = mysql_fetch_row($result)) {
        echo "<option name='autor' value='$row[1] $row[2] $row[3]'>$row[1] $row[2] $row[3]</option>";
    }
    echo "</select>";
    ?>
</div>

<script type="text/javascript">
    function buscaStringaAutor(stringa) {
        if( !!stringa.extra ) var sValue = stringa.extra[0];
        else var sValue = stringa.seleccionaResultadoAutor;
    }
    function seleccionaResultadoAutor(stringa) {
        buscaStringaAutor(stringa);
    }
            
    function lookupAjax(){
        var oSuggest = $("#autor_busqueda")[0].autocompleter;
        oSuggest.buscaStringaAutor();
        return false;
    }
    $("#autor_busqueda").autocomplete(
    "auto_autor.php",
    {
        delay:10,
        minChars:1,
        matchSubset:1,
        matchContains:1,
        cacheLength:10,
        onItemSelect:seleccionaResultadoAutor,
        onbuscaStringa:buscaStringaAutor,
        autoFill:true
    }
);
</script>