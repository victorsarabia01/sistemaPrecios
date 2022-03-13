

<?php   
$precioN = $_POST['precioDolar'];
//AGREGAR ENTRADA MEDIANTE EL POST DEL FORMULARIO
    require_once "../clases/conexion.php";
        // LEER DE BASE DE DATOS
        $sql_leer = 'SELECT * from entrada'; // LEER EL MAX ID 
        $gsent = $pdo->prepare($sql_leer);
        $gsent->execute();
        $resultado = $gsent->fetchAll(); // ARRAY QUE TRAE LA CONSULTA SQL
        echo ($precioN);
        foreach ($resultado as $key ) {
        
    if($precioN > $key['precioDolar']){
    echo ('es mayor'); 
    $costo = $key['costoEnDolar']*$precioN;
    $gana10 = $costo*10/100+$costo;
    $gana20 = $costo*20/100+$costo;
    $id =$key['id_entrada'];
    $sql_agregar1 = 'UPDATE entrada SET precioVenta=?,gana10=?,gana20=? where id_entrada=?';
    $sentencia_agregar1 = $pdo->prepare($sql_agregar1);
    $sentencia_agregar1->execute(array($costo,$gana10,$gana20,$id));

  }
  else {
    echo ('no es mayor'); 
    $costo = $key['costo'];
    $gana10 = (float)$costo*10/100+(float)$costo+0.1;
    $gana20 = (float)$costo*20/100+(float)$costo+0.1;
    $id =$key['id_entrada'];
    $sql_agregar1 = 'UPDATE entrada SET precioVenta=?,gana10=?,gana20=? where id_entrada=?';
    $sentencia_agregar1 = $pdo->prepare($sql_agregar1);
    $sentencia_agregar1->execute(array($costo,$gana10,$gana20,$id));
  }
 }        
 //return true;
 //header('location:../vistas/menu.php'); // REDIRIGIR A INDEX.PHP

    // AGREGAR EN TABLA ENTRADA
    //$costo = '54';
    //$gana10 = '54';
    //$gana20 = '54';
    //$id = '10';
    //$sql_agregar1 = 'UPDATE entrada SET precioVenta=?,gana10=?,gana20=? where id_entrada=?';
    //$sentencia_agregar1 = $pdo->prepare($sql_agregar1);
    //$sentencia_agregar1->execute(array($costo,$gana10,$gana20,$id));
    //header('location:index.php'); // REDIRIGIR A INDEX.PHP
    // CERRAR SESION 
    //$sentencia_agregar1 = null;
    //$pdo = null;    
    //header('location:../vistas/registro.php'); // REDIRIGIR A INDEX.PHP
  ?>
  
