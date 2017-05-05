<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $borranotif = "call borroPromos(".$_SESSION['cod'].",".$_POST['codigoActiv'].");";

  $datosNotis = consulta($borranotif);

  header("Location: http://localhost/Extraescolario/newsletter.php");
 ?>