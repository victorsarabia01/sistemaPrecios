<?php include_once "../clases/conexion.php" ?>     <!-- ESTO ES PARA CONECTAR A LA BD -->
<?php   
//AGREGAR ENTRADA MEDIANTE EL POST DEL FORMULARIO
$consultaBusqueda = $_POST['busqueda'];
$idProducto=$_POST['idProducto'];
$descripcion=$_POST['descripcion'];
$costo=$_POST['costoBS'];
$precioDolar=$_POST['precioDolar'];
$fecha=$_POST['fechaSelect'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$ano=$_POST['ano'];

    $costoEnDolar =  $costo /  $precioDolar;
    $gana10 =  $costo * 10 / 100 +  $costo;
    $gana20 =  $costo * 20 / 100 +  $costo;


    // AGREGAR EN TABLA ENTRADA
    $sql_agregar1 = 'UPDATE entrada, fecha SET entrada.id_producto=?, entrada.descripcion=?, entrada.costo=?, entrada.precioDolar=?, entrada.costoEnDolar=?,entrada.precioVenta=?,entrada.gana10=?, entrada.gana20=?, fecha.fecha=?  where entrada.id_entrada=fecha.id_entrada and entrada.id_entrada=?';
    $sentencia_agregar1 = $pdo->prepare($sql_agregar1);
    $sentencia_agregar1->execute(array($idProducto,$descripcion,$costo,$precioDolar,$costoEnDolar,$costo,$gana10,$gana20,$fecha,$consultaBusqueda));
    //header('location:index.php'); // REDIRIGIR A INDEX.PHP
    // CERRAR SESION 
    
    
  ?>
