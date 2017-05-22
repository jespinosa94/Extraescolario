<?php
require_once ("conexion.php");
require_once ("funciones.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $nombre=$_POST['nombreempresa'];
  $correo=$_POST['correoempresa'];
  $pass=$_POST['pass1'];
  $telef=$_POST['telefonoempresa'];
  $imagen=$_FILES['files']['name'];
  $direccion=$_POST['direccionempresa'];
  $cif=$_POST['cifo'];
  $localidad=$_POST['localidad'];
  $nick=$_POST['nicko'];


  $passencriptada = hash ( 'sha256' , $pass , false );


  $sqlInsercion = "call insertarOFR('$nick','$correo','$passencriptada','$telef','$imagen','$localidad','$nombre','$cif','$direccion')";
  $resultadoInserccion = consulta($sqlInsercion);

  ini_set('post_max_size','50M');
      ini_set('upload_max_filesize','50M');
      ini_set('max_execution_time','1000');
      ini_set('max_input_time','1000');
  $dir_subida = "img/";
  $fichero_subido = $dir_subida . basename($_FILES['files']['name']);


  move_uploaded_file($_FILES['files']['tmp_name'], $fichero_subido)

  //muestra los datos del fichero subido
/*
  echo '<pre>';
  if (move_uploaded_file($_FILES['files']['tmp_name'], $fichero_subido))
  {
      echo "El fichero es válido y se subió con éxito.\n";
  } else
  {
      echo "¡Posible ataque de subida de ficheros!\n";
  }

  //echo 'Más información de depuración:';
  //print_r($_FILES);

  print "</pre>";
  */
  /*
  //envío de correo electrónico.
  $mailText="Hola $nombre. \n Has sido registrado como ofertador en Extraescolario. Deberías poder acceder con tus credenciales en breve.";
  mail($correo,'registro como Ofertador Extaescolario',$mailText,'From: Extraescolario@gmal.com');
  */
?>
  <script type="text/javascript">

    alert ("has sido registrado ahora serás redirigido al login al pulsar en aceptar. Por favor comprueba tu correo antes de entrar");

  </script>
<?php
header('Location: /Extraescolario/login.php');


}

?>
