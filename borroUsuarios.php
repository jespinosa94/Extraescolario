<?php
  session_start();
  $logeado = isset($_SESSION['cod']);

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");


  $codigoUsuario = $_POST['codigoUSR'];
  $sqlborraUsuarios = "call borrarUsr($codigoUsuario)";
  $borraUsuarios = consulta($sqlborraUsuarios);

  header("Location: /Extraescolario/admUsuarios.php");
 ?>
