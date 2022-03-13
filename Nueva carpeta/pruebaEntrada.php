<?php
// LEER DE BASE DE DATOS
    require_once "../conexion.php";
    $sql_leer = 'SELECT e.id_entrada FROM entrada e, fecha f where e.id_entrada=f.id_entrada'; // LEER EL MAX ID 
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetchAll(); // ARRAY QUE TRAE LA CONSULTA SQL
    //foreach($resultado as $g){}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                   <div>
                   
                    <SELECT NAME="idEntrada" id="idEntrada" SIZE="1" class="form-control"> 
                    <option value="0">Seleccione:</option>
                    <?php foreach($resultado as $g):?>
                      <option value="<?php echo $g['id_entrada']?>"><?php echo $g['id_entrada']?></option>
                   <?php endforeach ?> 
                   </SELECT> 
                   </div>
</body>
</html>