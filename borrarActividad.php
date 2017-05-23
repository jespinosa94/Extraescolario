<?php
require_once ("conexion.php");
require_once ("funciones.php");


  //preparamos las variables para borrar la actividad
  $cod = $_POST['codActividad'];

  //preparamos y ejecutamos la consulta
  $sqlborrarActividad = "call borrarActividad($cod)";
  $borrarActividad = consulta($sqlborrarActividad);

  header('Location: /Extraescolario/perfilOfertador.php');


//}

?>
