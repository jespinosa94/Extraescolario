<?php
 session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $pueblo = $_GET["pueblo"];
  //var_dump($pueblo);

  $localidades=consulta("call getLocalidades(".$pueblo.")");
  	echo "<select>";
  	for ($i =0; $i<sizeof($localidades); $i++) {
  		echo '<option value="'; echo $localidades[$i]["cod"]; echo '">'; echo $localidades[$i]["nombre"]; echo "</option>";
        //<option value=""> select </option>
  	}
  	echo "</select>";
?>
