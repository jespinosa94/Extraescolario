<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");


//  $codActividad = $_POST['codActividad'];
  $hInicio = $_POST['horaInicio'];
  $hFin = $_POST['horaFin'];
  $seleccionarDia = $_POST['seleccionarDia'];
  $codActividad = $_POST['codActividad'];
  $inicio = '"'.$hInicio.'"';
  $fin = '"'.$hFin.'"';
  $actividadFinal = '"'.$codActividad.'"';
  $dia = '"'.$seleccionarDia.'"';

  echo "hora inicio"; ?> <br><?php
  var_dump($hInicio);?> <br><?php
    echo "hora fin";?> <br><?php
  var_dump($hFin);?> <br><?php
    echo "dia";?> <br><?php
  var_dump($seleccionarDia);?> <br><?php
    echo "actividad";?> <br><?php
  var_dump($codActividad);?> <br><?php
  $sqlAñadirTurno = "call insertarTurnoHorario(".$actividadFinal.",".$inicio.",".$fin.",".$dia.");";
  var_dump($sqlAñadirTurno);
  $añadirTurno = consulta($sqlAñadirTurno);
  var_dump($añadirTurno);
  header("Location: /Extraescolario/editarActividad.php");
 ?>
