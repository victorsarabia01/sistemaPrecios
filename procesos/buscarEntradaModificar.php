<?php
//Archivo de conexión a la base de datos
//require('conexion.php');
include_once "../clases/conexion.php";

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$mensaje1 = "";

//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	$sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and c.id_entrada=o.id_entrada';
	$gsent = $pdo->prepare($sql_leer);
	$gsent->execute(array($consultaBusqueda));
	$resultadof = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
	$idEntradaCon = "";
	foreach ($resultadof as $resultados):
        $idEntradaCon = $resultados['id_entrada'];
        endforeach;

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
    if ($idEntradaCon == "") {
        $mensaje = "<p>No hay ninguna Entrada con ese Numero</p>";
    }
	else{
        foreach ($resultadof as $resultados):
        $idProducto = $resultados['id_producto'];
        $descripcion = $resultados['descripcion'];
        $fecha = $resultados['fecha'];
        $costo = $resultados['costo'];
        $precioDolar = $resultados['precioDolar'];
		$fecha = $resultados['fecha'];
        endforeach;
        //Output
        $fechaD = date('d',strtotime($fecha));
        $fechaM = date('m',strtotime($fecha));
        $fechaA = date('Y',strtotime($fecha));
        $mensaje .= '';
        //Output
        //$mensaje1=$nombre; 
        $mensaje1 .= '

        <?php if('.$fechaD.'== 01){

        }?>

        <form id="frmReg" name="frmReg" method="post">   <!-- FORMULARIOOOOOOOOOOOOOOOOOOO -->
        <div class="row">
        <div class="col-25">
        <label for="fname">ID Producto</label>
        </div>
        <div class="col-75">
        <input type="text" class="buscar mayusculas" value="'.$idProducto.'" id="idProducto" name="idProducto" placeholder="H135" maxlength="10"> <!-- CLASS BUSCAR VALIDA SOLO NUMEROS Y LETRAS -->
        </div>
        </div>
        <div class="row">
        <div class="col-25">
        <label for="lname">Descripcion</label>
        </div>
        <div class="col-75">
        <input type="text" class="mayusculas buscar" value="'.$descripcion.'" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" maxlength="100">
        </div>
        </div>
        <div class="row">
                        <div class="col-25">
                          <label for="lname">Fecha compra</label>
                        </div>
                        <div class="col-75">
						<input type="date" name="fechaSelect" id="fechaSelect" class="fechaSelect" value="'.$fecha.'" style="width: 20vw; margin-right: 25vw; text-align: center;">
                            <!--<SELECT NAME="dia" id="dia" SIZE="1" class="seleccion"> 
                            <option value="'.$fechaD.'">'.$fechaD.'</option>
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
                             <option value="'.$fechaM.'">'.$fechaM.'</option>
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
                                <option value="'.$fechaA.'">'.$fechaA.'</option>
                                <OPTION VALUE="2019">2019</OPTION> 
                                <OPTION VALUE="2020">2020</OPTION> 
                                <OPTION VALUE="2021">2021</OPTION> 
                                <OPTION VALUE="2022">2022</OPTION> 
                           
                             </SELECT> -->
                             
                        </div>
                        
                      </div>

                      <div class="row">
                      <div class="col-25">
                      <label for="lname">Costo UND en BS</label>
                      </div>
                      <div class="col-75">
                      <input type="text" id="costoBS" value="'.$costo.'" name="costoBS" placeholder="8.5" maxlength="10" onkeyup= keepNumOrDecimal(this) >
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-25">
                        <label for="lname">Precio del Dolar</label>
                      </div>
                      <div class="col-75">
                     <input type="text" id="precioDolar" value="'.$precioDolar.'" name="precioDolar" placeholder="4.5" maxlength="10" onkeyup= keepNumOrDecimal(this) >
                 
                      </div>
                    </div>

                    <br>
                    <br>

                    <div class="botonCentro"> <!-- CLASE DE CSS -->
                          
                    </div>
                    </form>

     
        
        ';
        
    }

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje, $mensaje1;
?>