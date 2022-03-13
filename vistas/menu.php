<?php require_once "../clases/dependenciasIndex.php" ?> <!-- ESTO ES PARA ACCINAR VALIDACIONES JS Y ESTILOS CSS BOOTSTRAP -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="iconD.jpg" type="image/png" sizes="16x16"> 
    <title>SistemaPrecios</title>
</head>
<body>

<div id='cssmenu'> <!--  BARRA DE MENU PRINCIPAL DEL SISTEMA -->
<ul>
   <li><a href='index.php'><span>Inicio</span></a></li>
   <li class='active has-sub'><a href='#'><span>Registro</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Entradas</span></a>
            <ul>
               <li><a href='../vistas/registro.php'><span>Registrar Entrada</span></a></li>
               <li class='last'><a href='../vistas/modificarRegistro.php'><span>Modificar Entrada</span></a></li>
               <li class='last'><a href='../vistas/eliminaRegistro.php'><span>Eliminar Entrada</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Consultas</span></a>
            <ul>
               <li><a href='../vistas/reporteSeleccion.php'><span>Reporte General</span></a></li>
               
               <li class='last'><a href='../vistas/consultaPor.php'><span>Consulta Por</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href='../vistas/actualizaPrecios.php'><span>Actualiza Precios</span></a></li>
   <li><a href='#'><span>Nostros</span></a></li>
   <li class='last'><a href='#'><span>Contacto</span></a></li>
</ul>
</div>
    
</body>
</html>