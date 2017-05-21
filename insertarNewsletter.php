<?php
require_once ("conexion.php");
require_once ("funciones.php");
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $nombre=$_POST['nombreempresa'];
  $correo=$_POST['correoempresa'];
  $pass=$_POST['pass1'];
  $telef=$_POST['telefonoempresa'];
  $direccion=$_POST['direccionempresa'];
  $cif=$_POST['cifo'];
  $imagen=$_POST['files'];
  $localidad=$_POST['localidad'];
  $nick=$_POST['nicko'];


  $passencriptada = hash ( 'sha256' , $pass , false );


  $sqlInsercion = "call insertarOFR('$nick','$correo','$passencriptada','$telef','$imagen','$localidad','$nombre','$cif','$direccion')";
  $resultadoInserccion = consulta($sqlInsercion);*/



  /*
  //envío de correo electrónico.
  $mailText="Hola $nombre. \n Has sido registrado como ofertador en Extraescolario. Deberías poder acceder con tus credenciales en breve.";
  mail($correo,'registro como Ofertador Extaescolario',$mailText,'From: Extraescolario@gmal.com');
  */
?>
<!--  <script type="text/javascript">

    alert ("has sido registrado ahora serás redirigido al login al pulsar en aceptar. Por favor comprueba tu correo antes de entrar");

  </script>-->
<?php
header('Location: /Extraescolario/admUsuarios.php');


//}

?>
