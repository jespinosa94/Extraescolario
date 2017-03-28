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
      <div id="perfilbuscador" class = "container-fluid">
        <div class = "row text-center">
          <h2 class="col-xs-12"> Página personal de AmadorDePetanca </h2>
        </div>
        <!--Row tocho que tiene las 3 columnas dentro -->
        <div class= "row">
        	<!--Primera gran columna -->
        	<div class ="col-md-4">
        		<div class = "col-xs-12 row text-left">
					<label>
						<h3>Datos personales</h3>
					</label>
        		</div>
        		<!--Nick-->
        		<div class= "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="nick">Nick:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" type="password" for="pass">AmadorDePetanca</p>
             	</div>
             	<div class ="row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="cont">Contraseña:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="cont">12345</p>
             	</div>

             	<div class = "row">
		            <label class="col-xs-6 col-md-4 control-label text-left" for="correo">Email:</label>
		            <p class="col-xs-6 col-md-8 control-label text-left" for="correo">petanca@petanca.com</p>
			    </div>

			    <div class = "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="nombre">Nombre:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="nombre">Alfredo</p>
			    </div>

			    <div class = "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="apellidos">Apellidos:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="apellidos">Perales Gutiérrez</p> 
			    </div>

			    <div class = "row">
	                <label class="col-xs-4 control-label text-left" for="sexo">Sexo:</label>
	                <div class="col-xs-8"> 
	                  <label class="radio-inline" for="radios-0">
	                     <input type="radio" name="radios" id="sHombre" value="1" checked="checked">Hombre</label> 
	                  <label class="radio-inline" for="radios-1">
	                    <input type="radio" name="radios" id="sMujer" value="2">Mujer</label>
	                </div>
			    </div>

			    <div class = "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="fecnac">Fecha de Nacimiento:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="fecnac">24/09/1981</p> 
			    </div>

			    <div class = "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="telf">Teléfono:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="telf">678996332</p> 
			    </div>

			    <div class = "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="prov">Provincia:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="prov">Alicante</p> 
			    </div>

			    <div class = "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="loc">Localidad:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="loc">Benidorm</p> 
			    </div>

			    <div class = "row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="dir">Dirección:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="dir">C/ Zarrapastroso Nº 13</p> 
			    </div>
        	</div>
        	<!-- Segunda gran columna-->
        	<div class ="col-md-4">
        		<div class = "row text-left">
					<label>
						<h3>Actividades y suscripciones</h3>
					</label>
				</div>
				<div class="row col-xs-12">
					<label>
						<h3>Mis actividades</h3>
					</label>
				</div>
				<div class="row col-xs-12">
					<div class="container col-xs-12 col-sm-12">
		                <ul class="nav nav-tabs">
		                  <li class="active"><a href="#">Actividad</a></li>
		                  <li><a href="#">Actividad 1</a></li>
		                  <li><a href="#">Actividad 1</a></li>
		                  <li><a href="#">Actividad 3</a></li>
	                	</ul>
              		</div>
				</div>
				<div class="row col-xs-12">
					<h3 href="" class="btn">Mis suscripciones</h3>
				</div>
				<div class="row col-xs-12">
					<label>
						<h3>Mi calendario</h3>
					</label>
				</div>
				<div class="row col-xs-12">
					<!-- Aquí iría el calendario to guapo-->
				</div>
				<div class="row col-xs-12">
					<h3 href="" class="btn">Sincronizar calendario</h3>
				</div>

        	</div>
        	<div class ="col-md-4">
        		<div class = "row text-left">
					<label>
						<h3>Foto de perfil y aficiones</h3>
					</label>
				</div>
				<div class = "row text-left">
					<img src="img/maleavatar.jpg"></img>
				</div>
				<div class= "row text-left">
					<div>
						
					</div>
				</div>
        	</div>

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
