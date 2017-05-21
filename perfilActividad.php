<?php
session_start();
require 'funciones.php';

$logeado = isset($_SESSION['cod']);
$yaInscrito = 0;
$idAct = $_GET['cod'];
if($logeado) {
  $cod = $_SESSION['cod'];
  $yaInscrito = consulta("select comprobarBuscadorInscrito(".$_SESSION['cod']. "," .$idAct.");");
}
if(!$_GET) {
  header('Location: index.php');
}

$datosAct = consulta("call getDatosActividad(".$idAct.");");
$tagsAct = consulta("call getTagsActividad(".$idAct.");");
$catAct = consulta("call getCatsActividad(".$idAct.");");
//var_dump($datosAct);
//var_dump($tagsAct);
$nombreAct = $datosAct[0]['nombre'];
$fechaInicio = $datosAct[0]['fechaInicio'];
$fechaFin = $datosAct[0]['fechaFin'];
$foto = $datosAct[0]['foto'];
$descripcion = $datosAct[0]['descripcion'];
$valoracionMedia = $datosAct[0]['valoracionMedia'];
$precio = $datosAct[0]['precio'];
$pagosAceptados = $datosAct[0]['metodoPago'];
$mensualidades = $datosAct[0]['formaPago'];
$direccion = $datosAct[0]['direccion'];
$rangoEdad = $datosAct[0]['rangoEdad'];
$localidad = $datosAct[0]['localidad'];
$provincia = $datosAct[0]['provincia'];
$turnosAct = consulta("call getTurnosActividad(".$idAct.");");

$coordenadas = explode(",", getCoordinates($direccion . " " . $localidad . " " . $provincia . " Spain"));

//var_dump($coordenadas);
$lat = floatval($coordenadas[0]);
$long = floatval($coordenadas[1]);



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
             <div id="datosAct" class="row">
              <h1 style="color:black"><?php echo($nombreAct) ?></h1>

              <div class="tagLine">
                <h4><span style="color:black"><?php echo($localidad) ?>, <?php echo($provincia) ?> </span> · <?php echo($direccion) ?></h4>
                <ul class="list-inline">
                  <?php
                  $displayed = array();
                  for($z1=0; $z1<sizeof($tagsAct); $z1++) {
                    if(!in_array($tagsAct[$z1]["nombre"], $displayed)) {
                      echo("<li><a href=\"#\">".$tagsAct[$z1]["nombre"]."</a></li>");
                      array_push($displayed, $tagsAct[$z1]["nombre"]);
                    }
                  }
                  for($z1=0; $z1<sizeof($catAct); $z1++) {
                    if(!in_array($catAct[$z1]["nombre"], $displayed)) {
                      echo("<li><a href=\"#\">".$catAct[$z1]["nombre"]."</a></li>");
                      array_push($displayed, $catAct[$z1]["nombre"]);
                    }

                  }
                   ?>
                </ul>
              </div>
            </div>
            <div id="horarioAct" class="row">
              <h4>Fecha de inicio: <?php echo($fechaInicio);?> <i class="fa fa-calendar" aria-hidden="true"></i></h4>
              <h4>Fecha de fin: <?php echo($fechaFin); ?> <i class="fa fa-calendar" aria-hidden="true"></i></h4>
              <h2>Horario:</h2>

                <form action="inscribirse.php" method="post" name="inscripcion" id="formularioInscripcion">
                  <input type="hidden" name="idAct" value="<?php echo($idAct) ?>">
                  <?php
                     if(count($turnosAct)==0) {
                       echo("<h3>Esta actividad no tiene ningún grupo disponible actualmente</h3>");
                     } else {
                       $aux=false;
                       for($z1=0; $z1<sizeof($turnosAct); $z1++) {
                         if($aux==true) {?> <div class="row"> <?php }
                         ?>
                           <div class="col-md-4">
                             <div class="radio" id="radio<?php echo($z1+1)?>">
                               <h3>Turno <?php echo $z1+1 ?>
                                 <?php if($yaInscrito[0][0] == 0) {
                                    ?>
                                    <label>
                                      <input type="radio" name="radio" id="radioAct" value="<?php echo($turnosAct[$z1][0]); ?>" required>
                                    </label>
                                    <?php
                                 } ?>
                               </h3>
                             </div>

                             <?php
                             $horarioTurno = consulta("call getHorariosTurno(".$turnosAct[$z1][0].");");
                             for($x1=0; $x1<count($horarioTurno); $x1++) {
                              echo("<h4>" . $horarioTurno[$x1][0] . ": " . $horarioTurno[$x1][1] . "-" . $horarioTurno[$x1][2] . "</h4>");
                             }
                             ?>
                             </div>
                             <?php if($aux==true) {?> </div> <?php } ?>
                             <?php if($z1%3==0 && $z1!=0) $aux=true;?>
                         <?php
                         }
                     }
                      ?>
                </form>
            </div>

            <div id="descAct">
              <p><?php echo($descripcion) ?></p>
              <br><br><br>
              <div id="map" style="width:800px;height:400px;background:yellow"></div>
              <script>
              lat = '<?php echo $lat ;?>';
              long = '<?php echo $long ;?>';
              alert(spge);
                function myMap() {
                    var mapOptions = {
                        center: new google.maps.LatLng(lat, long),
                        // center: new google.maps.LatLng(38.267252, -0.697654),
                        zoom: 17,
                        mapTypeId: google.maps.MapTypeId.roadmap
                    }
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                }
              </script>
            </div>
            <div class="row">
              <h1>Evaluaciones de usuarios</h1>
              <?php
              $comentarios = consulta("call getValoracionesActividad(".$idAct.");");
              $dir = "img/";
              foreach($comentarios as $comentario) {
                $foto_usuario = $dir.$comentario['foto'];
                $nombre_usuario = $comentario['nombre'];
                $apellidos_usuario = $comentario['apellidos'];
                $valoracion = $comentario['valoracion'];
                $titulo = $comentario['titulo'];
                $fecha = $comentario['fecha'];
                $descripcion_comentario = $comentario['descripcion'];
                ?>
                <div id="comentario" class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-2">
                        <img src="<?php echo $foto_usuario; ?>" class= "img-circle" width="100px" height="100px">
                      </div>
                      <div class="col-md-10">
                        <h3> <?php echo($nombre_usuario . " " . $apellidos_usuario . " - " . $titulo . ": "); ?>
                          <?php
                          if($valoracion==0) {?>
                            <i class="fa fa-star-o" aria-hidden="true"><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></i>
                            <?php
                          } else {
                            echo("<i class=\"fa fa-star\" aria-hidden=\"true\">");
                            for($x1=1; $x1<$valoracion && $valoracion>1; $x1++) {
                              echo("<i class=\"fa fa-star\" aria-hidden=\"true\"></i>");
                            }
                            echo("</i>");
                            if($valoracion<5) {
                              echo("<i class=\"fa fa-star-o\" aria-hidden=\"true\">");
                              for($x2=$valoracion+1; $x2<5 && $valoracion<4; $x2++) {
                                echo("<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>");
                              }
                            }
                            echo("</i>");
                          }

                           ?>
                        </h3>
                        <!-- <div id="stars-existing" class="starrr" data-rating='0'></div> -->
                        <h5><?php echo($fecha)?></h5>
                      </div>
                      <p><?php echo($descripcion_comentario) ?></p>
                    </div>
                </div>
                </div>
              <?php
              }
               ?>
                <?php

                if($logeado) {
                  $puedeComentar = 0;
                  $puedeComentar = consulta("select puedeComentar(". $cod .", ". $idAct .");");
                  if($puedeComentar[0][0]==1) {
                    $query = consulta("call getDatosBUS(".$cod.");");
                    $foto_usuario_registrado = $dir.$query[0]['foto'];
                    $nombre_usuario_registrado = $query[0]['nombre'];
                    $apellidos_usuario_registrado = $query[0]['apellidos'];
                     ?>
                     <form action="comentar.php" method="post">
                       <div class="row" id="nuevoComentario">
                         <h1>Nuevo comentario: </h1>
                         <div class="col-md-12">
                           <div class="row">
                             <div class="col-md-2">
                               <img src="<?php echo($foto_usuario_registrado) ; ?>" class= "img-circle" width="100px" height="100px">
                             </div>
                             <div class="col-md-10">
                               <h3> <?php echo($nombre_usuario_registrado . " " . $apellidos_usuario_registrado . ": "); ?></h3>
                               <div class="form-group">
                                <label for="valoracion">Valoración:</label>
                                <select class="form-control" id="valoracion" name="valoracion">
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                               <div class="form-group">
                                <label for="titulo">Titulo:</label>
                                <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo del comentario" required>
                              </div>
                              <div class="form-group">
                               <label for="comentario">Comentario:</label>
                               <textarea name="comentario" class="form-control" rows="3" id=comentario placeholder="¿Qué opinas sobre la actividad?" required></textarea>
                             </div>
                             <input type="hidden" name="idAct" value="<?php echo($idAct); ?>">
                             <button type="submit" class="btn btn-primary btn-lg">Enviar comentario</button>
                             </div>
                           </div>
                         </div>
                       </div>
                     </form>
                     <?php
                  } else {
                    $haComentado = consulta("select haComentado(". $cod.", ". $idAct .")");
                    if(!$haComentado[0][0]) {
                      ?>
                      <h6>Aún no puedes comentar en la actividad, pero no te preocupes, te avisaremos cuando pase un tiempo para que valores la experiencia.</h6>
                      <?php
                    }
                  }
                }
                   ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="affix">
              <?php echo('<img src="data:image/jpeg;base64,'.base64_encode( $foto ).'"/ style= "height: 270px; width: 300px;">'); ?>
              <!-- <img src="img/negro.jpg" width="300px" height="500px" style="margin-bottom: 10px;"> -->
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-5">
                  <h5>Precio: <span style="color:grey"><?php echo($precio); ?>€</span></h5>
                  <!-- <p>Detalles y formas de pago:
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
                </div>
                <div class="col-md-7">
                  <?php if($yaInscrito[0][0] == 0) {
                     ?>
                     <button type="button" class="btn btn-danger" onclick="compruebaRadio()">Inscribirme!</button>
                     <?php
                  } else {
                     ?>
                     <form action="anularInscripcion.php" method="post" name="anularInscripcion" id="formularioAnularInscripcion">
                       <input type="hidden" name="idAct" value="<?php echo($idAct) ?>">
                       <button type="button" class="btn btn-danger" onclick="anularInscripcion.submit()">Anular inscripción</button>
                     </form>

                    <?php
                  } ?>
                  <script>
                    function compruebaRadio() {
                      if(atLeastOneRadio()) {
                        inscripcion.submit();
                      } else {
                        alert("Debes seleccionar un turno para poder inscribirte");
                      }
                    }
                    function atLeastOneRadio() {return ($('input[type=radio]:checked').size() > 0);}
                  </script>
                  <div class="row lead" style="margin-left: 1px; margin-top: 4px;">
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


    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="path/to/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<link href="path/to/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="path/to/js/star-rating.js" type="text/javascript"></script>

<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<script src="path/to/themes/krajee-svg/theme.js"></script>

<!-- optionally if you need translation for your language then include locale file as mentioned below -->
<script src="path/to/js/locales/{lang}.js"></script>
  </body>
</html>
