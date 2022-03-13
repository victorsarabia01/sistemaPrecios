<?php require_once "../dependencias.php" ?> <!-- ESTO ES PARA ACCINAR VALIDACIONES JS Y ESTILOS CSS BOOTSTRAP -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<div id='cssmenu'> <!--  BARRA DE MENU PRINCIPAL DEL SISTEMA -->
<ul>
   <li><a href='index.php'><span>Inicio</span></a></li>
   <li class='active has-sub'><a href='#'><span>Registro</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Entradas</span></a>
            <ul>
               <li><a href='../proyectoVentas/vistas/registro.php'><span>RegistrarEntrada</span></a></li>
               <li class='last'><a href='modificaRegistro.php'><span>ModificarEntrada</span></a></li>
               <li class='last'><a href='../vistas/eliminaRegistro1.php'><span>EliminarEntrada</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Consultas</span></a>
            <ul>
               <li><a href='reporteSeleccion.php'><span>Reporte General</span></a></li>
               
               <li class='last'><a href='consultaPor.php'><span>Consulta Por</span></a></li>
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