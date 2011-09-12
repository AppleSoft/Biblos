<div id="dropdown_filtros">
    <?php
    conexion();
    $query = "SELECT * FROM libro ORDER BY titulo";
    $result = mysql_query($query);
    echo "Introduce busqueda";
    ?>
    <input type="text" value="Introduce titulo" id="titulo_busqueda" onfocus="if(this.value=='Introduce titulo') value='';" onblur="cambiaInput(this.value);"  />
    <br />
    <?php
    echo "Titulos disponibles<br>";
    echo "<select onchange='cambiaInput(this.value)'>";
    echo "<option name='titulos' value=''>Seleciona una opcion</option>";
    while ($row = mysql_fetch_row($result)) {
        echo "<option name='titulo' value='$row[4]'>$row[4]</option>";
    }
    echo "</select>";
    ?>
</div>

<script type="text/javascript">
    function buscaStringaTitulo(stringa) {
        if( !!stringa.extra ) var sValue = stringa.extra[0];
        else var sValue = stringa.seleccionaResultadoTitulo;
    }
    function seleccionaResultadoTitulo(stringa) {
        buscaStringaTitulo(stringa);
    }
            
    function lookupAjax(){
        var oSuggest = $("#titulo_busqueda")[0].autocompleter;
        oSuggest.buscaStringaTitulo();
        return false;
    }
    $("#titulo_busqueda").autocomplete(
    "auto_titulo.php",
    {
        delay:10,
        minChars:1,
        matchSubset:1,
        matchContains:1,
        cacheLength:10,
        onItemSelect:seleccionaResultadoTitulo,
        onbuscaStringa:buscaStringaTitulo,
        autoFill:true
    }
);
</script>