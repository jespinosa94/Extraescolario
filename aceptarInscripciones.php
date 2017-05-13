<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $sqlAceptarInscripciones = "call setAceptarInscripcion(".$_POST['codigoActividad'].",".$_POST['codigoBus'].");";

  $aceptarInscripciones = consulta($sqlAceptarInscripciones);

  header("Location: http://localhost/Extraescolario/editarActividad.php");
 ?>
