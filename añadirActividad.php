<?php
require_once ("conexion.php");
require_once ("funciones.php");

  $codOfertador = $_POST['codigoOfertador'];
  $nombre = $_POST['nombreActividad'];
  $nombre = '"'.$nombre.'"';
  $localidad = $_POST['getLocalidad'];
  $direccion = $_POST['getDireccion'];
  $direccion = '"'.$direccion.'"';
  $precio = $_POST['getPrecio'];
  $fInicio = $_POST['fechaInicio'];
  $fInicio = '"'.$fInicio.'"';
  $fFin = $_POST['fechaFin'];
  $fFin = '"'.$fFin.'"';
  $descripcion = $_POST['getDescripcion'];
  $descripcion = '"'.$descripcion.'"';
  $periodoPago = $_POST['getPeriodoPago'];
  $periodoPago = '"'.$periodoPago.'"';
  $rangoEdad = $_POST['getRangoEdad'];
  $rangoEdad = '"'.$rangoEdad.'"';
  $formaPago = $_POST['getFormaPago'];
  $formaPagoFinal = "";

  //$imagen = $_POST['files'];
  //echo $imagen;
  //$imagenBlob = '"'. file_get_contents($imagen) . '"';
  //echo $imagenBlob;
  //Recorremos las distintas formas de pago seleccionadas por el cliente
  for($i=0; $i < sizeof($formaPago); $i++)
  {
    $formaPagoFinal = $formaPagoFinal.','.$formaPago[$i];
  }
  //Eliminamos el primer caracter sobrante
  $formaPagoFinal = substr($formaPagoFinal,1);
  $formaPagoFinal = '"'.$formaPagoFinal.'"';

  //call añadirActividad('Prueba', '2017-05-22', '2017-06-22', 'pruebaaaaaaa', '123', 'Contado', 'mensual',
//  'asdfasdf', '5000000', '1234', '4-7 años')
  //preparamos y ejecutamos la consulta
  $sqlAñadirActividad = "call añadirActividad($nombre, $fInicio, $fFin, $direccion, $precio, $formaPagoFinal, $periodoPago,
  $descripcion, $codOfertador, $localidad, $rangoEdad);";

  $añadirActividad = consulta($sqlAñadirActividad);

  header('Location: /Extraescolario/perfilOfertador.php');



?>
