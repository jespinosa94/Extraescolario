<?php
//si la sesión ya está iniciada, automáticamente va al index
function compruebaSesionIniciada() {
  if(isset($_SESSION['usuario'])){
    header('Location: index.php'); //redirigir a index.php
  }
}

//si la sesión NO está iniciada, automáticamente va al login
function verificarSesion() {
  if(!isset($_SESSION['usuario'])){
    header('Location: login.php'); //redirigir a login.php
  }
}
 ?>
