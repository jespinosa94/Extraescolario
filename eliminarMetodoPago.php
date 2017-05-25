<?php
  session_start();
  $logeado = isset($_SESSION['cod']);

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  //Metodos que tiene actualmente el OFR en la actividad
  $metodosActuales = $_POST['pagosActuales'];
  //Metodo de pago que quiere eliminar
  $metodoABorrar = $_POST['metodoPago'];
  //Separamos la cadena
  $pagosSplit = explode(",",$metodosActuales);
  //$metodosTratados = "";
  $metodosTratados = "";

  //Recorremos la cadena de los pagos actuales
  for($i = 0; $i< count($pagosSplit); $i++)
  {
    $rowPagos = $pagosSplit[$i];
    //  Si un valor de la cadena es distinto al que queremos quitar no lo añadimos
    if(strrpos($metodoABorrar,$rowPagos) === false)
    {
      $metodosTratados = $metodosTratados.",".$rowPagos;
    //  echo $metodosTratados;
    //  echo $rowPagos;
    }
  }
  //Eliminamos el primer caracter
  $final = substr($metodosTratados, 1);
  //Le añadimos comillas para que mysql lo detecte como una unica variable, ya que es un tipo set
  $final = '"'.$final.'"';
  echo $final;

  $sqladdPago = "call updateMetodosPago(".$_POST['codigoActividad'].",".$final.");";

  $metodoPago = consulta($sqladdPago);



header("Location: /Extraescolario/editarActividad.php?cod=" . $_POST['codigoActividad']);
?>
