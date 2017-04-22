<!DOCTYPE html>
<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  /*HACEMOS UNA LLAMADA A LA BASE DE DATOS PARA EXTRAER INFORMACION*/

    $conUser = "call datosOFR(".$_SESSION['cod'].")";
    $resultado = mysqli_query ($conexion, $conUser);

?>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extraescolario Project">
    <meta name="author" content="Extraescolario Team">
    <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

    <title>Crear actividad</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Fuente de google -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Estilos custom -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css//font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Referencias para el calendario -->

  </head>
  <body>


  <!-- Header de la página -->
  <header>
    <nav class="navbar navbar-default navbar-main headerPrincipal" role="navigation">
      <div class="container-fluid">

        <!-- Logo y menu minimizado -->
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar1">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"></a>
        </div>

        <div class="collapse navbar-collapse navbar1">
          <ul class="nav navbar-nav" id="registroOFR">
            <li class="dropdown singleDrop">
              <a href="#">Oferta tus propias actividades</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active dropdown singleDrop">
              <a href="index.html">Inicio</a>
            </li>
            <li class="dropdown singleDrop">
              <a href="#">Ayuda</a>
            </li>
            <li class="dropdown singleDrop">
              <a href="#">Iniciar sesión</a>
            </li>
          </ul>
        </div> <!-- Fin collapse navbar1-->
      </div>
    </nav>
  </header>

    <div class="container-fluid">
      <!--Fila donde estaran las 3 columnas del form -->
      <div class="row">
            <!--Primera columna del form -->
        <div class="col-md-4">
          <form class="form-horizontal">
              <!-- InputNombreActividad -->
              <div class="form-group">

                <label class="col-md-4 control-label" for="nombreActividad">Nombre Actividad:</label>
                <div class="col-md-4">
                  <input class="form-control" id="nombreActividad" placeholder="Zumba" />
                </div>

              </div>
              <!-- Selector Provincia -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getProvincia">Provincia</label>
                <div class="col-md-4">
                  <select id="getProvincia" name="getProvincia" class="form-control">
                    <option value="1">Alicante</option>
                    <option value="2">Murcia</option>
                  </select>
                </div>
              </div>

              <!-- Selector Localidad -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getLocalidad">Localidad</label>
                <div class="col-md-4">
                  <select id="getLocalidad" name="getLocalidad" class="form-control">
                    <option value="1">Ibi</option>
                    <option value="2">Yecla</option>
                    <option value="">San Vicentel del Raspeig</option>
                  </select>
                </div>
              </div>

              <!-- Input Direccion-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getDireccion">Direccion</label>
                <div class="col-md-4">
                <input id="getDireccion" name="getDireccion" type="text" placeholder="Ej: C/ Alicante nº50" class="form-control input-md">

                </div>
              </div>

              <!-- Cargar Datos del Perfil -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getPerfil"></label>
                <div class="col-md-4">
                  <button id="getPerfil" name="getPerfil" class="btn btn-primary">Cargar datos del perfil</button>
                </div>
              </div>

              <!-- Input Fecha Inicio -->
              <div class="form-group ">
                       <label class="col-md-4 control-label" for="fechaInicio">
                         Fecha de inicio
                       </label>
                       <div class="col-md-4 input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-calendar">
                           </i>
                         </div>
                         <input class="form-control" id="fechaInicio" name="fechaInicio" placeholder="MM/DD/YYYY" type="text"/>
                       </div>
                     </div>
              <!-- Input Fecha Fin -->
              <div class="form-group ">
                          <label class="col-md-4 control-label" for="fechaFin">
                            Fecha de fin
                          </label>
                          <div class="col-md-4 input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar">
                              </i>
                            </div>
                            <input class="form-control" id="fechaFin" name="fechaFin" placeholder="MM/DD/YYYY" type="text"/>
                          </div>
                        </div>

              <div class row>
                <label class="col-md-4 control-label" >Dia Semana</label>
                <label class="col-md-4 control-label" >Hora Inicio</label>
                <label class="col-md-4 control-label" >Hora Fin</label>
              </div>

              <!-- Input horario lunes -->
              <div class row>
                <div class="col-md-4">
                  <label class="checkbox-inline" for="getLunes">
                    <input type="checkbox" name="getLunes" id="getLunes" value="1">
                    Lunes
                  </label>
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="lunesInicio"></label>
                        <input id="lunesInicio" name="lunesInicio" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="lunesFin"></label>
                        <input id="lunesFin" name="lunesFin" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
              </div>

              <!-- Input horario Martes -->
              <div class row>
                <div class="col-md-4">
                  <label class="checkbox-inline" for="getMartes">
                    <input type="checkbox" name="getMartes" id="getMartes" value="1">
                    Martes
                  </label>
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="martesInicio"></label>
                        <input id="martesInicio" name="martesInicio" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="martesFin"></label>
                        <input id="martesFin" name="martesFin" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
              </div>

              <!-- Input horario Miercoles -->
              <div class row>
                <div class="col-md-4">
                  <label class="checkbox-inline" for="getMiercoles">
                    <input type="checkbox" name="getMiercoles" id="getMiercoles" value="1">
                    Miercoles
                  </label>
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="miercolesInicio"></label>
                        <input id="miercolesInicio" name="miercolesInicio" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="miercolesFin"></label>
                        <input id="miercolesFin" name="miercolesFin" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
              </div>

              <!-- Input horario Jueves -->
              <div class row>
                <div class="col-md-4">
                  <label class="checkbox-inline" for="getJueves">
                    <input type="checkbox" name="getJueves" id="getJueves" value="1">
                    Jueves
                  </label>
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="juevesInicio"></label>
                        <input id="juevesInicio" name="juevesInicio" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="juevesFin"></label>
                        <input id="juevesFin" name="juevesFin" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
              </div>

              <!-- Input horario Viernes -->
              <div class row>
                <div class="col-md-4">
                  <label class="checkbox-inline" for="getViernes">
                    <input type="checkbox" name="getViernes" id="getViernes" value="1">
                    Viernes
                  </label>
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="viernesInicio"></label>
                        <input id="viernesInicio" name="viernesInicio" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="viernesFin"></label>
                        <input id="viernesFin" name="viernesFin" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
              </div>

              <!-- Input horario Sabado -->
              <div class row>
                <div class="col-md-4">
                  <label class="checkbox-inline" for="getSabado">
                    <input type="checkbox" name="getSabado" id="getSabado" value="1">
                    Sabado
                  </label>
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="sabadoInicio"></label>
                        <input id="sabadoInicio" name="sabadoInicio" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="sabadoFin"></label>
                        <input id="sabadoFin" name="sabadoFin" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
              </div>

              <!-- Input horario Domingo -->
              <div class row>
                <div class="col-md-4">
                  <label class="checkbox-inline" for="getDomingo">
                    <input type="checkbox" name="getDomingo" id="getDomingo" value="1">
                    Domingo
                  </label>
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="domingoInicio"></label>
                        <input id="domingoInicio" name="domingoInicio" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
                <div class="col-md-4">
                      <label class="col-md-4 control-label" for="domingoFin"></label>
                        <input id="domingoFin" name="domingoFin" type="text" placeholder="ej: 12:30" class="form-control input-md">
                </div>
              </div>


              <!-- Input precio actividad-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getPrecio">Precio</label>
                <div class="col-md-4">
                <input id="getPrecio" name="getPrecio" type="text" placeholder="Ej: 100" class="form-control input-md">

                </div>
              </div>

              <!-- Selector Multiple Forma de pago -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getFormaPago">Forma de Pago</label>
                <div class="col-md-4">
                  <select id="getFormaPago" name="getFormaPago" class="form-control" multiple="multiple">
                    <option value="1">Paypal</option>
                    <option value="2">Efectivo</option>
                    <option value="">Tarjeta</option>
                    <option value="">Transferencia</option>
                  </select>
                </div>
              </div>
          </form>
        </div>
          <!--Segunda columna del form -->
        <div class="col-md-4">
          <form class="form-horizontal">
            <p><b> Describe eso que hace a tu actividad tan especial</b></p>
            <!-- Input Descripcion actividad-->
            <div class="form-group">
              <label class="col-md-4 control-label" </label>
              <div class="col-md-4">
              <input id="getDescripcion" name="getDescripcion" type="text" style="width:380px; height:300px" placeholder="Ej: Clases intensivas con profesor especializado..." class="form-control input-md">
              </div>
            </div>

            <!-- Input Organización de pagos-->
            <div class="form-group">
              <label class="col-md-4 control-label" </label>
              <div class="col-md-4">
              <input id="getOrganizacion" name="getOrganizacion" type="text" style="width: 380px; height:150px" placeholder="Organizacion de pagos" class="form-control input-md">
              </div>
            </div>

            <!-- Boton Publicar Actividad -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="publicarActividad"></label>
              <div class="col-md-4">
                <button id="publicarActividad" name="publicarActividad" class="btn btn-primary">Publicar Actividad</button>
              </div>
            </div>
          </form>
        </div>

            <!--Tercera columna del form -->
              <div class="col-md-4">
                  <output id="img" class="margenimagen"> <img class="imagenperfil" src="img/fontaneria.jpg" > </output>
                  <div class="col-xs-6">
                    <input id="files" name="files" class="input-file" type="file">
                    <span class="help-block">Sube tu foto de la actividad aquí</span>
                  </div>
              </div>
              


            </div>
            <script src="js/showimg.js"></script>
      </div>
    </div>



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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
