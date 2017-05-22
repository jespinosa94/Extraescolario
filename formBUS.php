<!DOCTYPE html>
<!--<script language="JavaScript" type="text/javascript" src="js/valOFR.js"></script>-->
<?php

session_start();
require_once ("conexion.php");
require_once ("funciones.php");

$sqlProvincias = "call getAllProvincias()";
$provincias = consulta($sqlProvincias);
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $nombree=$_POST['nombreempresa'];
  echo $nombree;
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

    <title>Formulario Buscador</title>

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
        <div class="row margen">

          <form name= "form1" enctype="multipart/form-data" method="post" action = "insertarDatosBUS.php" id= "formularioBUS" onsubmit="return validar_Todo()">


          <div class="col-xs-12 col-md-6">
<!--// 1a columna ===============================================================================================================-->


              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for=nombreempresa>Nombre:</label>
                <div class="col-xs-6 ">
                <input id=nombreempresa name=nombreempresa placeholder="Mario" class="form-control input-md" required="" type="text">
                <span class="help-block">Inserta tu nombre aquí</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for=apellidos>Apellido:</label>
                <div class="col-xs-6 ">
                <input id=apellidos name=apellidos placeholder="Bross" class="form-control input-md" required="" type="text">
                <span class="help-block">Inserta tu apellido aquí</span>
                </div>
              </div>

              <!-- Multiple Radios -->
              <div class="form-group">
                <label class="col-xs-6 control-label text-center" for="sexo">Selecciona tu sexo:  </label>
                <div class="col-md-6">
                <div class="radio">
                  <label for="sexo-0">
                    <input name="sexo" id="sexo-0" value="Hombre" checked="checked" type="radio">
                    Hombre
                  </label>
              	</div>
                <div class="radio">
                  <label for="sexo-1">
                    <input name="sexo" id="sexo-1" value="Mujer" type="radio">
                    Mujer
                  </label>
              	</div>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="correoempresa">Dirección de correo electrónico:</label>
                <div class="col-xs-6 ">
                <input id=correoempresa name=correoempresa placeholder="Ejemplo: mariolovespeach@gmail.com" class="form-control input-md" required="" type="text" onchange="validar_Email()">
                <span class="help-block">Inserta tu dirección de correo electrónico</span>
                </div>
              </div>

              <!-- Password input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="pass1">Introduce la contraseña:</label>
                <div class="col-xs-6">
                  <input id="pass1" name="pass1" placeholder="" class="form-control input-md" required="" type="password" onchange="validar_Pass1()">
                  <span class="help-block">Introduce tu password</span>
                </div>
              </div>

              <!-- Password input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="pass2">Introduce la contraseña de verificación:</label>
                <div class="col-xs-6">
                  <input id="pass2" name="pass2" placeholder="" class="form-control input-md" required="" type="password" onchange="validar_Pass()">
                  <span class="help-block">Introduce tu password para verificar que es correcta</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="telefonoempresa">Nº teléfono:</label>
                <div class="col-xs-6 ">
                <input id="telefonoempresa" name="telefonoempresa" placeholder="Ejemplo: 652987431" class="form-control input-md" required="" type="text" onchange="validar_Telef()">
                <span class="help-block">Introduce tu número de teléfono</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="direccionempresa">Dirección:</label>
                <div class="col-xs-6 ">
                <input id="direccionempresa" name="direccionempresa" placeholder="Ejemplo: Castillo Bowser nº2" class="form-control input-md" required="" type="text">
                <span class="help-block">Introduce la deirección dende se sitúa tu empresa</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="fechan">Fecha de Nacimiento</label>
                <div class="col-xs-6">
                  <input id="fechan" name="fechan" placeholder="1985-8-13" class="form-control input-md" required="" type="text" onchange="validar_Fecha()">
                  <span class="help-block">Introduce tu fecha de nacimiento</span>
                </div>
              </div>




<!-- fin 1a columna ===============================================================================================================-->
          </div>

          <div class="col-xs-12 col-md-6 ">
<!-- 2a columna ===============================================================================================================-->
            <div class="form-group row">
              <center>

                <div class="row">
                  <div class="col-xs-12">

                    <output id="img" class="margenimagen"> <img class="imagenperfil" src="img/mario.jpg" > </output>
                  </div>
                </div>

              </center>
              <label class="col-xs-6 control-label text-center" for="files">Foto de perfil:</label>
              <div class="col-xs-6">
                <input id="files" name="files" class="input-file" type="file">
                <span class="help-block">Sube tu foto de perfil aquí</span>
              </div>
            </div>
            <script src="js/showimg.js"></script>

            <!-- Select Basic -->
            <div class="form-group row">
            <label class="col-xs-6 control-label text-center" for="provincia">Provincia:</label>
            <div class="col-xs-6">
              <select id="provincia" name="provincia" class="form-control" onchange="cargaPueblo()">
                <option value=""> Select Provincia </option>
                  <!--php para rellenar el combo box-->
                  <?php for ($i = 0; $i < sizeof($provincias); $i++)
                  {
                    $rowProvincia = $provincias[$i] ; ?>
                    <option value="<?php echo $rowProvincia["cod"]; ?>"> <?php echo $rowProvincia["nombre"]; ?></option>
            <?php } ?>
              </select>
            </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group row">
            <label class="col-xs-6 control-label text-center" for="localidad">Localidad:</label>
            <div class="col-xs-6">
              <select id="localidad" name="localidad" class="form-control">
                <option value="1">Select localidad</option>
              </select>
            </div>
            </div>



            <!-- Text input
            (this.value) pasa como parámetro el valor del input
            si el navegador no tiene html 5 el requierd no funciona
          -->
            <div class="form-group row">
              <label class="col-xs-6 control-label text-center" for="nicko"> Nick:</label>
              <div class="col-xs-6">
                <input id="nicko" name="nicko" placeholder="MB.BOSS" class="form-control input-md" required="" type="text" onChange="validar_Nick()">
                <span id= "nickwarning" class="help-block">Introduce tu nick</span>
              </div>
            </div>



<!--// fin 2a columna ===============================================================================================================-->
          </div>

        </div>

        <div class="row">
          <center>
          <!-- Button (Double) -->
          <div class="form-group col-xs-12" >
              <button id="fao" name="formaceptar" class="btn btn-success" type="submit">Aceptar</button>
              <button id="fro" name="formrechazar" class="btn btn-danger" type="reset">Borrar todo</button>

          </div>
        </center>
        </div>
        </form>


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
                    Estamos a tu diprovinciasición los 7 días de la semana.
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
    <script src="js/valBUS.js"></script>
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>

    <script type="text/JavaScript">
    function cargaPueblo() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "ajax.php?pueblo="+document.getElementById("provincia").value, false);
      xmlhttp.send(null);
      //alert(xmlhttp.responseText); //Muestra la respuesta del documento ajax.php
      document.getElementById("localidad").innerHTML=xmlhttp.responseText;
    }
    </script>

    <!--<script type="text/JavaScript">
    function compruebaNicka() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "ajax.php?pueblo="+document.getElementById("provincia").value, false);
      xmlhttp.send(null);
      //alert(xmlhttp.responseText); //Muestra la respuesta del documento ajax.php
      document.getElementById("localidad").innerHTML=xmlhttp.responseText;
    }
  </script> -->
  </body>
  <!--Se pone siempre después del body la carga de librerias para que no se ralentice la página y el hatml se cargue rápido -->
  <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous">
  </script>
</html>
