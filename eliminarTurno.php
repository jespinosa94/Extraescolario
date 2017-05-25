<?php
  session_start();
  $logeado = isset($_SESSION['cod']);
  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $sqlBorrarTurno = "call borrarTurno(".$_POST['codTurno'].",".$_POST['codDia'].",".$_POST['codFranja'].");";
  $borrarTurno = consulta($sqlBorrarTurno);

  header("Location: /Extraescolario/editarActividad.php?cod=" . $_POST['codigoActividad']);
 ?>
