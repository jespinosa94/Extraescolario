<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  //Metodos que tiene actualmente el OFR en la actividad
  $codTag = $_POST['codTag'];
  //Metodo de pago que quiere eliminar
  $codActividad = $_POST['codActividad'];

  $sqlEliminarTag = "call eliminarTagActividad($codTag, $codActividad)";
  echo $sqlEliminarTag;
  $eliminarTag = consulta($sqlEliminarTag);

  header('Location: /Extraescolario/editarActividad.php');
?>
