<?php require_once "../dependencias.php" ?> <!-- ESTO ES PARA ACCINAR VALIDACIONES JS Y ESTILOS CSS BOOTSTRAP -->
<?php require_once "menu.php" ?><!-- MENU VAR-->

<?php
// LEER DE BASE DE DATOS
    require_once "../conexion.php";
    $sql_leer = 'SELECT e.id_entrada FROM entrada e, fecha f where e.id_entrada=f.id_entrada'; // LEER EL MAX ID 
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetchAll(); // ARRAY QUE TRAE LA CONSULTA SQL
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
                 <H1 class="alinearCentro"></H1>MODIFICA ENTRADA</H1>
                 <hr width="50%">
                 <form id="frmReg" name="frmReg">   <!-- FORMULARIOOOOOOOOOOOOOOOOOOO -->
                    <div class="row">
                    <div class="col-25">
                        <label for="fname">ID Entrada</label>
                      </div>
                      
                      <div class="col-75">
                      <a href="#" class="btn-precio" id="consultar">Consultar</a>
                      <SELECT NAME="idEntrada" id="idEntrada" SIZE="1" class="seleccion"> 
                      <option value="0">Seleccione:</option>
                      <?php foreach($resultado as $g):?>
                      <option value="<?php echo $g['id_entrada']?>"><?php echo $g['id_entrada']?></option>
                      <?php endforeach ?> 
                      
                      </SELECT>
                      </div>
                      <div>
          
                      </div>
                      <div class="col-25">
                        <label for="fname">ID Producto</label>
                      </div>
                      <script language='javaScript' type="text/javascript">
                        $(document).ready(function(){
                        $('#idEntrada').click(function(){
                        var id=document.getElementById('idEntrada').value;
                        console.log(id);
                        //window.location='modificaRegistro.php';
                        /*if(id == x){
                          location.reload();
                          console.log(id);
                        }*/
                        
                        datos=id;
                        $.ajax({
                        type:"POST",
                        data:datos,
                        url:"../procesos/consultaEntrada.php",
                      });
                      });
                      });
                      </script>
<?php
// LEER DE BASE DE DATOS
    require_once "../conexion.php";
    $var="<script>document.getElementById('idEntrada').value</script>";
    $var1 = 'prueba';
    $sql_leer = 'SELECT O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar FROM fecha C, entrada O WHERE C.id_entrada = O.id_entrada and O.id_entrada=?'; // LEER EL MAX ID 
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute(array($var));
    $resultado1 = $gsent->fetchAll(); // ARRAY QUE TRAE LA CONSULTA SQL
    echo $var;
    foreach ($resultado1 as $sa):
    printf($sa['id_producto']);
    endforeach
?>
                      <div class="col-75">
                        <?php 
                        require_once "../procesos/consultaEntrada.php";
                        foreach($resultado2 as $g):?>
                        <input type="text" class="buscar mayusculas" value="<?php echo $g['id_producto']?>" id="idProducto" name="idProductoooooooooo" placeholder="H135" maxlength="10"> <!-- CLASS BUSCAR VALIDA SOLO NUMEROS Y LETRAS -->
                        <?php endforeach?>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Descripcion</label>
                      </div>
                      <div class="col-75">
                      <?php foreach($resultado1 as $g):?>
                        <!--<input type="text" class="mayusculas" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" onkeypress="return validar(event)" maxlength="100">--> <!-- ONKEYPRESS VALIDA SOLO LETRAS -->
                        <input type="text" class="mayusculas buscar" id="descripcion" value="<?php echo $g['descripcion']?>" name="descripcion" placeholder="Harina Pan 1k 20un" maxlength="100">
                        <?php endforeach?>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="lname">Fecha compra</label>
                        </div>
                        <div class="col-75">
                        <!--<input type="text" class="mayusculas" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" onkeypress="return validar(event)" maxlength="100">--> <!-- ONKEYPRESS VALIDA SOLO LETRAS -->
                        <input type="text" class="mayusculas buscar" id="fecha" value="<?php echo $g['fecha']?>" name="fecha" placeholder="24/04/1994" maxlength="100">
                      </div>
                      <div class="col-25">
                          <label for="lname">Fecha compra</label>
                        </div>
                        <div class="col-75">
                            <SELECT NAME="dia" id="dia" SIZE="1" class="seleccion"> 
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
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Costo UN en BS</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="costoBS" name="costoBS" value="<?php echo $g['costo']?>" placeholder="850000" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-25">
                          <label for="lname">Precio del Dolar</label>
                        </div>
                        <div class="col-75">
                          
                          <input type="text" id="precioDolar" name="precioDolar" value="<?php echo $g['precioDolar']?>" placeholder="200000" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" />
                        </div>
                      </div>
                      <hr>
                          <div class="botonCentro"> <!-- CLASE DE CSS -->
                          <!--<button type="submit" class="btn-precio" id="registrarE" value="incluir" >Registrar</button>-->
                          <a href="#" class="btn-precio" id="registrarE" >Modificar</a>
                          <!-- <a type="submit" class="btn-precio" id="registrarE" value="incluir" onclick="incluir()">Registrar</a> -->
                          <a href="#" class="btn-precio" id="limpiarForm">limpiar</a>  <!--  USO DE JAVASCRIPT PARA LIMPIAR FORM -->
                          <!--<button type="reset" class="btn-precio" id="limpiarForm" onclick="limpiar()">Limpiar</button>-->
                          <!--<a href="reporte.php" class="btn-precio" >IrRegistro</a>-->
                          <!--<a href="#" class="btn-precio" onclick="incluir()" >IrRegistro</a>-->
                          
                          </div>
                  </form>
                  
    </SECtion>
    
    
</body>
</html>