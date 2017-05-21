<!DOCTYPE html>
<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  /*Directorio en el que se encuentras las imágenes: OJO, se tiene que usar esa barra, si
  pones la otra, no se queja pero no hace nada*/
    $dir = "img/";

  /*Realizamos una primera llamadaa la BBDD para extraer la información del usuario*/         
    $conUser = "call getDatosBUS(".$_SESSION['cod'].");";
    $obtenActiv= "call getACTS(".$_SESSION['cod'].");";

    $datosUsuario = consulta($conUser);
    $datosAct = consulta($obtenActiv);

    $nickUser = $datosUsuario[0]["nick"];
    $emailUser = $datosUsuario[0]["email"];
    $passUser = $datosUsuario[0]["contrasenya"];
    $telefUser = $datosUsuario[0]["telefono"];
    $fotoUser= $dir.$datosUsuario[0]["foto"];
    $provinciaUser = $datosUsuario[0]["pNombre"];
    $localidadUser = $datosUsuario[0]["lNombre"];
    $direccionUser = $datosUsuario[0]["direccion"];
    $nombreUser = $datosUsuario[0]["nombre"];
    $apellidosUser = $datosUsuario[0]["apellidos"];
    $fechaNacUser = $datosUsuario[0]["fechaNacimiento"];
    $sexoUser = $datosUsuario[0]["sexo"];

    /*while ($datosActiv = mysqli_fetch_array($resultado)) {
      $codAct = $datosActiv["cod"];
      $nombreAct = $datosActiv["nombre"];
      $direccionAct = $datosActiv["direccion"];
      $descripcionAct = $datosActiv["descripcion"];
    }

    /*$resultDatosACT = mysqli_query($conexion, $obtenActiv);

    while ($datosActividad = mysqli_fetch_array($resultDatosACT)) {
      $codAct = $datosActividad["cod"];
      echo $codAct;
      $nombreAct = $datosActividad["nombre"];
      echo $nombreAct;
      $direccionAct = $datosActividad["direccion"];
      $descripcionAct = $datosActividad["descripcion"];
    }*/
?>




<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extraescolario Project">
    <meta name="author" content="Extraescolario Team">
    <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

    <title>Perfil Buscador</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Fuente de google -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Estilos custom -->
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css//font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="stylesheet" type="text/css" href="">
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
          <h2 class="col-xs-12"> Página personal de <?php echo $nickUser; ?> </h2>
        </div>
        <!--Row tocho que tiene las 3 columnas dentro -->
        <div class= "row align-items-center">
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
		            <p class="con-xs-6 col-md-8 control-label text-left" type="password" for="pass"><?php echo $nickUser?></p>
             	</div>
             	<div class ="row">
	                <label class="col-xs-6 col-md-4 control-label text-left" for="cont">Contraseña:</label>
		            <p class="con-xs-6 col-md-8 control-label text-left" for="cont">¡Es secreta!</p>
             	</div>

             	<div class = "row">
		            <label class="col-xs-6 col-md-4 control-label text-left" for="correo">Email:</label>
		            <p class="col-xs-6 col-md-8 control-label text-left" for="correo"><?php echo $emailUser?></p>
			        </div>

    			    <div class = "row">
    	                <label class="col-xs-6 col-md-4 control-label text-left" for="nombre">Nombre:</label>
    		            <p class="con-xs-6 col-md-8 control-label text-left" for="nombre"><?php echo $nombreUser?></p>
    			    </div>

    			    <div class = "row">
    	                <label class="col-xs-6 col-md-4 control-label text-left" for="apellidos">Apellidos:</label>
    		            <p class="con-xs-6 col-md-8 control-label text-left" for="apellidos"><?php echo $apellidosUser?></p> 
    			    </div>

			        <div class = "row">
                    <label class="col-xs-6 col-md-4 control-label text-left" for="apellidos">Sexo:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="apellidos"><?php echo $sexoUser?></p> 
                <!--
	                <label class="col-xs-4 control-label text-left" for="sexo">Sexo:</label>
	                <div class="col-xs-8"> 
	                  <label class="radio-inline" for="radios-0">
	                     <input type="radio" name="radios" id="sHombre" value="1" checked="<?php if ($sexoUser="Mujer") {echo false;}?>"       >Hombre</label> 
	                  <label class="radio-inline" for="radios-1">
	                    <input type="radio" name="radios" id="sMujer" value="2" checked="<?php if ($sexoUser="Mujer") {echo true;}?>"         >Mujer</label>
	                </div> -->
    			    </div>
    			    <div class = "row">
    	                <label class="col-xs-6 col-md-4 control-label text-left" for="fecnac">Fecha de Nacimiento:</label>
    		            <p class="con-xs-6 col-md-8 control-label text-left" for="fecnac"><?php echo $fechaNacUser?></p> 
    			    </div>

    			    <div class = "row">
    	                <label class="col-xs-6 col-md-4 control-label text-left" for="telf">Teléfono:</label>
    		            <p class="con-xs-6 col-md-8 control-label text-left" for="telf"><?php echo $telefUser?></p> 
    			    </div>

    			    <div class = "row">
    	                <label class="col-xs-6 col-md-4 control-label text-left" for="prov">Provincia:</label>
    		            <p class="con-xs-6 col-md-8 control-label text-left" for="prov"><?php echo $provinciaUser?></p> 
    			    </div>

    			    <div class = "row">
    	                <label class="col-xs-6 col-md-4 control-label text-left" for="loc">Localidad:</label>
    		            <p class="con-xs-6 col-md-8 control-label text-left" for="loc"><?php echo $localidadUser ?></p> 
    			    </div>

    			    <div class = "row">
    	                <label class="col-xs-6 col-md-4 control-label text-left" for="dir">Dirección:</label>
    		            <p class="con-xs-6 col-md-8 control-label text-left" for="dir"><?php echo $direccionUser?></p> 
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
          <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <!-- <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>-->
                            <?php for($i = 0; $i< sizeof($datosAct); $i++)  { $actividad = $datosAct[$i];?>
                              <li><a href="<?php echo $var="#tab".$actividad["cod"]?>" data-toggle="tab"><?php echo $actividad["nombre"]?></a></li>
                            <?php  } ?>
                            <?php if (sizeof($datosAct) > 4) { ?>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php for($i = 5; $i< sizeof($datosAct); $i++)  { $actividad = $datosAct[$i];?>
                                      <li><a href="<?php echo $var="#tab".$actividad["cod"]?>" data-toggle="tab"><?php echo $actividad["nombre"]?></a></li>
                                    <?php  } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                          <!--<div class="tab-pane fade in active" id="#tab1"><?php echo $datosAct[0]["descripcion"] ?></div>-->
                          <?php for($i = 0; $i< sizeof($datosAct); $i++)  { $actividad = $datosAct[$i]; ?>
                            <div class="tab-pane fade" id="<?php echo $var="tab".$actividad["cod"]?>">
                              <div class="row col-xs-12"> <?php echo $actividad["descripcion"] ?><br><br></div>
                                <div class="row align-items-center">
                                  <!-- Realizamos la consulta para saber el número de turnos que tiene esa actividad, pero no la utilizamos
                                  porque la cosa cambió XD-->
                                  <?php $numTurnos = consulta("select getNumTurnosACT(".$_SESSION['cod'].",".$actividad["cod"].")"); ?>

                                    <div class="col-md-4">
                                      Horarios:
                                    </div>
                                    <!-- Realizamos la consultad de los horarios-->
                                    <?php
                                    $buscahorarios = "call getHorariosACT(".$_SESSION['cod'].",".$actividad["cod"].");";
                                    $horarios = consulta($buscahorarios);

                                    ?>
                                    <div class="col-md-8"> <?php 
                                      for ($y = 0; $y < sizeof($horarios); $y++) { ?>
                                        <div class="col-xs-4">
                                            <?php $diaHorario = $horarios[$y]; ?>
                                            <div class="row col-xs-12"><?php echo $diaHorario["diaSemana"]?><br></div>
                                            <div class="row col-xs-12"><?php echo $diaHorario["horaInicio"]?><br></div>
                                            <div class="row col-xs-12"><?php echo $diaHorario["horaFin"]?><br><br></div>
                                        </div>
                                      <?php } ?>
                                    </div>
                                </div>                             
                            </div>
                          <!-- <div class="tab-pane fade" id="tab3default">Default 3</div> -->
                          <?php } ?>
                    </div>
                </div>
            </div>
				</div>
				<div class="row col-xs-12">
          <a href="" class="btn" onclick="abreSuscripciones()" >Mis suscripciones</a>
				</div>
				<div class="row col-xs-12">
					<label>
						<h3>Actividades para la próxima semana</h3>
					</label>
				</div>
				<div class="row col-xs-12">
					<img src="img/calendario.jpg" width="300px" height="300px"></img>
				</div>
        	</div>
        	<div class ="col-md-4">
        		<div class = "row text-left">
    					<label>
    						<h3>Foto de perfil y aficiones</h3>
    					</label>
				    </div>
    				<div class = "row text-left">
    					<img src="<?php echo $fotoUser; ?>" onerror="this.src='img/Maleavatar.jpg'" width="300px" height="300px"><br><br></img>
    				</div>
    				<div class= "row text-left">
    					<div>
                <label>
                  <?php
                    // Preparamos las consultas de tags y categorías, y las realizamos
                    $consultaTags ="call getTAGS_USR(".$_SESSION['cod'].");";
                    $consultaCategor ="call getCATS_USR(".$_SESSION['cod'].");";
                    $categorias = consulta($consultaCategor);
                    $tags = consulta($consultaTags);

                    for($z1=0; $z1<sizeof($categorias); $z1++) { ?>
                      <p> <?php echo $categorias[$z1]["nombre"]?><br></p>
                    <?php }
                    for($z2=0; $z2<sizeof($tags); $z2++) { ?>
                      <p> <?php echo $tags[$z2]["nombre"]?><br></p>
                    <?php } ?>
                </label>
					   </div>
				    </div>
        	</div>
        </div>
        <!-- Row con los botones-->
        <div class= "row col-xs-12">
          <div class="span4 offset4 text-center">
            <button class="btn btn-primary">Editar Perfil</button>
            <button class="btn btn-default">Volver</button>
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
    <script>
      function abreSuscripciones() {
        var myWindow = window.open("http://localhost/Extraescolario/newsletter.php", "suscris", "width=800,height=600");
      }

    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
    <script src="js/calendario.js"></script>
  </body>
</html>
