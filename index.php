<?php
session_start();
require 'funciones.php';

$logeado = isset($_SESSION['cod']);
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

    <title>Página principal</title>

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
      <div id="cuerpo">
        <div class="container">
          <div class="row">
            <h1><span style="color:black">Elige la actividad ideal para ti entre miles de opciones</span></h1>
          </div>
          <form class="row well" action="index.html" method="post">
            <div class="row buscadorArriba">
              <div class="col-md-12">
                <h4><label for="tag">¿Cuándo estás libre?</label></h4>
                <div class="col-md-5">
                  <div class="col-md-4">

                    <input type="checkbox" name="semana1" id="lunes" value="lunes"> lunes

                    <input type="text" class="form-control" id="inicioLunes" placeholder="inicio">
                    <input type="text" class="form-control" id="finLunes" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="semana2" id="martes" value="martes"> martes
                    <input type="text" class="form-control" id="inicioMartes" placeholder="inicio">
                    <input type="text" class="form-control" id="finMartes" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="semana3" id="miercoles" value="miercoles"> miercoles
                    <input type="text" class="form-control" id="inicioMiercoles" placeholder="inicio">
                    <input type="text" class="form-control" id="finMiercoles" placeholder="fin">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="col-md-4">
                    <input type="checkbox" name="semana4" id="jueves" value="jueves"> jueves
                    <input type="text" class="form-control" id="inicioJueves" placeholder="inicio">
                    <input type="text" class="form-control" id="finJueves" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="semana5" id="viernes" value="viernes"> viernes
                    <input type="text" class="form-control" id="inicioViernes" placeholder="inicio">
                    <input type="text" class="form-control" id="finViernes" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="semana6" id="sábado" value="sábado"> sábado
                    <input type="text" class="form-control" id="inicioSabado" placeholder="inicio">
                    <input type="text" class="form-control" id="finSabado" placeholder="fin">
                  </div>
                </div>
                <div class="col-md-2">
                  <input type="checkbox" name="semana7" id="domingo" value="domingo"> domingo
                  <input type="text" class="form-control" id="inicioDomingo" placeholder="inicio">
                  <input type="text" class="form-control" id="finDomingo" placeholder="fin">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h4><label for="localizacion">Dónde</label></h4>
                <input class="form-control input-lg" type="text" id="localizacion" placeholder="ciudad, provincia">
              </div>
              <div class="col-md-4 buscadorArriba">
                <h4><label for="tag">Actividad</label></h4>
                <input class="form-control input-lg" type="text" id="tag" placeholder="fútbol, inglés, natación...">
              </div>
              <div class="col-md-4">
                <button id="botonBuscar" type="submit" class="btn btn-primary btn-lg btn-block" name="button"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
              </div>
            </div>
          </form>
        </div>
      </div>





<span style="display:block; height: 1000px;"></span>


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
