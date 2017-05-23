<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  //Metodos que tiene actualmente el OFR en la actividad
  $codTag = $_POST['seleccionarTagEsp'];
  //Metodo de pago que quiere eliminar
  $codUsuario = $_POST['codUsuario'];

  $sqlAñadirTagEsp = "call añadirTagEspBus($codTag, $codUsuario)";
  echo $sqlAñadirTagEsp;
  $añadirTagEsp = consulta($sqlAñadirTagEsp);

  header('Location: /Extraescolario/TagBus.php');
?>
