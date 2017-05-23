<?php
require_once ("conexion.php");
require_once ("funciones.php");

  $cod = $_POST['codActividad'];
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

  //preparamos y ejecutamos la consulta
  $sqlUpdateActividad = "call setActividad($cod, $nombre, $localidad, $direccion, $precio, $fInicio, $fFin, $descripcion, $periodoPago, $rangoEdad);";
  echo $sqlUpdateActividad;
  $updateActividad = consulta($sqlUpdateActividad);

  header('Location: /Extraescolario/perfilOfertador.php');



?>
