<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $sqlborraInscripciones = "call borrarInscripcion(".$_POST['codigoActividad'].",".$_POST['codigoBus'].");";

  $borraInscripciones = consulta($sqlborraInscripciones);

  header("Location: /Extraescolario/editarActividad.php");
 ?>
