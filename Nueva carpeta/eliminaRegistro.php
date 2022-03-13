<?php require_once "../dependencias.php" ?> <!-- ESTO ES PARA ACCINAR VALIDACIONES JS Y ESTILOS CSS BOOTSTRAP -->
<?php require_once "menu.php" ?><!-- MENU VAR-->
<?php
// LEER DE BASE DE DATOS
    require_once "../conexion.php";
    $sql_leer = 'SELECT e.id_entrada, e.id_producto FROM entrada e, fecha f where e.id_entrada=f.id_entrada'; // LEER EL MAX ID 
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetchAll(); // ARRAY QUE TRAE LA CONSULTA SQL
?>

<?php 

//echo "la fecha actual es" . date("d") . " del " . date("m") . " de " . date("Y");
$buscarId=1;
$sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and c.id_entrada=o.id_entrada';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute(array($buscarId));
$resultadof = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
$buscarId=1;
  if(isset($_POST['operacion'])){
    $operacion=$_POST['operacion'];
    $buscarId=$_POST['idEntrada'];
    //$buscarIdx=$_POST['idEntradaa'];
    //$x=$_REQUEST['idEntradaa'];
    //echo "holaaaaaaaaaaaaa";
    //printf('xffffffffff');
  if($operacion=="buscar"  && $buscarId!=0){
    // LEER DE BASE DE DATOS
    
$sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and c.id_entrada=o.id_entrada';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute(array($buscarId));
$resultadof = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
echo "<script> alertify.alert('seleccionaste la entrada No. $buscarId') </script>";
//foreach($resultado1 as $h):
  //echo $h['id_producto'];
//endforeach;

}
else{
  //echo "<script> alert('Mensaje'); </script>";
  echo "<script> alertify.error('Seleccione una entrada'); </script>";
}
}
?>

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
                 <H1 class="alinearCentro">ELIMINA ENTRADA [<?php echo $buscarId?>]</H1>
                 <hr width="50%">
                 <form id="frmReg" name="frmReg" method="post">   <!-- FORMULARIOOOOOOOOOOOOOOOOOOO -->
                    <div class="row">
                    <div>
                      <!--<label for="fname">ID Entradaaaa</label>-->
                      
                      </div>
                      <div class="col-25">
                        <label for="fname">ID Entrada</label>
                        <a href="#" class="btn-precio" id="consultarBD" onclick="buscar()" >Consultar</a>
                      </div>
                      
                      <div class="col-75">
                      <SELECT NAME="idEntrada" id="idEntrada" SIZE="1" class="seleccion"> 
                      <option value="0">Seleccione:</option>
                      <?php foreach($resultado as $g):?>
                      <option value="<?php echo $g['id_entrada']?>"><?php echo $g['id_entrada']?></option>
                      <?php endforeach ?> 
                      </SELECT>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                     
                      
                      </div>

                      <div class="col-25">
                        <label for="fname">ID Entrada</label>
                      </div>
                      <div class="col-75">
                      <input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" />

                        <?php
                        foreach($resultadof as $f):?>
                        <input type="text" class="buscar mayusculas" value="<?php echo $f['id_entrada']?>" name="idEntradaa" id="idEntradaa" placeholder="135" maxlength="10" disabled="disabled"> <!-- CLASS BUSCAR VALIDA SOLO NUMEROS Y LETRAS -->
                        <?php endforeach ?>
                      </div>

                      <div class="col-25">
                        <label for="fname">ID Producto</label>
                      </div>
                      <div class="col-75">
                        <?php
                        foreach($resultadof as $f):?>
                        <input type="text" class="buscar mayusculas" value="<?php echo $f['id_producto']?>" id="idProducto" name="idProducto" placeholder="H135" maxlength="10" disabled="disabled"> <!-- CLASS BUSCAR VALIDA SOLO NUMEROS Y LETRAS -->
                        <?php endforeach ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Descripcion</label>
                      </div>
                      <div class="col-75">
                        <!--<input type="text" class="mayusculas" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" onkeypress="return validar(event)" maxlength="100">--> <!-- ONKEYPRESS VALIDA SOLO LETRAS -->
                        <?php foreach($resultadof as $f):?>
                        <input type="text" class="mayusculas buscar" value="<?php echo $f['descripcion']?>" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" maxlength="100" disabled="disabled">
                        <?php endforeach ?>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="lname">Fecha compra</label>
                        </div>
                        <div class="col-75">
                            <SELECT NAME="dia" id="dia" SIZE="1" class="seleccion" disabled="disabled"> 
                            <option value="<?php $fecha=$f['fecha'];echo date('d',strtotime($fecha));?>"><?php $fecha=$f['fecha'];echo date('d',strtotime($fecha));?></option>
                                <OPTION VALUE="d">Dia</OPTION> 
                                <OPTION VALUE="1">1</OPTION> 
                                <OPTION VALUE="2">2</OPTION> 
                                <OPTION VALUE="3">3</OPTION> 
                                <OPTION VALUE="4">4</OPTION> 
                                <OPTION VALUE="5">5</OPTION> 
                                <OPTION VALUE="6">6</OPTION>
                                <OPTION VALUE="7">7</OPTION> 
                                <OPTION VALUE="8">8</OPTION> 
                                <OPTION VALUE="9">9</OPTION> 
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
                             <SELECT NAME="mes" id="mes" SIZE="1" class="seleccion" disabled="disabled"> 
                             <option value="<?php $fecha=$f['fecha'];echo date('m',strtotime($fecha));?>"><?php $fecha=$f['fecha'];echo date('m',strtotime($fecha));?></option>
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
                             <SELECT NAME="ano" SIZE="1" id="ano" class="seleccion" disabled="disabled"> 
                                <option value="<?php $fecha=$f['fecha'];echo date('Y',strtotime($fecha));?>"><?php $fecha=$f['fecha'];echo date('Y',strtotime($fecha));?></option>
                                <OPTION VALUE="a" class="seleccion1">A&ntilde;o</OPTION> 
                                
                                <OPTION VALUE="2019">2019</OPTION> 
                                <OPTION VALUE="2020">2020</OPTION> 
                                <OPTION VALUE="2021">2021</OPTION> 
                                <OPTION VALUE="2022">2022</OPTION> 
                             </SELECT> 
                             
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Costo UN en BS</label>
                        </div>
                        <div class="col-75">
                        <?php foreach($resultadof as $f):?>
                          <input type="text" id="costoBS" value="<?php echo $f['costo']?>" name="costoBS" placeholder="850000" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" / disabled="disabled">
                        <?php endforeach?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Precio del Dolar</label>
                        </div>
                        <div class="col-75">
                        <?php foreach($resultadof as $f):?>
                          <input type="text" id="precioDolar" value="<?php echo $f['precioDolar']?>" name="precioDolar" placeholder="200000" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" / disabled="disabled">
                        <?php endforeach ?>
                        </div>
                      </div>
                      <hr>
                          <div class="botonCentro"> <!-- CLASE DE CSS -->
                          <input type="hidden" name="operacion" id="operacion" />
                          <!--<button type="submit" class="btn-precio" id="registrarE" value="incluir" >Registrar</button>-->
                          <a href="#" class="btn-precio" id="eliminarR" >Eliminar</a>
                          <!-- <a type="submit" class="btn-precio" id="registrarE" value="incluir" onclick="incluir()">Registrar</a> -->
                          <a href="reporte.php" class="btn-precio" >IrRegistro</a>
                          <!--<button type="reset" class="btn-precio" id="limpiarForm" onclick="limpiar()">Limpiar</button>-->
                          <!--<a href="reporte.php" class="btn-precio" >IrRegistro</a>-->
                          <!--<a href="#" class="btn-precio" onclick="incluir()" >IrRegistro</a>-->
                          </div>
                  </form>
    </SECtion>
    
   <script language="javascript">
   function buscar()
   {
	   document.frmReg.operacion.value="buscar";
	   document.frmReg.submit();
   }
  </script>

<script>
function buscar() {
    var textoBusqueda = $("input#busqueda").val();
	
    if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
        }); 
    } else { 
        ("#resultadoBusqueda").html('');
	};
};
</script>
  


<script type="text/javascript"> // SCRIPT JS PARA VALIDAR FORMULARIO VACIO
            $('#idEntrada').click(function(){
                console.log ("xffffffffffffffffffffff");
                //document.frmReg.idEntrada.value="55";
                var f = document.getElementById("idEntrada").value;
                console.log(f);
                <?php 
                
                $sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and c.id_entrada=o.id_entrada';
                $gsent = $pdo->prepare($sql_leer);
                $gsent->execute(array($buscarId));
                $resultadof = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
                ?>
              });
            $(document).ready(function(){
             
            
            
              
            $('#eliminarR').click(function(){
              var valida = document.getElementById("idEntradaa").value;
              //console.log(f);
              if(valida == 1){
                console.log("no selecciono");
                alertify.error("Selecciona Una Entrada");
                

              }
              else{
              //var f= document.getElementById("idEntradaCon").value;
              //console.log(f);
              var a= confirm('Desea Eliminar La entrada?'+"  "+valida)
              if(a && valida !=1){
                    //console.log("eliminacion");
                    //console.log(valida);
                    datos=$('#frmReg').serialize();
                    $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/eliminaEntrada.php",
                    });
                    //window.location='eliminaRegistro.php';
                    //location.reload();
                    
              }
           
            else  {
                    console.log('no quiso');
                    console.log(valida);
                    //location.reload();
                  }
                }
            });
            });
            </script>



</body>
</html>