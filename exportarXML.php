<?php
require 'funciones.php';
$aux = consulta("call getUsuariosAceptados(". $_GET['cod'] . ")");
//var_dump($aux);



$nombreArchivo = "usuariosAct" . $_GET['cod'] . ".xml";
$fichero = fopen($nombreArchivo, "w") or die("No ze puede abrir el archivo :(");
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
$nombreAct = consulta("select nombre from ACTIVIDAD where cod= ". $_GET['cod'] .";");
echo("<actividad nombre=\"". $nombreAct[0][0] ."\">\n");

for($x=0; $x<sizeof($aux); $x++) {
  //echo($aux[$x][0]); //Obtengo el código del usuario
  $datosUSR = consulta("call getDatosBus(". $aux[$x][0] .")");
  //var_dump($datosUSR);
  echo("\t <inscrito>\n");
  echo("\t\t <nombre>". $datosUSR[0]['nombre'] . "</nombre>\n");
  echo("\t\t <apellidos>". $datosUSR[0]['apellidos'] . "</apellidos>\n");
  echo("\t\t <email>" . $datosUSR[0]['email'] . "</email>\n");
  echo("\t\t <telefono>" . $datosUSR[0]['telefono'] . "</telefono>\n");
  echo("\t\t <sexo>" . $datosUSR[0]['sexo'] . "</sexo>\n");
  echo("\t\t <calle>" . $datosUSR[0]['direccion'] . "</calle>\n");
  echo("\t\t <fechaNacimiento>" . $datosUSR[0]['fechaNacimiento'] . "</fechaNacimiento>\n");
  echo("\t </inscrito>\n");
}
echo("</actividad>\n");



header("Content-Disposition: attachment; filename=\"" . basename($nombreArchivo) . "\"");
header("Content-Type: application/force-download");
header("Content-Length: " . filesize($nombreArchivo));
header("Connection: close");
 ?>
