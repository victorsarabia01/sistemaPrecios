
<?php require_once "menu.php" ?><!-- MENU VAR-->
<?php
// LEER DE BASE DE DATOS
    require_once "../clases/conexion.php";
    $sql_leer = 'SELECT max(id_fecha) from fecha'; // LEER EL MAX ID 
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetch(); // ARRAY QUE TRAE LA CONSULTA SQL

    foreach ($resultado as $key ) {
      
      $consultaMax = $key;
    }
    $id_entrada = $consultaMax + 1; // GENERADOR DE CODIGO
?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script>



function format(input)
{
var num = input.value.replace(/\,/g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\,?)(\d{3})/g,'$1,');
num = num.split('').reverse().join('').replace(/^[\,]/,'');
input.value = num;
}
  
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\,]*/g,'');
}
}
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

<!--<script>

function format(input)
{
var num = input.value.replace(/\./g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
num = num.split('').reverse().join('').replace(/^[\.]/,'');
input.value = num;
}
  
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\.]*/g,'');
}
}
</script>-->





<!DOCTYPE html>
<html lang="en">
<head>  
    <title>Bodegon</title>
</head>
<body > 
    <section class="titulo">
        <h1><center>BODEGON FrutiCarnes EL GOCHO</center></h1><!-- ETIQUETAS DE TITULO Y CENTRAR -->
        
    </section>

          
    
    <SECtion class="container flexi tcenter">
        <hr width="80%"> <!-- ETIQUETA SEPARADORA -->
        <div>
        <!--<aside class="posiciona">
            <label for="">hola</label>
        </aside>-->

        </div>
        
        <div class="colum">
        
                 <H1 class="alinearCentro">REGISTRO DE ENTRADA [<?php echo $id_entrada?>]</H1>
                 
                 <hr width="50%">
                 
                 <form id="frmReg" name="frmReg">   <!-- FORMULARIOOOOOOOOOOOOOOOOOOO -->
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">ID Producto</label>
                      </div>
                      <div class="col-75">
                        <input type="text" class="buscar mayusculas" id="idProducto" name="idProducto" placeholder="H135" maxlength="10"> <!-- CLASS BUSCAR VALIDA SOLO NUMEROS Y LETRAS -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Descripcion</label>
                      </div>
                      <div class="col-75">
                        <!--<input type="text" class="mayusculas" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" onkeypress="return validar(event)" maxlength="100">--> <!-- ONKEYPRESS VALIDA SOLO LETRAS -->
                        <input type="text" class="mayusculas buscar" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" maxlength="100">
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="lname">Fecha compra</label>
                        </div>
                
                        <div class="col-75">

                          <input type="date" name="fechaSelect" id="fechaSelect" class="fechaSelect" style="width: 20vw; margin-right: 25vw; text-align: center;">
                      
                            <!--<SELECT NAME="dia" id="dia" SIZE="1" class="seleccion"> 
                                <OPTION VALUE="d">Dia</OPTION> 
                                <OPTION VALUE="01">01</OPTION> 
                                <OPTION VALUE="02">02</OPTION> 
                                <OPTION VALUE="03">03</OPTION> 
                                <OPTION VALUE="04">04</OPTION> 
                                <OPTION VALUE="05">05</OPTION> 
                                <OPTION VALUE="06">06</OPTION>
                                <OPTION VALUE="07">07</OPTION> 
                                <OPTION VALUE="08">08</OPTION> 
                                <OPTION VALUE="09">09</OPTION> 
                                <OPTION VALUE="10">10</OPTION> 
                                <OPTION VALUE="11">11</OPTION> 
                                <OPTION VALUE="12">12</OPTION> 
                                <OPTION VALUE="13">13</OPTION>
                                <OPTION VALUE="14">14</OPTION> 
                                <OPTION VALUE="15">15</OPTION> 
                                <OPTION VALUE="16">16</OPTION> 
                                <OPTION VALUE="17">17</OPTION> 
                                <OPTION VALUE="18">18</OPTION> 
                                <OPTION VALUE="19">19</OPTION> 
                                <OPTION VALUE="20">20</OPTION> 
                                <OPTION VALUE="21">21</OPTION> 
                                <OPTION VALUE="22">22</OPTION> 
                                <OPTION VALUE="23">23</OPTION> 
                                <OPTION VALUE="24">24</OPTION> 
                                <OPTION VALUE="25">25</OPTION> 
                                <OPTION VALUE="26">26</OPTION> 
                                <OPTION VALUE="27">27</OPTION> 
                                <OPTION VALUE="28">28</OPTION> 
                                <OPTION VALUE="29">29</OPTION> 
                                <OPTION VALUE="30">30</OPTION> 
                                <OPTION VALUE="31">31</OPTION>   
                             </SELECT>
                             <SELECT NAME="mes" id="mes" SIZE="1" class="seleccion"> 
                                <OPTION VALUE="m">     Mes    </OPTION> 
                                <OPTION VALUE="01">Enero</OPTION> 
                                <OPTION VALUE="02">Febreo</OPTION> 
                                <OPTION VALUE="03">Marzo</OPTION> 
                                <OPTION VALUE="04">Abril</OPTION> 
                                <OPTION VALUE="05">Mayo</OPTION> 
                                <OPTION VALUE="06">Junio</OPTION> 
                                <OPTION VALUE="07">Julio</OPTION> 
                                <OPTION VALUE="08">Agosto</OPTION> 
                                <OPTION VALUE="09">Septiembre</OPTION> 
                                <OPTION VALUE="10">Octubre</OPTION> 
                                <OPTION VALUE="11">Noviembre</OPTION> 
                                <OPTION VALUE="12">Diciembre</OPTION> 
                             </SELECT> 
                             <SELECT NAME="ano" SIZE="1" id="ano" class="seleccion"> 
                                <OPTION VALUE="a" class="seleccion1">A&ntilde;o</OPTION> 
                                <OPTION VALUE="2019">2019</OPTION> 
                                <OPTION VALUE="2020">2020</OPTION> 
                                <OPTION VALUE="2021">2021</OPTION> 
                                <OPTION VALUE="2022">2022</OPTION> 
                             </SELECT> 
                        </div>-->
                      </div>
                      <!--<input type="date" name="fecha" id="fechaP">-->
                      <br>
                      <br>
                      <br>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Costo UND en BS</label>
                        </div>
                        <div class="col-75">
                          <!--<input type="text" id="costoBS" name="costoBS" placeholder="85.000" maxlength="10"  onkeyup="format(this)" onchange="format(this)" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" / >-->
                          <input type="text" id="costoBS" name="costoBS" placeholder="85.00" maxlength="10" onkeyup= keepNumOrDecimal(this)>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname" id="consuta" class="consuta" onclick="consularPrecDolar();">Precio del Dolar</label>
                        </div>
                        <div class="col-75">
                          
                          <!--<input type="text" id="precioDolar" name="precioDolar" placeholder="1.780.000" maxlength="10" onkeyup="format(this)" onchange="format(this)" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />-->
                          <input type="text" id="precioDolar" name="precioDolar" placeholder="4.7" maxlength="10" onkeyup= keepNumOrDecimal(this) >
                          
                        </div>
                      </div>
                      <hr>
                      <br>
                          <div class="botonCentro"> <!-- CLASE DE CSS -->
                          <!--<button type="submit" class="btn-precio" id="registrarE" value="incluir" >Registrar</button>-->
                          <a href="registro.php" class="btn-precio" id="registrarE" >Registrar</a>
                          <!-- <a type="submit" class="btn-precio" id="registrarE" value="incluir" onclick="incluir()">Registrar</a> -->
                          <a href="#" class="btn-precio" id="limpiarForm">limpiar</a>  <!--  USO DE JAVASCRIPT PARA LIMPIAR FORM -->
                          <!--<button type="reset" class="btn-precio" id="limpiarForm" onclick="limpiar()">Limpiar</button>-->
                          <a href="reporteGeneral.php" class="btn-precio" >IrRegistro</a>
                          <!--<a href="#" class="btn-precio" onclick="incluir()" >IrRegistro</a>-->
                          
                          </div>
                  </form>
    </SECtion>
      
            <script type="text/javascript">
              $(document).ready(function(){
              $('#prueba').click(function(){
                console.log("hoalaaaaaaaaa");
                      //header("location: index.php");
                      //window.locationf="http://localhost:8080/sistemaPrecios/vistas/modificarRegistro.php";
                      window.location.href = "http://localhost:8080/sistemaPrecios/vistas/modificarRegistro.php";
                      //location.replace('http://localhost:8080/sistemaPrecios/vistas/modificarRegistro.php');
              });
            });
            </script>
			
			<script type="text/javascript">
				
				const consularPrecDolar = () =>{
				let inputValue = document.getElementById("costoBS").value; 
				console.log(inputValue);
				fetch ('http://s3.amazonaws.com/dolartoday/data.json')
                .then(res => res.json())
                .then(data => {
                    console.log(data.USD.transferencia)
                    document.getElementById('precioDolar').value=data.USD.transferencia
                })
			}
			</script>
			
			<script>
              function consultar(){
                
              }
            </script>
            

            <script type="text/javascript" language="javascript"> //SCRIPT JS PARA LIMPIAR 
              $(document).ready(function(){
              $('#limpiarForm').click(function(){
                 //console.log("funciona");
              document.frmReg.idProducto.value="";
              document.frmReg.descripcion.value="";
              document.frmReg.costoBS.value="";
              document.frmReg.precioDolar.value="";
              //document.frmReg.dia.value="d";
              //document.frmReg.mes.value="m";
              //document.frmReg.ano.value="a";
              alertify.success("Limpiado");
              //console.log(document.getElementById('costoBS').value);
              //console.log(document.getElementById('precioDolar').value);
              
              });
              });
            </script>


            <script language="javascript">
           
            $(document).ready(function(){
              $('#idProducto').keyup(function(){
                document.getElementById('idProducto').style.backgroundColor='yellow';
              });
              $('#idProducto').keydown(function(){
                document.getElementById('idProducto').style.backgroundColor='white';
              });
             
              });
            </script>

            <script type="text/javascript"> // SCRIPT JS PARA VALIDAR FORMULARIO VACIO
            $(document).ready(function(){
            document.getElementById("idProducto").focus();
            let a = "";
            $('#registrarE').click(function(){

            vacios=validarFormVacio('frmReg'); // FUNCION ESTABLECIDA EN EL SCRIPT.JS
    
            //let validaDia = document.getElementById("dia").value;
            //var validaMes = document.getElementById("mes").value;
            //var validaAno = document.getElementById("ano").value;
            var validaFecha = document.getElementById("fechaSelect").value;
            //if(vacios > 0 || validaDia === "d" || validaMes === "m" || validaAno === "a")
            console.log(validaFecha);
            if(vacios > 0 || validaFecha === ''){ //ESTE IF ES PARA VALIDAR LA SELECCION FECHA O FORM VACIO
        
            alertify.alert("Debes Llenar los Campos");
            alertify.error("no se pudo Registrar");
            document.getElementById("idProducto").focus();
            return false;
            }
            else  {
          
                    //console.log('pasa la p');
                    datos=$('#frmReg').serialize();
                    $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/registrarEntrada.php",
                    });
                    
                    //hazAlert();
                    //alertify.alert("Registro Exitoso");

                   
                  
                    //header("location: index.php");
                    //location.reload("index.php");
                    //window.locationf="index.php";
                    //window.location.href = "https://professor-falken.com";
                    //location.replace('https://pablomonteserin.com');
                    //window.location='registro.php';
                    //location.reload();
                    //setTimeout(location.reload(),5000);
                    //window.location = location.href;
                    
                    }
                    //alertify.alert("Registro Exitoso");
					alertify.success("Entrada registrada");
					alertify.success("Entrada registrada");
                    alertify.success("Entrada registrada");
                    alert("registro exitoso");
                    alertify.success("Entrada registrada");
                  //setTimeout(location.reload(),5000);
                  //location.reload();
                  /*window.location.href = "http://localhost:8080/sistemaPrecios/vistas/modificarRegistro.php";
                  location.replace('http://localhost:8080/sistemaPrecios/vistas/modificarRegistro.php');

                  a = confirm("¿Desea registrar una entrada?");
                    if (a){
                      console.log("si quiere");
                      a == true;
                      //header("location: index.php");
                      //window.locationf="http://localhost:8080/sistemaPrecios/vistas/modificarRegistro.php";
                      //window.location.href = "http://localhost:8080/sistemaPrecios/vistas/registro.php";
                      //location.replace('http://localhost:8080/sistemaPrecios/vistas/registro.php');
                    }
                    else{
                      console.log("no quiere");
                      a == false;
                      //window.location.href = "http://localhost:8080/sistemaPrecios/vistas/index.php";
                      //location.replace('http://localhost:8080/sistemaPrecios/vistas/index.php');
                    }


                    if (a == true){
                      console.log("funciona");
                    }
                    else if(a == ""){
                      console.log("vacio");
                    }
                    else {
                      console.log("noooo");
                    }*/
              
                  
            });
                    
                   

            });
            </script>

            <script type="text/javascript"> // VALIDAR CAMPOS DE SOLO NUMERO Y LETRAS AL INPUT
                          //jQuery('.soloNumeros').keypress(function (tecla) {
                          //if (tecla.charCode < 48 || tecla.charCode > 57) return false;
                          //});
                          
                          $("input.buscar").bind('keypress', function(event) {
                          var regex = new RegExp("^[a-zA-Z0-9 ]+$");
                          var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                          if (!regex.test(key)) {
                          event.preventDefault();
                          return false;
                          }
                          });
              </script>

                <script type="text/javascript"> // VALIDAR CAMPOS DE SOLO NUMERO Y LETRAS AL INPUT
                          //jQuery('.soloNumeros').keypress(function (tecla) {
                          //if (tecla.charCode < 48 || tecla.charCode > 57) return false;
                          //});
                          
                          $("input.buscar").bind('keypress', function(event) {
                          var regex = new RegExp("^[a-zA-Z0-9 ]+$");
                          var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                          if (!regex.test(key)) {
                          event.preventDefault();
                          return false;
                          }
                          });
              </script>

              
              

              <script type="text/javascript"> //VALIDAR CAMPOS DE SOLO TEXTO AL INPUT
                function validar(e) { // 1
                tecla = (document.all) ? e.keyCode : e.which; // 2
                if (tecla==8) return true; // 3
                patron =/[A-Za-z\s]/; // 4
                te = String.fromCharCode(tecla); // 5
                return patron.test(te); // 6
                }
              </script>

               <script language="javascript">
               function reporte()
               {
                 //document.form1.operacion.value="reporte";
                 //document.form1.submit();

               }
               </script>

          <!--< language="javascript">
          function incluir()
          {
          //document.form1.operacion.value="incluir";
          alertify.alert("incluir entrada");
          //document.form1.submit();
          console.log("si pasa por aqui");

          vacios=validarFormVacio('frmReg'); // FUNCION ESTABLECIDA EN EL SCRIPT.JS
    
                    var validaDia = document.getElementById("dia").value;
                    var validaMes = document.getElementById("mes").value;
                    var validaAno = document.getElementById("ano").value;

                    if(vacios > 0 || validaDia === "d" || validaMes === "m" || validaAno === "a"){ //ESTE IF ES PARA VALIDAR LA SELECCION FECHA O FORM VACIO

                    alertify.alert("Debes Llenar los Campos");
                    alertify.error("no se pudo Registrar");
                    
                    return false;
                    }
                    else{

                    datos=$('#frmReg').serialize();
                    $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/registrarEntrada.php",
                    });
          }
          }
          </>-->
         
          
    

</BODY> 
</html>