<?php
session_start();
require_once ("conexion.php");
require 'funciones.php';
$pimienta = "MpABX|sj:;%/";
$aux = consulta("call getSal()");
$sal = $aux[0][0];
//compruebaSesionIniciada();
$logeado = isset($_SESSION['cod']);
if($logeado) {
  //header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING); //El filter comprueba que no tenga caracteres raros tipo <h1></h1>



//Gestión de error de que en la bd se insertaron datos "mal encriptados, los nuevos campos serán encriptados totalmente"
  /*$codIntento = consulta("select cod from USR where email=\"". $email ."\";");
  if($codIntento[0][0]>=5100018) {
    $password = $sal.$_POST['password'].$pimienta;
  } else {
    $password = $_POST['password'];
  }*/
  $password = $_POST['password'];
  $passencriptada = hash ( 'sha256' , $password , false );
  $passencriptada = substr($passencriptada, 0, -14);

    /**Hay que hashear la password**/
  $errores = '';
/*
@Deprecated es mejor usar mysqli
$usuariobd = "gi_jec21";
$contrasenya = ".gi_jec21.";

  try {
    $conexion = new PDO('mysql:host=bbdd.dlsi.ua.es;dbname=gi_extraescol', $usuariobd, $contrasenya);
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

    $sql = $conexion->prepare('SELECT u.cod FROM BUS b join USR u on b.cod=u.cod where email = :email and contrasenya = :password');
    $sql->execute(array(
      ':email' => $email,
      ':password' => $password
    ));

    $resultado = $sql->fetch();*/
    $sql = $conexion->prepare('SELECT cod FROM USR where email = ? and contrasenya = ?');
    /*(i=int, d=double, s=string, b=blob)*/
    $sql->bind_param('ss', $email, $passencriptada);
    $sql->execute();
    $sql->bind_result($resultado);  //asocio el resultado a una variable, pero no le doy valor
    $sql->fetch();  //Doy valor a la variable que he asociado


    if ($resultado) {  //Se comprueba si es BUS
      $_SESSION['cod'] = $resultado;
      header('Location: administracion.php');  //Se redirige al usuario a index.php
    } else {  //Se prepara query para OFR
      $errores .= '<li>Datos incorrectos</li>';
    }
}
 ?>


<!DOCTYPE html>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extraescolario Project">
    <meta name="author" content="Extraescolario Team">
    <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Fuente de google -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Estilos custom -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css//font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="principal">

      <!-- Header de la página -->
      <header>
      </header>

      <!--Cuerpo -->
      <div id="login" class="container">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <form class="form-signin" method="post" role="form">
            <a href="index.php"><h2 class="logo">Iniciar sesión en tu cuenta Extraescolario</h2></a>
            <hr class= "colorgraph">
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email de Extraescolario">
            </div>
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña">
				    </div>
            <div class="checkbox">
              <h4>Inicio de sesión exclusivo de administradores</h4>
            </div>
            <hr class="colorgraph" />
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-lg btn-success btn-block" name="button">Iniciar sesión</button>
              </div>
            </div>
          </form>
          <?php
          if(!empty($errores)) {
            ?>
            <div>
              <ul>
                <?php echo $errores; ?>
              </ul>
            </div>
            <?php
          }
           ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
