function escaneaDB(quebuscas) {
    if(quebuscas.length == 0) {
        $('#coincidencias').hide();
    } else {
        $.post("rpc.php", {
            queryString: ""+quebuscas+""
        }, function(data){
            if(data.length >0) {
                $('#coincidencias').show();
                $('#listaCoincidenciasGenerada').html(data);
            }
        });
    }
} 

function rellenaNube(thisValue) {
    $('#quescribe').val(thisValue);
    setTimeout("$('#coincidencias').hide();", 200);
}

function cambiaInput(valor){
    document.formulario_consulta.quebuscas.defaultValue = valor
}

function grafica_filtro(valor) {
    if(document.getElementById) {
        var div1 = document.getElementById('oculto').style;
        var div2 =document.getElementById('oculto2').style;
        div1.display=valor;
        div2.display='none';
        return true;
    }
    return false;
}

function grafica_filtro2(valor) {
    if(document.getElementById) {
        var div1 = document.getElementById('oculto2').style;
        var div2 = document.getElementById('oculto').style;
        div1.display=valor;
        div2.display='none';
return true;
    }
    return false;
}

function grafica_filtro_autor(valor) {
    if(document.getElementById) {
        var div1 = document.getElementById('oculto_autor').style;
        var div2 = document.getElementById('oculto_titulo').style;
        var div3 = document.getElementById('oculto_categoria').style;
        div1.display=valor;
        div2.display='none';
        div3.display='none';
        return true;
    }
    return false;
}

function grafica_filtro_titulo(valor) {
    if(document.getElementById) {
        var div1 = document.getElementById('oculto_autor').style;
        var div2 = document.getElementById('oculto_titulo').style;
        var div3 = document.getElementById('oculto_categoria').style;
        div2.display=valor;
        div1.display='none';
        div3.display='none';
        return true;
    }
    return false;
}

function grafica_filtro_categoria(valor) {
    if(document.getElementById) {
        var div3 = document.getElementById('oculto_categoria').style;
        div3.display=valor;
        div1.display='none';
        div2.display='none';
        return true;
    }
    return false;
}

function esconde_div() {
    grafica_filtro('none');
    grafica_filtro2('none');
    grafica_filtro_autor('none');
    grafica_filtro_titulo('none');
    grafica_filtro_categoria('none');
}

function esconde_filtros() {
    grafica_filtro('none');
    grafica_filtro2('none');
}

function funciona (){
    window.alert('hola');
}