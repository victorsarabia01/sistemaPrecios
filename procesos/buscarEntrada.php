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
        endforeach;
        //Output
        $fechaD = date('d',strtotime($fecha));
        $fechaM = date('m',strtotime($fecha));
        $fechaA = date('Y',strtotime($fecha));
        $mensaje .= '';
        //Output
        //$mensaje1=$nombre; 
        $mensaje1 .= '

   
        <form id="frmReg" name="frmReg" method="post">   <!-- FORMULARIOOOOOOOOOOOOOOOOOOO -->
        
        <div class="row">
        <div class="col-25">
        <label for="fname">ID Producto</label>
        </div>
        <div class="col-75">
        <input type="text" class="buscar mayusculas" value="'.$idProducto.'" id="idProducto" name="idProducto" placeholder="H135" maxlength="10" disabled="disabled"> <!-- CLASS BUSCAR VALIDA SOLO NUMEROS Y LETRAS -->
        </div>
        </div>
        <div class="row">
        <div class="col-25">
        <label for="lname">Descripcion</label>
        </div>
        <div class="col-75">
        <input type="text" class="mayusculas buscar" value="'.$descripcion.'" id="descripcion" name="descripcion" placeholder="Harina Pan 1k 20un" maxlength="100" disabled="disabled">
        </div>
        </div>
        <div class="row">
                        <div class="col-25">
                          <label for="lname">Fecha compra</label>
                        </div>
                        <div class="col-75">
                            <!--<SELECT NAME="dia" id="dia" SIZE="1" class="seleccion" disabled="disabled"> 
                            <option value="">'.$fechaD.'</option>
                               
                             </SELECT>
                             <SELECT NAME="mes" id="mes" SIZE="1" class="seleccion" disabled="disabled"> 
                             <option value="">'.$fechaM.'</option>
                    
                             </SELECT> 
                             <SELECT NAME="ano" SIZE="1" id="ano" class="seleccion" disabled="disabled"> 
                                <option value="">'.$fechaA.'</option>
                           
                             </SELECT> -->

                             <input type="date" name="fechaSelect" id="fechaSelect" class="fechaSelect" value="'.$fecha.'" disabled="disabled" style="width: 20vw; margin-right: 25vw; text-align: center;">
                             
                        </div>
                        
                      </div>

                      <div class="row">
                      <div class="col-25">
                      <label for="lname">Costo UND en BS</label>
                      </div>
                      <div class="col-75">
                      <input type="text" id="costoBS" value="'.number_format($costo, 2, '.', ',').'" name="costoBS" placeholder="850000" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" / disabled="disabled">
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-25">
                        <label for="lname">Precio del Dolar</label>
                      </div>
                      <div class="col-75">
                     <input type="text" id="precioDolar" value="'.number_format($precioDolar, 2, '.', ',').'" name="precioDolar" placeholder="200000" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" / disabled="disabled">
                 
                      </div>
                    </div>
                    <br>
                    <br>
        
        </form>
     
        
        ';
        
    }

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje, $mensaje1;
?>