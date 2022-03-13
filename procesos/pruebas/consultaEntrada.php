<?php include_once "../conexion.php"?>

<?php
//$idEntradaa=$_POST['idEntrada'];
$idEntradaa=$_POST['idEntrada'];
$idEntrada1=7;
$idEntrada2=$_POST['id'];
//echo $idEntrada1;
// LEER DE BASE DE DATOS
$sql_leer ='SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE O.id_entrada=? and c.id_entrada=o.id_entrada';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute(array($idEntradaa));
$resultado2 = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
?>