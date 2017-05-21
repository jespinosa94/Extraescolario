<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $metodosActuales = $_POST['pagosActuales'];
  $metodoAInsertar = $_POST['metodoPago'];

  $metodosTratados = "\"".$metodosActuales.",".$metodoAInsertar."\"";
  $prueba = $_POST['codigoActividad'].",".$metodosTratados;


  $sqladdPago = "call updateMetodosPago(".$_POST['codigoActividad'].",".$metodosTratados.");";

  $metodoPago = consulta($sqladdPago);



 header("Location: /Extraescolario/editarActividad.php");
 ?>
