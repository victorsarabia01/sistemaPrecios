<?php require_once "menu.php" ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" />-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>

      <script src="script.js"></script>
      
      <script src="html2pdf.bundle.min.js"></script>
    
    <!-- jQuery library -->
    <script src="jquery-1.7.1.min.js"></script>

    <!-- jsPDF library -->
    <script src="jspdf.min.js"></script>

    <!--<script src="hola.js" ></script>-->
    <title>Document</title>
    <!-- jQuery library -->


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
    
       
</head>



<body>
    <br>
	<?php require_once "muestraPrecioA.php"?>
    
    <form id="modifica">
    <div class="col-25">
    <!--<input type="text" id="precioDolar" name="precioDolar" placeholder="Ingresa Precio Dolar" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />-->
    <input type="text" id="precioDolar" name="precioDolar" placeholder="Ingresa Precio Dolar" maxlength="10" onkeyup = keepNumOrDecimal(this)>
    <br><br>
    </div>

    <br>
    <br>
    <br>
    <br>
    <div id="prueba" class="botonCentro"> <!-- CLASE DE CSS -->
    <a href="#" class="btn-precio" id="modificarPrecioDolarr">Modificar</a>
    
    <a href="#" class="btn-precio" id="consultar" onclick="consultar()">Consultar</a>
    <!--<a href="" class="btn-precio" id="modificarPrecioDolarr" href="javascript:;" onclick="Hola($('#precioDolar').val());" >Modificar</a>-->
    <!--<a href="" class="btn-precio" id="" >Refrescar</a>-->
    <!--<a href="#" class="btn btn-precio" id="modificaP">Modificar</a>-->
    </div>
    <br>
    <!--[CDATA[<a id="btnCrearPdf" class="btn btn-primary" href=""><i class="fa fa-download"></i> Descargar archivo PDF</a>
    <button id="btnCrearPdf" >PDF</button>
    <button id="btnCrearPdf1" href="javascript:genPDF()" >PDF1</button>
    <button id="btnCapturar">Tomar captura</button>-->
    </form>
	<button id="btnCrearPdf" ><img src="pdf.png" height ="55" width="55" /></button>
    <div id="cargaTabla"> </div>

    

  
 
</body>
</html>

<!--<script type="text/javascript">
//Definimos el botón para escuchar su click
const $boton = document.querySelector("#btnCapturar"), // El botón que desencadena
  $objetivo = document.querySelector('#cargaTabla'); // A qué le tomamos la fotocanvas
// Nota: no necesitamos contenedor, pues vamos a descargarla

// Agregar el listener al botón
$boton.addEventListener("click", () => {
  html2canvas($objetivo) // Llamar a html2canvas y pasarle el elemento
    .then(canvas => {
      // Cuando se resuelva la promesa traerá el canvas
      // Crear un elemento <a>
      let enlace = document.createElement('a');
      enlace.download = "Captura de página web - Parzibyte.me.png";
      // Convertir la imagen a Base64
      enlace.href = canvas.toDataURL();
      // Hacer click en él
      enlace.click();
    });
});
</script>


<script type="text/javascript">


    $(document).ready(function(){

        $('#btnCrearPdfd').click(function(){

            var doc = new jsPDF({
                 orientation: 'landscape'
            });
            var elementHTML = $('#cargaTabla').html();
            var specialElementHandlers = {
            '#elementH': function (element, renderer) {
                return true;
            }
            };
            doc.fromHTML(elementHTML, 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });

            // Save the PDF
            doc.save('archivo.pdf');

        });


    });
    
   

</script>-->


<!--<script type="text/javascript">
		$(document).ready(function(){
            
			$('#cargaTabla').load("tabla1.php");

			$('#modificaP').click(function(){
                //$r=1;
                //alertify.success("Categoria agregada con exito :D");
				datos=$('#modifica').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/modificaPrecios.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					//$('#modifica')[0].reset();
                    $('#cargaTabla').load("tabla1.php");
                    console.log('siiii');
					alertify.success("Categoria agregada con exito :D");
				}else{
					alertify.error("No se pudo agregar categoria");
                    console.log('error');
                    $('#cargaTabla').load("tabla1.php");
				}
			}
		});

			});

		});
    </script>-->
    <script>
         $(document).ready(function(){

            $('#cargaTabla').load("tabla1.php");
             
            $('#modificarPrecioDolarr').click(function(){

            var validaText = document.getElementById("precioDolar").value;



            if(validaText === ""){ //ESTE IF ES PARA VALIDAR LA SELECCION FECHA O FORM VACIO
        
            alertify.alert("Debes Llenar el Precio Del Dolar Actual");
            alertify.error("no se pudo Registrar");
            validaText.focus;
            
            return false;
            }
            else  {
                    var a= confirm('¿Desea Modificar los precios?')
                    if(a){
                    console.log('si quiere');
                    var validaText = document.getElementById("precioDolar").value;
                    console.log(validaText);
                    datos=$('#modifica').serialize();
                    $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/modificaPrecios.php",
                    success: function (r) {   
                        if(r==1){
                        alertify.error("No se Pudo Cambiar");  
                        $('#cargaTabla').load("tabla1.php");
                        }
                        else{
                            $('#cargaTabla').load("tabla1.php");
                            alertify.success("Precio Cambiado");  
                        }
                    }
                    });
                    document.getElementById("precioDolar").value="";
                    //window.location='actualizaPrecios.php';
                    //location.reload();
                    }else{
                    console.log('no quiere');
                    alertify.error("No Hubo Cambios");
                    document.getElementById("precioDolar").value="";
                    document.getElementById("precioDolar").focus;
                    }
                  }
            });
            });
            </script>

            <script>
              function consultar(){
                fetch ('http://s3.amazonaws.com/dolartoday/data.json')
                .then(res => res.json())
                .then(data => {
                    console.log(data.USD.transferencia)
                    document.getElementById('precioDolar').value=data.USD.transferencia
                })
              }
            </script>

