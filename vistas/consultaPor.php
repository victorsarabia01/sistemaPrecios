<?php require_once "menu.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="consulta" method="POST">
    <div  class="col-25">
        <h3>Consulta Por:</h3>
        <SELECT NAME="Colores" SIZE="1" id="seleccion1"> 
           <OPTION VALUE="0" id="0">Selecciona</OPTION>
           <OPTION VALUE="1" id="1">Fecha</OPTION>  
           <OPTION VALUE="2" id="2">IDentrada</OPTION> 
           <OPTION VALUE="3" id="3">IDproducto</OPTION> 
        </SELECT> 
        <div id="muestra"></div>
        <br>
        <input type="text" class="buscar mayusculas" id="idProducto" name="idProducto" placeholder="H135" maxlength="10">
        <!--<input type="text" name="fecha" id="fecha" placeholder="24/04/1994">-->
        <input type="text" id="idEntrada" name="idEntrada" placeholder="123" maxlength="6" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />
        <div id="seleccion" class="row container">
                            <SELECT NAME="dia" id="dia" SIZE="1" class="seleccion"> 
                                <OPTION VALUE="d">Dia</OPTION> 
                                <OPTION VALUE="01">1</OPTION> 
                                <OPTION VALUE="02">2</OPTION> 
                                <OPTION VALUE="03">3</OPTION> 
                                <OPTION VALUE="04">4</OPTION> 
                                <OPTION VALUE="05">5</OPTION> 
                                <OPTION VALUE="06">6</OPTION>
                                <OPTION VALUE="07">7</OPTION> 
                                <OPTION VALUE="08">8</OPTION> 
                                <OPTION VALUE="09">9</OPTION> 
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
                        </div>
        
                    </div> 
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br>
                    <button class="btn-precio" id="consultar">Consultar</button>
                    
</form>
<form id="cargaTablaa"></form>
<?php 
//AGREGAR
if($_POST){
    //echo $_POST['color'];
    require_once "../clases/conexion.php";
    
    $idEntrada=$_POST['idEntrada'];
    $idProducto=$_POST['idProducto'];
    $dia=$_POST['dia'];
    $mes=$_POST['mes'];
    $ano=$_POST['ano'];
    if(!$idEntrada==""){
     // LEER DE BASE DE DATOS
    $sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and C.id_entrada=?';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute(array($idEntrada,$idEntrada));
    $resultado = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
    }else if(!$idProducto==""){
    // LEER DE BASE DE DATOS
    $sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_producto=? and O.id_entrada=C.id_entrada';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute(array($idProducto));
    $resultado = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
    }else if(!$dia=="" && !$mes=="" && !$ano==""){
    $sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE C.fecha=? and O.id_entrada=C.id_entrada';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute(array($ano.'-'.$mes.'-'.$dia));
    $resultado = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
    
    }
    //include_once "tablaConsulta.php";
    include_once "tabla.php";
}
?>
</body>
</html>

<script>
    $('#seleccion1').click(function(){
        console.log('clickkkk');
        var x = document.getElementById('seleccion1').value;
        console.log(x);
        if(x==0){
            console.log('selecciona');
                $('#idEntrada').hide();
                $('#idProducto').hide();
                $('#seleccion').hide();
                $('#consultar').hide();
        }
    
        else if(x==1){
            console.log('fecha');
            var c = true;
            console.log(c);
            if(c){
                $('#idEntrada').hide();
                $('#idProducto').hide();
                $('#seleccion').show();
                $('#consultar').show();
            }else{
                $('#seleccion').hide();
            }
            
        }
        else if(x==2){
            console.log('entrada');
            var c = true;
            if(c){
                $('#idEntrada').show();
                $('#idProducto').hide();
                $('#seleccion').hide();
                $('#consultar').show();
            }else{
                $('#idEntrada').hide();
            }
            
            
        }
        else if(x==3){
            console.log('producto');

            var c = true;
            if(c){
                $('#idEntrada').hide();
                $('#idProducto').show();
                $('#seleccion').hide();
                $('#consultar').show();
            }else{
                $('#idEntrada').hide();
            }
            
        }
    });
    
    </script>

<script language="javascript" type="text/javascript">

            $('#0').click(function(){
            console.log('selecciona');
            var c = true;
            console.log(c);
            if(c){
                $('#idEntrada').hide();
                $('#idProducto').hide();
                $('#seleccion').hide();
                $('#consultar').hide();
            }

            //$('#muestra').load("selecciona.php");
            });
            $('#1').click(function(){
            console.log('fecha');
            var c = true;
            console.log(c);
            if(c){
                $('#idEntrada').hide();
                $('#idProducto').hide();
                $('#seleccion').show();
                $('#consultar').show();
            }else{
                $('#seleccion').hide();
            }
            //$('#muestra').load("inputFecha.php");
            //document.value="fecha";
	        //document.form1.submit();
            //console.log(document.value);
            //$aux=0;
            });
            $('#2').click(function(){
            console.log('entrada');
            var c = true;
            if(c){
                $('#idEntrada').show();
                $('#idProducto').hide();
                $('#seleccion').hide();
                $('#consultar').show();
            }else{
                $('#idEntrada').hide();
            }
            
            //$('#muestra').load("inputIdEntrada.php");
            //$('#cargaTablaa').load("tablaConsulta1.php");
            });

            $('#3').click(function(){
            console.log('producto');  
            var c = true;
            if(c){
                $('#idEntrada').hide();
                $('#idProducto').show();
                $('#seleccion').hide();
                $('#consultar').show();
            }else{
                $('#idEntrada').hide();
            }
            //$('#muestra').load("inputIdProducto.php");
            });
    </script>

<script type="text/javascript" language="javascript"> //SCRIPT JS PARA LIMPIAR 
              $(document).ready(function(){
                $('#idEntrada').hide();
                $('#idProducto').hide();
                $('#seleccion').hide();
                $('#consultar').hide();
                document.getElementById('seleccion1').value='0';
                
              });
            </script>
    <script type="text/javascript"> // VALIDAR CAMPOS DE SOLO NUMERO Y LETRAS AL INPUT
                          $("input.buscar").bind('keypress', function(event) {
                          var regex = new RegExp("^[a-zA-Z0-9 ]+$");
                          var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                          if (!regex.test(key)) {
                          event.preventDefault();
                          return false;
                          }
                          });
              </script>

           
           