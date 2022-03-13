<?php include_once "../clases/conexion.php"?>

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
     echo "<th> Precio Actual";
     echo "<th> Gana 10%";
     echo "<th> Gana 20%";
        foreach ($resultado as $fila) 
	   {
         		echo "<tr>"; // inicia fila
				   echo "<td>";           echo $fila['id_entrada'];
				   echo "<td>";		   echo $fila['id_producto'];
                echo "<td>";		   echo $fila['descripcion'];
                echo "<td>";		   echo date("d-m-Y",strtotime($fila['fecha']));
                echo "<td>";		   echo number_format( $fila['costo'], 2, '.', ',');
                echo "<td>";		   echo number_format( $fila['precioDolar'], 2, '.', ',');	
                echo "<td>";		   echo number_format( $fila['costoEnDolar'], 2, '.', ',');	
                echo "<td>";		   echo number_format( $fila['precioVenta'], 2, '.', ',');	
                echo "<td>";		   echo number_format( $fila['gana10'], 2, '.', ',');	
                echo "<td>";		   echo number_format( $fila['gana20'], 2, '.', ',');			   
			      echo "<br>"; 		   echo "</tr>";
		   } // fin del while
		echo "</table>"; // fin de la tabla
	   echo "</center>";

?>
   


</div>