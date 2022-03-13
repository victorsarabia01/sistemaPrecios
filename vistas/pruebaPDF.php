<?php require_once "menu.php" ?>

<!DOCTYPE html>
<html>
<head>
	<script src="html2pdf.bundle.min.js"></script>
	<script src="script.js"></script>
	<title>pruebaa</title>
</head>
<body>

	<h1>prueba</h1>
	<button id="btnCrearPdf" >PDF</button>

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
    <br>
    <div class="botonCentro"> <!-- CLASE DE CSS -->
    <a href="#" class="btn-precio" id="modificarPrecioDolarr">Modificar</a>
    
    <a href="#" class="btn-precio" id="consultar" onclick="consultar()">Consultar</a>
    <!--<a href="" class="btn-precio" id="modificarPrecioDolarr" href="javascript:;" onclick="Hola($('#precioDolar').val());" >Modificar</a>-->
    <!--<a href="" class="btn-precio" id="" >Refrescar</a>-->
    <!--<a href="#" class="btn btn-precio" id="modificaP">Modificar</a>-->
    </div>
    <br>
    <a id="btnCrearPdf" class="btn btn-primary" href=""><i class="fa fa-download"></i> Descargar archivo PDF</a>
    <button id="btnCrearPdf" >PDF</button>
    <button id="btnCrearPdf1" href="javascript:genPDF()" >PDF1</button>
    <button id="btnCapturar">Tomar captura</button>
    </form>
  
    <div id="cargaTabla"> </div>

   
</body>
</html>

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