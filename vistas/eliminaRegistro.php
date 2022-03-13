 <!-- ESTO ES PARA ACCINAR VALIDACIONES JS Y ESTILOS CSS BOOTSTRAP -->
<?php require_once "menu.php" ?><!-- MENU VAR-->
<?php require_once "iconosRedesSociales.php" ?>
<?php
// LEER DE BASE DE DATOS
    require_once "../clases/conexion.php";
    $sql_leer = 'SELECT e.id_entrada, e.id_producto FROM entrada e, fecha f where e.id_entrada=f.id_entrada'; // LEER EL MAX ID 
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetchAll(); // ARRAY QUE TRAE LA CONSULTA SQL
    
$buscarId=1;
$sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and c.id_entrada=o.id_entrada';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute(array($buscarId));
$resultadof = $gsent->fetchAll(); //  ARRAY QUE TRAE LA CONSULTA SQL
$buscarId=1;
?>

<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html('<p>Escribir Nº Entrada</p>');
});

function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("../procesos/buscarEntrada.php", {valorBusqueda: textoBusqueda}, function(mensaje,mensaje1) {
            $("#resultadoBusqueda").html(mensaje);
            $("#idProducto").html(mensaje1);
            //html(mennsaje1);
         }); 
     } else { 
        $("#resultadoBusqueda").html('<p>Escribir Nº Entrada</p>');
        };
};
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section class="titulo">
        <h1><center>BODEGON FrutiCarnes EL GOCHO</center></h1><!-- ETIQUETAS DE TITULO Y CENTRAR -->
        
    </section>
    
    <SECtion class="container flexi tcenter">
        <hr width="80%"> <!-- ETIQUETA SEPARADORA -->
        <div class="colum">
                 <H1 id="muestraID" >ELIMINA ENTRADA</H1>
                 <hr width="50%">
                 <form id="frmReg" name="frmReg" method="post">   <!-- FORMULARIOOOOOOOOOOOOOOOOOOO -->
                    <div class="row">

                      <div class="col-25">
                        <label for="fname">ID Entrada</label>
                      </div>
                      <div class="col-75">
                      <input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
                      
                      </div>
                      <div id="resultadoBusqueda"></div>
                          <div class="botonCentro"> <!-- CLASE DE CSS -->
                          <a href="#" class="btn-precio" id="eliminarR" >Eliminar</a>
                          <a href="reporteGeneral.php" class="btn-precio" >IrRegistro</a>
                          
                          </div>
                  </form>
                  
    </SECtion>
    


<script type="text/javascript"> // SCRIPT JS PARA VALIDAR FORMULARIO VACIO
            
            $(document).ready(function(){
              var validar = "";
            if(validar=document.getElementById("busqueda").value == ""){
              console.log ('holaaa');
            }
            $('#eliminarR').click(function(){
              var valida = document.getElementById("busqueda").value;
              //console.log(f);
              if(valida == 1 || valida == ""){
                console.log("no selecciono");
                alertify.error("Selecciona Una Entrada");

              }
              else{
              //var f= document.getElementById("idEntradaCon").value;
              //console.log(f);
              var a= confirm('¿Desea Eliminar La entrada?'+"  "+valida)
              if(a && valida !=1){
                    console.log("eliminacion");
                    //console.log(valida);
                    datos=$('#frmReg').serialize();
                    $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/eliminarEntrada.php",
                    });
                    //window.location='eliminaRegistro1.php';
                    alertify.success("Entrada Eliminada");
                    //alertify.error("no se pudo Registrar");
                    //window.setTimeout(alertify.error("Entrada Eliminada"), 3000);
                    //location.reload();
                    
              }
           
            else  {
                    console.log('no quiso');
					alertify.error("No se elimino");
                    console.log(valida);
                    //location.reload();
                  }
                }
            });
            });
            </script>



</body>
</html>