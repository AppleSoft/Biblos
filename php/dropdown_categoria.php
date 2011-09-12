<div id="dropdown_filtros">
    <?php
    conexion();
    $query = "SELECT * FROM categoria ORDER BY id_categoria";
    $result = mysql_query($query);
    echo "Introduce busqueda";
    ?>

    <input type="text" value="Introduce categoria" id="categoria_busqueda" onfocus="if(this.value=='Introduce categoria') value='';" onblur="cambiaInput(this.value);"  />
    <br />

    <?php
    echo "Categorias disponibles<br>";
    echo "<select onchange='cambiaInput(this.value)'>";
    echo "<option name='categorias' value=''>Seleciona una opcion</option>";
    while ($row = mysql_fetch_row($result)) {
        echo "<option name='categoria' value='$row[0]'>$row[1]</option>";
    }
    echo "</select>";
    ?>
</div>

<script type="text/javascript">
    function buscaStringaCategoria(stringa) {
        if( !!stringa.extra ) var sValue = stringa.extra[0];
        else var sValue = stringa.seleccionaResultadoCategoria;
    }
    function seleccionaResultadoCategoria(stringa) {
        buscaStringaCategoria(stringa);
    }
            
    function lookupAjax(){
        var oSuggest = $("#categoria_busqueda")[0].autocompleter;
        oSuggest.buscaStringaCategoria();
        return false;
    }
    $("#categoria_busqueda").autocomplete(
    "auto_categoria.php",
    {
        delay:10,
        minChars:1,
        matchSubset:1,
        matchContains:1,
        cacheLength:10,
        onItemSelect:seleccionaResultadoCategoria,
        onbuscaStringa:buscaStringaCategoria,
        autoFill:true
    }
);
</script>