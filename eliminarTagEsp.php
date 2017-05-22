<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  //Metodos que tiene actualmente el OFR en la actividad
  $codTag = $_POST['codTagEsp'];
  //Metodo de pago que quiere eliminar
  $codUsuario = $_POST['codUsuario'];

  $sqlEliminarTagEsp = "call eliminarTagEspBus($codTag, $codUsuario)";
  echo $sqlEliminarTagEsp;
  $eliminarTagEsp = consulta($sqlEliminarTagEsp);

  header('Location: /Extraescolario/TagBus.php');
?>
