<?php
$link=mysql_connect("bbdd.dlsi.ua.es", "gi_arr62", ".gi_arr62.");
if(!$link)
  die("Error: no se puede conectar con la base de datos");
if(!mysql_select_db("gi_arr62", $link))
  die("Error: La base de datos no existe");
?>
