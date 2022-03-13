 <!-- ESTO ES PARA ACCINAR VALIDACIONES JS Y ESTILOS CSS BOOTSTRAP -->
<?php require_once "menu.php" ?><!-- MENU VAR-->


<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html('<p>Escribir Nº Entrada</p>');
});

function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("../procesos/buscarEntradaModificar.php", {valorBusqueda: textoBusqueda}, function(mensaje,mensaje1) {
            $("#resultadoBusqueda").html(mensaje);
            $("#idProducto").html(mensaje1);
            //html(mennsaje1);
         }); 
     } else { 
        $("#resultadoBusqueda").html('<p>Escribir Nº Entrada</p>');
        };
};
</script>

<script>
    
    // Forzar solo números y puntos decimales
    function keepNumOrDecimal(obj) {
   // Reemplace todos los no numéricos primero, excepto la suma numérica.
  obj.value = obj.value.replace(/[^\d.]/g,"");
   // Debe asegurarse de que el primero sea un número y no.
  obj.value = obj.value.replace(/^\./g,"");
   // Garantizar que solo hay uno. No más.
  obj.value = obj.value.replace(/\.{2,}/g,".");
   // Garantía. Solo aparece una vez, no más de dos veces
  obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
    }
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
                 <H1 id="muestraID" >MODIFICA ENTRADA</H1>
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
                          <!--<a href="#" class="btn-precio" id="modificarR" >Modificar</a>-->
                          <a href="#" class="btn-precio" id="modificarR" >Modificar</a>  
                          <a href="reporteGeneral.php" class="btn-precio" >IrRegistro</a>
                          
                          </div>
                  </form>
    </SECtion>
    


<script type="text/javascript"> // SCRIPT JS PARA VALIDAR FORMULARIO VACIO
            
            $(document).ready(function(){
             
            $('#modificarR').click(function(){
              var valida = document.getElementById("busqueda").value;
              //console.log(f);
              //vacios=validarFormVacio('frmReg'); // FUNCION ESTABLECIDA EN EL SCRIPT.JS

             

              if(valida == 1 || valida == ""){
                console.log("no selecciono");
                alertify.error("Escribe Una Entrada");

              }
              else if(valida!="" || valida!=1){
              
              var p = document.getElementById("idProducto").value;
              var d = document.getElementById("descripcion").value;
              var c = document.getElementById("costoBS").value;
              var pd = document.getElementById("precioDolar").value;

              /*var validaDia = document.getElementById("dia").value;
              var validaMes = document.getElementById("mes").value;
              var validaAno = document.getElementById("ano").value;*/
              var validafecha = document.getElementById("fechaSelect").value; 
			  console.log(validafecha);
              console.log(p);

              if(p=="" || d == "" || c == "" || pd == ""){
                alertify.alert("Debes Llenar los Campos");
                alertify.error("no se pudo Modificar");
              }
              else{

                  //var f= document.getElementById("idEntradaCon").value;
              //console.log(f);
              var a= confirm('¿Desea Modificar La entrada?'+"  "+valida)
              if(a){
                    //console.log("modificacion");
                    //var x = document.getElementById("idProducto").value;
                    //console.log(x);
                    //console.log(valida);
                    datos=$('#frmReg').serialize();
                    $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/modificarEntrada.php",
                    });
                    //window.location='eliminaRegistro1.php';
                    alertify.success("Entrada Modificada");
                    //alertify.error("no se pudo Registrar");
                   // window.setTimeout(alertify.error("Entrada Eliminada"), 3000);
                   //location.reload();
                    
              }
           
            else  {
					alertify.error("Entrada No Modificada");
                    console.log('no quiso');
                    console.log(valida);
                    //location.reload();
                  }

              }

              }
            
            });
            });
            </script>



</body>
</html>