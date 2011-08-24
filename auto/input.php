<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/consulta.css" />
    <script src="../js/funciones.js" type="text/javascript"></script>
    <script src="../js/jquery.js" type="text/javascript"></script>
</head>

<body>
    <div id="autocompleta">
        <form id="busqueda">
            <div>
                <input type="text" size="30" value="" id="quebuscas" onkeyup="escaneaDB(this.value);" onblur="rellenaNube();" name="quebuscas" />
            </div>
            <div class="Nube" id="coincidencias" style="display: none;">
                <img src="../imgs/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                <div class="listaCoincidencias" id="listaCoincidenciasGenerada">
                    &nbsp;
                </div>
            </div>
        </form>
    </div>
</body>
</html>
