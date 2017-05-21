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
          <form class="row well" action="buscarActividad.php" method="get">
            <div class="row buscadorArriba">
              <div class="col-md-12">
                <h4><label for="tag">¿Cuándo estás libre?</label></h4>
                <div class="col-md-5">
                  <div class="col-md-4">

                    <input type="checkbox" name="lunes" id="lunes" value="lunes"> lunes

                    <input type="text" name="iniLunes" class="form-control" id="inicioLunes" placeholder="inicio">
                    <input type="text" name="finLunes"class="form-control" id="finLunes" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="martes" id="martes" value="martes"> martes
                    <input type="text" name="iniMartes" class="form-control" id="inicioMartes" placeholder="inicio">
                    <input type="text" name="finMartes" class="form-control" id="finMartes" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="miercoles" id="miercoles" value="miercoles"> miercoles
                    <input type="text" name="iniMiercoles" class="form-control" id="inicioMiercoles" placeholder="inicio">
                    <input type="text" name="finMiercoles" class="form-control" id="finMiercoles" placeholder="fin">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="col-md-4">
                    <input type="checkbox" name="jueves" id="jueves" value="jueves"> jueves
                    <input type="text" name="iniJueves" class="form-control" id="inicioJueves" placeholder="inicio">
                    <input type="text" name="finJueves" class="form-control" id="finJueves" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="viernes" id="viernes" value="viernes"> viernes
                    <input type="text" name="iniViernes" class="form-control" id="inicioViernes" placeholder="inicio">
                    <input type="text" name="finViernes" class="form-control" id="finViernes" placeholder="fin">
                  </div>
                  <div class="col-md-4">
                    <input type="checkbox" name="sabado" id="sábado" value="sábado"> sábado
                    <input type="text" name="iniSabado" class="form-control" id="inicioSabado" placeholder="inicio">
                    <input type="text" name="finSabado" class="form-control" id="finSabado" placeholder="fin">
                  </div>
                </div>
                <div class="col-md-2">
                  <input type="checkbox" name="domingo" id="domingo" value="domingo"> domingo
                  <input type="text" name="iniDomingo" class="form-control" id="inicioDomingo" placeholder="inicio">
                  <input type="text" name="finDomingo" class="form-control" id="finDomingo" placeholder="fin">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h4><label for="localizacion">Dónde</label></h4>
                <input class="form-control input-lg" name="loc" type="text" id="localizacion" placeholder="ciudad, provincia">
              </div>
              <div class="col-md-4 buscadorArriba">
                <h4><label for="tag">Actividad</label></h4>
                <input class="form-control input-lg" name="tag-cat"type="text" id="tag" placeholder="fútbol, inglés, natación...">
              </div>
              <div class="col-md-4">
                <button id="botonBuscar" type="submit" class="btn btn-primary btn-lg btn-block" name="button"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
              </div>
            </div>
          </form>

          <span style="display:block; height: 220px;"></span>
          <!-- Vista de actividades más populares -->
          <div id="populares">
            <h1>Echa un ojo a las actividades más populares</h1>
            <?php
            $idAct = 1;
            $datosAct = consulta("call getDatosActividad(".$idAct.");");
            $nombreAct = $datosAct[0]['nombre'];
            $foto = $datosAct[0]['foto'];
            $valoracionMedia = $datosAct[0]['valoracionMedia'];
            $precio = $datosAct[0]['precio'];
            $provincia = $datosAct[0]['provincia'];
             ?>
            <div class="row">
              <div class="col-md-3">
                <a <?php echo("href=\"http://localhost/Extraescolario/perfilActividad.php?cod=". $idAct . "\""); ?>>
                  <?php echo('<img src="data:image/jpeg;base64,'.base64_encode( $foto ).'"/ style= "height: 290px; width: 200px;">'); ?>
                  <h4 style="margin-bottom: 0px;"><span style="color:#484848"><?php echo($precio . "€"); ?></span> <span style="color:grey; font-size: 14px;"> <?php echo($nombreAct); ?> </span></h4>
                  <?php
                  if($valoracionMedia==0) {?>
                    <i class="fa fa-star-o" aria-hidden="true"><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></i>
                    <?php
                  } else {
                    echo("<i class=\"fa fa-star\" aria-hidden=\"true\">");
                    for($x1=1; $x1<$valoracionMedia && $valoracionMedia>1; $x1++) {
                      echo("<i class=\"fa fa-star\" aria-hidden=\"true\"></i>");
                    }
                    echo("</i>");
                    if($valoracionMedia<5) {
                      echo("<i class=\"fa fa-star-o\" aria-hidden=\"true\">");
                      for($x2=$valoracionMedia+1; $x2<5 && $valoracionMedia<4; $x2++) {
                        echo("<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>");
                      }
                    }
                    echo("</i>");
                  }
                   ?>
                </a>

              </div>
              <div class="col-md-3"></div>
              <div class="col-md-3"></div>
            </div>
<span style="display:block; height: 20px;"></span>
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
