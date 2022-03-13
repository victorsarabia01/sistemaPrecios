<?php

$link = 'mysql:host=localhost;dbname=mydb';
$usuario='root';
$pass='';

try{
    $pdo = new PDO($link, $usuario, $pass);

    //echo 'conectado'; /* --------------------> PARA PROBAR LA CONEXION */
    /*foreach($pdo->query('SELECT * from `youtube_colores`') as $fila) {
        print_r($fila);
    }*/


}
catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

// LEER DE BASE DE DATOS
/*$sql_leer = 'SELECT * FROM colores';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll(); // PARA LLENAR LOS COLORES DESDE BASE DE 

function incluir()
   {
	  
    	  }*/
	  

?>
