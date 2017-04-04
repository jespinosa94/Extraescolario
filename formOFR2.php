<!DOCTYPE html>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extraescolario Project">
    <meta name="author" content="Extraescolario Team">
    <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

    <title>Formulario Ofertador</title>

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

            <div class="collapse navbar-collapse" id="navbar1">
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

      <!--Cuerpo -->
      <div id="formOFR" class = "container-fluid">

        <div class = "row text-center">
          <h2 class="col-xs-12"> Primero necesitamos algunos datos </h2>
        </div>
        <form>
        <div class="row">
          <br><br><br><br>
            <!-- Text input-->
            <div class="form-group col-xs-12 col-sm-6">
              <label class="col-xs-6 control-label text-center" for="ne">Nombre de la empresa:</label>
              <div class="col-xs-6 ">
              <input id="ne" name="ne" placeholder="Ejemplo: goolge" class="form-control input-md" required="" type="text">
              <span class="help-block">Inserta el nombre de tu empresa aquí</span>
              </div>
            </div>

            <!-- File Button -->
            <div class="form-group col-xs-12 col-sm-6">
              <center>

                <div class="row">
                  <div class="col-xs-12">
                    <output id="img"></output>
                  </div>
                </div>

              </center>
              <label class="col-xs-6 control-label text-center" for="fpo">Foto de perfil:</label>
              <div class="col-xs-6">
                <input id="files" name="files" class="input-file" type="file">
                <span class="help-block">Sube tu foto de perfil aquí</span>
              </div>
            </div>
            <script src="lib/showimg.js"></script>

        </div>

        <div class="row">

            <!-- Text input-->
            <div class="form-group col-xs-12 col-sm-6">
              <label class="col-xs-6 control-label text-center" for="deo">Dirección de correo electrónico:</label>
              <div class="col-xs-6 ">
              <input id="deo" name="deo" placeholder="Ejemplo: loliflores@gmail.com" class="form-control input-md" required="" type="text">
              <span class="help-block">Inserta tu dirección de correo electrónico</span>
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group col-xs-12 col-sm-6">
              <label class="col-xs-6 control-label text-center" for="po">Introduce la contraseña:</label>
              <div class="col-xs-6">
                <input id="po" name="po" placeholder="" class="form-control input-md" required="" type="password">
                <span class="help-block">Introduce tu password</span>
              </div>
            </div>

        </div>

        <div class="row">

            <!-- Text input-->
            <div class="form-group col-xs-12 col-sm-6">
              <label class="col-xs-6 control-label text-center" for="to">Nº teléfono:</label>
              <div class="col-xs-6 ">
              <input id="to" name="to" placeholder="Ejemplo: 652987431" class="form-control input-md" required="" type="text">
              <span class="help-block">Introduce tu número de teléfono</span>
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group col-xs-12 col-sm-6">
              <label class="col-xs-6 control-label text-center" for="pov">Introduce la contraseña de verificación:</label>
              <div class="col-xs-6">
                <input id="pov" name="pov" placeholder="" class="form-control input-md" required="" type="password">
                <span class="help-block">Introduce tu password ppara verificar que es correcta</span>
              </div>
            </div>

        </div>

        <div class="row">

          <!-- Select Basic -->
          <div class="form-group col-xs-12 col-sm-6">
          <label class="col-xs-6 control-label text-center" for="slo">Localidad:</label>
          <div class="col-xs-6">
            <select id="slo" name="slo" class="form-control">
              <option value="1">Option one</option>
              <option value="2">Option two</option>
            </select>
          </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group col-xs-12 col-sm-6">
          <label class="col-xs-6 control-label text-center" for="spo">Provincia:</label>
          <div class="col-xs-6">
            <select id="spo" name="spo" class="form-control">
              <option value="1">Option one</option>
              <option value="2">Option two</option>
            </select>
          </div>
          </div>

        </div>


        <div class="row">

            <!-- Text input-->
            <div class="form-group col-xs-12 col-sm-6">
              <label class="col-xs-6 control-label text-center" for="do">Dirección:</label>
              <div class="col-xs-6 ">
              <input id="do" name="do" placeholder="Ejemplo: Almendratresmil" class="form-control input-md" required="" type="text">
              <span class="help-block">Introduce la deirección dende se sitúa tu empresa</span>
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group col-xs-12 col-sm-6">
              <label class="col-xs-6 control-label text-center" for="cifo"> NIF/CIF:</label>
              <div class="col-xs-6">
                <input id="cifo" name="cifocifo" placeholder="" class="form-control input-md" required="" type="text">
                <span class="help-block">Introduce tu tu Nº de identificación fiscal (NIF/CIF)</span>
              </div>
            </div>

        </div>

        <div class="row">
          <center>
          <!-- Button (Double) -->
          <div class="form-group col-xs-12" >
              <button id="fao" name="fao" class="btn btn-success">Aceptar</button>
              <button id="fro" name="fro" class="btn btn-danger">Rechazar</button>

          </div>
        </center>
        </div>

      </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
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
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
