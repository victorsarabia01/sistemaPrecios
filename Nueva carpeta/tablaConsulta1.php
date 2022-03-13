

<?php include_once "../conexion.php"?>
<?php
$idEntrada=$_GET['idEntrada'];
// LEER DE BASE DE DATOS
//echo ($idEntrada);
$sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and c.id_entrada=?';
//echo ($sql_leer);
$gsent = $pdo->prepare($sql_leer);
$gsent->execute(array($idEntrada,$idEntrada));
$resultado = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
?>

<div class="col md-5"  > <!-- COLUMANA DE COLORES -->

<?php
     echo "<center>";
     echo "<h1>Listado de Entradas</h1>";
     echo "<table border='1' class='mayusculas tcenter' style='overflow-x:auto;'>"; // inicia la tabla
     echo "<tr>"; // inicia fila
     echo "<th> IDENTRADA"; 	
     echo "<th> IDPRODUCTO";	
     echo "<th> DESCRIPCION";
     echo "<th> FECHA";
     echo "<th> Compre A";
     echo "<th> Precio Dolar";
     echo "<th> Costo En Dolar";
     echo "<th> Precio Venta";
     echo "<th> Gana 10%";
     echo "<th> Gana 20%";
        foreach ($resultado as $fila) 
	   {
         		echo "<tr>"; // inicia fila
				echo "<td>";           echo $fila['id_entrada'];
				echo "<td>";		   echo $fila['id_producto'];
                echo "<td>";		   echo $fila['descripcion'];
                echo "<td>";		   echo date("d-m-Y",strtotime($fila['fecha']));
                echo "<td>";		   echo $fila['costo'];
                echo "<td>";		   echo $fila['precioDolar'];	
                echo "<td>";		   echo $fila['costoEnDolar'];	
                echo "<td>";		   echo $fila['precioVenta'];	
                echo "<td>";		   echo $fila['gana10'];	
                echo "<td>";		   echo $fila['gana20'];			   
			    echo "<br>"; 		   echo "</tr>";
		   } // fin del while
		echo "</table>"; // fin de la tabla
	   echo "</center>";

?>
   


</div>