<?php
function compruebaSesionIniciada() {
  if(isset($_SESSION['usuario'])){
    header('Location: index.php'); //redirigir a index.php
  }
}
 ?>
