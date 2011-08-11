<?php

$conecta = mysql_connect(nombre_servidor, usuario, password);   //este codigo te conecta a tu SGDB, aqui tendras que poner
$sgdb = mysql_select_db(nombre_base_datos, $conecta);           //los datos de tu servidor: direccion (localhost, se supone)
                                                                //nombre de usuario y contraseña

$query1 = "SELECT campo FROM tabla [WHERE criterio]";           //esta query es de CONSULTA, aqui dices lo que quieres (campo) y de donde (tabla)
$resultado1 = mysql_query($query1);                             //el where es opcional si quieres campos especificos
while ($linea = mysql_fetch_field($resultado1)) {               //sino la query seria "SELECT * FROM tabla" para obtener TODOS los campos de la tabla
    echo $linea[columna0],$linea[columna1],...$linea[columnaN]; //dependiendo de la consulta que hagas, tendras diferentes tipos de resultados
}                                                               //es bastante usual que el resultado sea un array, asique este bucle lo que haria
                                                                //seria lo siguiente: visualizar todas la columnas de cada linea, mientras haya datos (while)
                                                                //echo $linea0[columna0],$linea0[columna1],...$linea0[columnaN];
                                                                //echo $linea1[columna0],$linea1[columna1],...$linea1[columnaN];
                                                                //echo $linea2[columna0],$linea2[columna1],...$linea2[columnaN];
                                                                //echo $lineaN[columna0],$lineaN[columna1],...$lineaN[columnaN];

$query2 ="                                                           
    INSERT INTO tabla 
        (columna1, columna2, columnaN) 
    VALUES 
        (valor_columna1, valor_columna2, valor_columnaN)";
$resultado2=  mysql_query($query2);                             //esta segunda query es de ESCRITURA al database
                                                                //INSERT INTO la tablas a la cual quieres añadir datos 
?><!--                                                          //(en cuales columnas quieres escribir)                                                                                                                           
                                                                //VALUES     
                                                                //(que quieres escribir)
  
  
Esemplo practico de como seria el codigo con la base de dato biblioteca

$conecta = mysql_connect(localhost, usuario, password);
$sgdb = mysql_select_db('biblioteca', $conecta);

$query1 = "SELECT nombre,apellido1 FROM usuario WHERE id_usuario=1";    //carga el nombre y el apellido del usuario numero 1 o
$query1b = "SELECT * FROM usuario";                                     //carga todos los campos de la tabla usuario
$resultado1 = mysql_query($query1);                                     //puedes definir N query y N resultados saldran
$resultado1b = mysql_query($query1b);                                   //utiliz esto en tu favor para no complicarte la vida :)
while ($columna = mysql_fetch_row($resultado1)) {                     //esto en el caso de selecionar solo algunos campos
    echo $columna['nombre'],columna['apellido1'];
}
while ($columna = mysql_fetch_row($resultado1)) {                     //y esto si queremos todos los campos (suponiendo que sean 5 :) (recuerda que esto depende de la query, si es la 1 o la 1b)
    echo $columna['nombre'],columna['apellido1'],columna['apellido2'],columna['nacionalidad'],columna[''fecha_nacimiento'];
}

                                                                        //siendo una query de escritura no hace falta bucle    
                                                                        //solo describe que quieres añadir y donde añadirlo
$query2 ="INSERT INTO usuario (nombre, apellido1, apellido2) VALUES ('Carlos', 'TuPrimerApellido', 'YTuSegundoApellido')";
$resultado2=  mysql_query($query2);                                     // y executa la query

  
DICIONARIO: es FACIL ;)   
  
las principale funciones son estas 4, con las cuales podras hacer mas o menos lo que quieras con tu base de datos
  
mysql_connect   :   parametros-> (server, usuario, contraseña) ->                   Conecta a tu SGDB
mysql_select_db :   parametros-> (nombre de la base de datos, conexion SGDB) ->     Selecionas con cual base dedatos quieres trabajar
mysql_query     :   parametros-> (query que quieres aplicar) ->                     Lee desde o escribe a tu base de datos (depende de CUAL query executaras)
mysql_fetch_row :   parametros-> (resultado de la query) ->                         Recorre el resultado de tu query de CONSULTA
  
  
-->
