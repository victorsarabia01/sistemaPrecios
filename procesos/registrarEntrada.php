
<?php include_once "../clases/conexion.php" ?>     <!-- ESTO ES PARA CONECTAR A LA BD -->
<?php   
//AGREGAR ENTRADA MEDIANTE EL POST DEL FORMULARIO


    $id_producto = $_POST['idProducto'];
    $descripcion = $_POST['descripcion'];
    $costo = $_POST['costoBS'];
    $precioDolar = $_POST['precioDolar'];
    $dia=$_POST['dia'];
    $mes=$_POST['mes'];
    $ano=$_POST['ano'];
    $fecha=$_POST['fechaSelect'];
    //$fecha=$_POST['fechaP'];
    //$costoFormat = (float) $costo;
    //$costoEnDolar = (float) $costo / (float) $precioDolar;
    $costoEnDolar =  $costo /  $precioDolar;
    $gana10 =  $costo * 10 / 100 +  $costo;
    $gana20 =  $costo * 20 / 100 +  $costo;
    echo ($dia);
    echo "";
    echo ($mes);
    echo "";
    echo ($ano);
    // LEER DE BASE DE DATOS
    $sql_leer = 'SELECT max(id_fecha) from fecha'; // LEER EL MAX ID 
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetch(); // ARRAY QUE TRAE LA CONSULTA SQL

    foreach ($resultado as $key ) {
      
      $consultaMax = $key;
    }
    $id_entrada = $consultaMax + 1; // GENERADOR DE CODIGO

    echo ($id_entrada);
    // AGREAR EN TABLA FECHA
    $sql_agregar = 'INSERT INTO fecha (id_fecha,id_entrada,fecha) VALUES (?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    //$sentencia_agregar->execute(array($id_entrada,$id_entrada,$ano.'-'.$mes.'-'.$dia));
    $sentencia_agregar->execute(array($id_entrada,$id_entrada,$fecha));
    // AGREGAR EN TABLA ENTRADA
    $sql_agregar1 = 'INSERT INTO entrada (id_entrada,id_producto,descripcion,costo,precioDolar,costoEnDolar,precioVenta,gana10,gana20) VALUES (?,?,?,?,?,?,?,?,?)';
    $sentencia_agregar1 = $pdo->prepare($sql_agregar1);
    $sentencia_agregar1->execute(array($id_entrada,$id_producto,$descripcion,$costo,$precioDolar,$costoEnDolar,$costo,$gana10,$gana20));
    //header('location:index.php'); // REDIRIGIR A INDEX.PHP
    // CERRAR SESION 
    //$sentencia_agregar = null;
    //$sentencia_agregar1 = null;
    //$pdo = null;

    //$_POST['idProducto'] = "";
    
    //header('location:registro.php'); // CUANDO TRABAJAMOS CON LECTURAS DIRECTA DE DB EN EL HTML 

    

  ?>
