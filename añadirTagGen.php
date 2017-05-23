<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  //Metodos que tiene actualmente el OFR en la actividad
  $codTag = $_POST['seleccionarTagGen'];
  //Metodo de pago que quiere eliminar
  $codUsuario = $_POST['codUsuario'];

  $sqlAñadirTagGen = "call añadirTagGenBus($codTag, $codUsuario)";
  echo $sqlAñadirTagGen;
  $añadirTagGen = consulta($sqlAñadirTagGen);

  header('Location: /Extraescolario/editarBUS.php');
?>
