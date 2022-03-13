<?php 
    require_once "../conexion.php";
    require_once "../precios.php";
    
	$datos=$_POST['precioDolar'];

	$obj= new precios();

	echo $obj->agregaCategoria($datos);


 ?>