<?php include_once "../clases/conexion.php"?>

<?php
//$idEntradaa=$_POST['idEntrada'];
$idEntradaa=$_POST['busqueda'];

//$idEntrada1=11;
$idEntrada2=$_POST['idEntradaa'];
//echo $idEntrada1;
// LEER DE BASE DE DATOS
$sql_leer ='DELETE entrada, fecha from entrada join fecha on entrada.id_entrada=fecha.id_entrada where entrada.id_entrada=?';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute(array($idEntradaa));
//$resultado2 = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE DATOS
//header('location:index.php');
//printf ($idEntradaa);
?>