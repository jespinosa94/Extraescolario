<?php
/*  if (!isset($_SESSION['cod'])){
    header('Location: login.php');
  }*/

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['radio'])) {
      $inscripcion = $_POST['radio'];
      $idAct = $_POST['idAct'];
      echo($idAct . $inscripcion);
    } 
  } else {
    require "index.php";
}
 ?>
