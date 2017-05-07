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
             <div id="datosAct">
              <h1 style="color:black">Título de la actividad</h1>
              <div class="tagLine">
                <h4><span style="color:black">Localidad </span> · dirección actividad</h4>
                <ul class="list-inline">
                  <li><a href="#">Tag1</a></li>
                  <li><a href="#">Tag2</a></li>
                  <li><a href="#">Tag3</a></li>
                  <li><a href="#">Tag4</a></li>
                </ul>
              </div>
            </div>
            <div id="horarioAct">
              <h4>Fecha de inicio: 23/04/2017 <i class="fa fa-calendar" aria-hidden="true"></i></h4>
              <h4>Fecha de fin: 25/04/2017 <i class="fa fa-calendar" aria-hidden="true"></i></h4>

              <h2>Horario:</h2>
              <h4>Lunes: 13:00 - 19:00</h4>
              <h4>Martes: 13:00 - 19:00</h4>
            </div>

            <div id="descAct">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <br><br><br>
              <div id="map" style="width:800px;height:400px;background:yellow"></div>
              <script>
                function myMap() {
                    var mapOptions = {
                        center: new google.maps.LatLng(38.267252, -0.697654),
                        zoom: 17,
                        mapTypeId: google.maps.MapTypeId.roadmap
                    }
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                }
              </script>
            </div>
            <div class="row">
              <h1>Evaluaciones de usuarios</h1>
              <div class="col-md-12 comentario">
                <div class="row">
                  <div class="col-md-2">
                    <img src="img/maleavatar.jpg" class= "img-circle" width="100px" height="100px">
                  </div>
                  <div class="col-md-10">
                    <h3>Nombre del pavo
                      <i class="fa fa-star" aria-hidden="true"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></i>
                    </h3>
                    <!-- <div id="stars-existing" class="starrr" data-rating='0'></div> -->
                    <h5>4 de mayo de 2017</h5>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="affix">
              <img src="img/negro.jpg" width="300px" height="500px" style="margin-bottom: 10px;">
              <div class="row">
                <div class="col-md-5">
                  <h5>Precio: <span style="color:grey">120€</span></h5>
                  <!-- <p>Detalles y formas de pago:
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
                </div>
                <div class="col-md-7">
                  <button type="button" class="btn btn-danger">Inscribirme!</button>
                  <div class="row lead" style="margin-left: 1px; margin-top: 4px;">
                    <i class="fa fa-star" aria-hidden="true"><i class="fa fa-star" aria-hidden="true"></i></i>
                  </div>
                </div>
              </div>
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


    <!--  Javascript del star rating-->
    <!-- <div id="stars-existing" class="starrr" data-rating='3'></div>
    <h5 style="margin-top: 2px;">Tu puntuación: <span id="count-existing">4</span></h5> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAS0MzQVgs_yEYyaslU5S5vrl9l8MkmsJQ&callback=myMap"></script>
    <script src="js/star_rating.js"></script>
  </body>
</html>
