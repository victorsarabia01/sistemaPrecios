<?php include_once "../clases/conexion.php"?>
<?php require_once "menu.php" ?>
<?php require_once "../procesos/muestraTab2.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form id="consulta">
    <div  class="col-25">
        <h3>Ordena Por:</h3>
        <SELECT NAME="Colores" SIZE="1"  id="seleccion"> 
           <OPTION VALUE="0" id="0">Selecciona</OPTION>
           <OPTION VALUE="1" id="1">Fecha</OPTION>  
           <OPTION VALUE="2" id="2">IDentrada</OPTION> 
           <OPTION VALUE="3" id="3">IDproducto</OPTION> 
        </SELECT> 
    </div> 
    </form>
    <br><br>
    <br><br> 
    <br>
    <br>
    <?php require_once "tabla.php" ?>
    <!--<script language="javascript" type="text/javascript">
            $('#1').click(function(){
            console.log('fecha');
            window.location="reporteSeleccion.php";
            });
            $('#2').click(function(){
            console.log('entrada');
            window.location="reporteSeleccion1.php";
            });
            $('#3').click(function(){
            console.log('producto');  
            window.location="reporteSeleccion2.php";
            });
    </script>-->

<script>
    $('#seleccion').click(function(){
        console.log('clickkkk');
        var x = document.getElementById('seleccion').value;
        console.log(x);
        var s="";
        if(x==1){
            console.log('fecha');
            window.location="reporteSeleccion.php";
        }
        else if(x==2){
            console.log('entrada');
            window.location="reporteSeleccion1.php";
        }
        else if(x==3){
            console.log('producto');
            window.location="reporteSeleccion2.php";
        }
    });
    
    </script>
    
</body>
</html>