
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 

<html> 
    <head> 
        <title>Cambiar el valor por input</title> 
        <script> 
            function cambiaInput(valor){
                document.miFormulario.campo1.defaultValue = valor
            }
        </script> 
    </head> 

    <body> 
        <form name="miFormulario"> 
            <input type="Text" name="campo1" value=""> 
            <br> 
            <select name="drop1" id="dropdown1" onchange="cambiaInput(this.value)">
                <option value="">Elige una opcion</option>
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
            </select>

        </form> 
    </body> 
</html> 
