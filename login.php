<?php
session_start();
require_once ("conexion.php");
require 'funciones.php';
//compruebaSesionIniciada();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING); //El filter comprueba que no tenga caracteres raros tipo <h1></h1>
  $password = $_POST['password'];
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
    $sql->bind_param('ss', $email, $password);
    $sql->execute();
    $sql->bind_result($resultado);  //asocio el resultado a una variable, pero no le doy valor
    $sql->fetch();  //Doy valor a la variable que he asociado

    if ($resultado) {  //Se comprueba si es BUS
      $_SESSION['cod'] = $resultado;
      header('Location: index.php');  //Se redirige al usuario a index.php
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
              <label><input type="checkbox" value="">Recordar email</label>
              <a href="recuperar_pass.html" class="btn btn-link pull-right">¿No puedes iniciar sesión?</a>
            </div>
            <hr class="colorgraph" />
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <button type="submit" class="btn btn-lg btn-success btn-block" name="button">Iniciar sesión</button>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6">
                <a href="registroBUS.html" class="btn btn-lg btn-primary btn-block">Crear cuenta gratuita</a>
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

      <!-- FOOTER -->
      <footer>
        <div class="footer clearfix">
          <div class="container">
            <div class="row">
              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <a class="footer-logo" href="index.php">
                    <img src="http://i66.tinypic.com/103ap8k.jpg" alt="Extraescolario" width="177" height="47" />
                  </a>
                  <p>
                    Encuentra las actividades que más te apetezca hacer adaptándose a tu horario, simplemente navega por nuestras recomendaciones
                    y te aseguramos que no te quedarás en casa aburrido.
                  </p>
                </div>
              </div>

              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <h5>Contacta con nosotros</h5>
                  <p>
                    Estamos a tu disposición los 7 días de la semana.
                  </p>
                  <ul class="list-unlysted">
                    <li>
                      <i class="fa fa-home" aria-hidden="true"></i>
                      <a href="https://www.google.es/maps/@38.383397,-0.5145466,17z">
                        Universidad de Alicante
                      </a>
                    </li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> 96 590 3400</li>
                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailTo:info@extraescolario.com">info@extraescolario.com</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <h5>Descubre extraescolario</h5>
                  <ul class="list-unlysted">
                    <li><a href="#">Información</a></li>
                    <li><a href="#">Trabaja con nosotros</a></li>
                    <li><a href="#">Ayuda</a></li>
                    <li><a href="#">Razones para utilizar extraescolario</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <h5>Newsletter</h5>
                  <p>Suscríbete a nuestro boletín de información semanal para estar al tanto de las últimas actualizaciones</p>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Introduce tu email" aria-describedby="basic-addon21" />
                    <span class="input-group-addon" id="basic-addon21"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                  </div>
                  <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
