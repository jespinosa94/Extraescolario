<?php 
  $servidor = "bbdd.dlsi.ua.es";
  $usuario = "gi_jmba12";
  $contrasenya = "8CLISCQO";
  $BD = "gi_extraescol";


  $conexion = mysqli_connect($servidor, $usuario, $contrasenya,$BD);
  mysqli_set_charset($conexion, 'utf8');
?>