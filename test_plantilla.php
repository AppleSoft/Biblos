<!DOCTYPE html>
<html>
    <head>
        <title>anda k no!</title>
        <script type="text/javascript" src="scripts/styleswitcher.js"></script>
        <link rel='stylesheet' type='text/css' href='css/plantilla1.css' />
        <link rel='stylesheet' type='text/css' href='css/plantilla2.css' />
        
        <script language="JavaScript">
            <!--
            function changeSheets(whichSheet){
                whichSheet=whichSheet-1;
                if(document.styleSheets){
                    var c = document.styleSheets.length;
    
                    for(var i=0;i<c;i++){
                        if(i!=whichSheet){
                            document.styleSheets[i].disabled=true;
                        }else{
                            document.styleSheets[i].disabled=false;
                        }
                    }
                }
            }
            //-->
        </script>

    </head>
    <body>

        <a href="JavaScript:changeSheets(1)">plantilla 1</a>
        <a href="JavaScript:changeSheets(2)">plantilla 2</a>

    </body>
</html>
