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
      <?php require_once('header.php'); ?>


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
          <span style="display:block; height: 500px;"></span>
          <div id="populares">
            <a href="http://localhost/Extraescolario/perfilActividad.php?cod=1">
              <h1>Salta conmigo!</h1>
            </a>
          </div>
        </div>
      </div>

      <!-- FOOTER -->
      <?php  require_once('footer.php'); ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
