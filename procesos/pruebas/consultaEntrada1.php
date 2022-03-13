<?php
// LEER DE BASE DE DATOS
    require_once "../conexion.php";
    $idEntrada=$_POST['idEntrada'];
  // LEER DE BASE DE DATOS
  $var=1;
  $sql_leer = 'SELECT O.id_producto, O.descripcion, C.fecha, O.costo, O.precioDolar FROM fecha C, entrada O WHERE C.id_entrada = O.id_entrada=?'; // LEER EL MAX ID 
  $gsent = $pdo->prepare($sql_leer);
  $gsent->execute(array($idEntrada));
  $resultado1 = $gsent->fetchAll(); // ARRAY QUE TRAE LA CONSULTA SQL
?>