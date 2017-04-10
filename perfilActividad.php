<?php
session_start();
require 'funciones.php';

$logeado = isset($_SESSION['cod']);
if($logeado) {
  $cod = $_SESSION['cod'];
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

    <title>Perfil Actividad</title>

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
      <!-- Header de la página -->
      <?php
      if ($logeado) {
        require 'header.registered.php';
      } else {
        ?>
        <header>
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Barra de navegación</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"></a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <div class="row">
                  <div class="col-md-3">
                    <div id="header1" class="pull-right">
                      <a href="#">Oferta tus propias actividades</a>
                    </div>
                  </div>
                  <div id="header2" class="col-md-offset-5 col-md-2 pull-right">
                    <ul class="nav navbar-nav">
                      <li class="active dropdown singleDrop">
                        <a href="index.html">Inicio</a>
                      </li>
                      <li class="dropdown singleDrop">
                        <a href="#">Ayuda</a>
                      </li>
                      <li class="dropdown singleDrop">
                        <a href="login.php">Iniciar sesión</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </header>
        <?php
      }
       ?>

      <!--Cuerpo -->
      <div class="actividad container">
        <div class="row">
          <div class="col-md-9">
            <div class="datosAct">
              <h1 style="color:black">Título de la actividad</h1>
              <div class="tagLine">
                <h4><span style="color:black">Localidad </span> · resumen en 5 palabras</h4>
                <ul class="list-inline">
                  <li><a href="#">Tag1</a></li>
                  <li><a href="#">Tag2</a></li>
                  <li><a href="#">Tag3</a></li>
                  <li><a href="#">Tag4</a></li>
                </ul>
              </div>
            </div>
            <div class="horarioAct">

            </div>
          </div>
          <div class="col-md-3">
            <div class="affix">
              <h1> Esto es un titulaco </h1>
              <p>
              Los 4 Fantásticos es un equipo ficticio de superhéroes que aparece en cómics
              estadounidenses publicados por Marvel Comics. El grupo debutó en The Fantastic
              Four #1 (Noviembre de 1961), el cual ayudó a marcar el comienzo de un nuevo
              nivel de realismo en el medio. Los 4 Fantásticos fue el primer equipo de
              superhéroes creado por el escritor-editor Stan Lee y el artista Jack Kirby,
              quienes desarrollaron un enfoque de colaboración al crear cómics con este
              título que usarían a partir de entonces.
              </p>
            </div>
          </div>
        </div>
      </div>

<span style="display:block; height: 800px;"></span>

      <!-- FOOTER -->
      <footer>
        <div class="footer clearfix">
          <div class="container">
            <div class="row">
              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <a class="footer-logo" href="index.html">
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
