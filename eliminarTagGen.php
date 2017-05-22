<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  //Metodos que tiene actualmente el OFR en la actividad
  $codTag = $_POST['codTagGen'];
  //Metodo de pago que quiere eliminar
  $codUsuario = $_POST['codUsuario'];

  $sqlEliminarTagGen = "call eliminarTagGenBus($codTag, $codUsuario)";
  echo $sqlEliminarTagGen;
  $eliminarTagGen = consulta($sqlEliminarTagGen);

 header('Location: /Extraescolario/TagBus.php');
?>
