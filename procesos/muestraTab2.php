<?php
// LEER DE BASE DE DATOS
$sql_leer = 'SELECT O.id_entrada, O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar, O.costoEnDolar, O.precioVenta, O.gana10, O.gana20  FROM fecha C, entrada O WHERE C.id_entrada = O.id_entrada order by o.id_producto DESC ';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
?>