<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  //Metodos que tiene actualmente el OFR en la actividad
  $codTag = $_POST['seleccionarTag'];
  //Metodo de pago que quiere eliminar
  $codActividad = $_POST['codActividad'];

  $sqlAñadirTag = "call añadirTagActividad($codTag, $codActividad)";
  $añadirTag = consulta($sqlAñadirTag);

header("Location: /Extraescolario/editarActividad.php?cod=" . $codActividad);
?>
