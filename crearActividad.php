<!DOCTYPE html>
<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  /*Recibimos los datos de la actividad a cargar*/
  $codActividad = 1;
  /*HACEMOS UNA LLAMADA A LA BASE DE DATOS PARA EXTRAER INFORMACION*/

    $conUser = "call datosOFR(".$_SESSION['cod'].")";
    $resultado = mysqli_query ($conexion, $conUser);

    /*Preparamos y ejecutamosla query de usuarios NO ACEPTADOS en la actividad*/
    $sqlUsuariosNoAceptados = "call getUsuariosNoAceptados($codActividad)";
    $usuariosNoAceptados = consulta($sqlUsuariosNoAceptados);

    /*Preparamos y ejecutamos la query de usuarios ACEPTADOS en la actividad*/
    $sqlUsuariosAceptados = "call getUsuariosAceptados($codActividad)";
    $usuariosAceptados = consulta($sqlUsuariosAceptados);

    /*Preparamos y ejecutamos la query de los datos de la actividad*/
    $sqlCargarDatosActividad = "call getDatosActividad($codActividad)";
    $cargarDatosActividad = consulta($sqlCargarDatosActividad);

    /*Preparamos y ejecutamos la query del horario de la actividad*/
    $sqlHorarioActividad = "call getHorarioActividad($codActividad)";
    $horario = consulta($sqlHorarioActividad);

    /*Preparamos y ejecutamos la query que carga las provincias*/
    $sqlProvincias = "call getAllProvincias()";
    $provincias = consulta($sqlProvincias);

    /*Preparamos y ejecutamos la query que carga los pueblos de una provincia*/
    $row = $cargarDatosActividad[0];
    $provi = $row["codProvincia"];
    $localidades = consulta("call getLocalidades($provi)");
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
              <a href="index.php">Inicio</a>
            </li>
            <li class="dropdown singleDrop">
              <a href="#">Ayuda</a>
            </li>
            <li class="dropdown singleDrop">
              <a href="login.php">Iniciar sesión</a>
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
              <div class="row">
                <!-- InputNombreActividad -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="nombreActividad">Nombre Actividad:</label>
                  <div class="col-md-4">
                    <input class="form-control" id="nombreActividad" style="width:280px" placeholder="Zumba"/>
                  </div>
                </div>
              </div>
            <div class="row">
              <!-- Selector Provincia -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getProvincia">Provincia</label>
                <div class="col-md-4">
                  <select id="getProvincia" name="getProvincia" style="width:200px" onchange="cargaPueblo()" class="form-control" style="width:150px">
                    <option value=""> Selecciona Provincia </option>
                    <!--php para rellenar el combo box-->
                    <?php for ($i = 0; $i < sizeof($provincias); $i++)
                    {  $rowProvincia = $provincias[$i] ; ?>
                  <option value="<?php echo $rowProvincia["cod"]; ?>"> <?php echo $rowProvincia["nombre"]; ?></option>
                  <?php } ?>
                </select>
                  </select>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <!-- Selector Localidad -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getLocalidad">Localidad</label>
                <div class="col-md-4">
                  <select id="getLocalidad" name="getLocalidad" style="width:200px" class="form-control" style="width:150px">
                    <option value=""> Selecciona localidad </option>
                  </select>
                </div>
              </div>
            </div>
            <br>
              <div class="row">
                <!-- Input Direccion-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="getDireccion">Direccion</label>
                  <div class="col-md-4">
                  <input id="getDireccion" name="getDireccion" type="text" style="width:300px" value="<?php echo $cargarDatosActividad[0]["direccion"];?>" class="form-control input-md">
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <!-- Input precio actividad-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getPrecio">Precio</label>
                <div class="col-md-4">
                <input id="getPrecio" name="getPrecio" type="text" placeholder="Ej: 100" class="form-control input-md">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <!-- Selector Multiple Forma de pago -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getFormaPago">Forma de Pago</label>
                <div class="col-md-4">
                  <select id="getFormaPago" name="getFormaPago" class="form-control" multiple="multiple">
                    <option value="Paypal">Paypal</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Transferencia">Transferencia</option>
                  </select>
                </div>
              </div>
            </div>
              <br>

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
                         <input class="form-control" id="fechaInicio" name="fechaInicio" style="width:120px" placeholder="MM/DD/YYYY" type="text"/>
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
                            <input class="form-control" id="fechaFin" name="fechaFin"style="width:120px" placeholder="MM/DD/YYYY" type="text"/>
                          </div>
                        </div>
        </div>
        <!--Segunda columna del form -->
        <div class="col-md-4">
          <form class="form-horizontal">
            <p><b> Describe eso que hace a tu actividad tan especial</b></p>
            <!-- Input Descripcion actividad-->
            <div class="form-group">
              <label class="col-md-4 control-label" </label>
              <div class="col-md-4">
              <input id="getDescripcion" name="getDescripcion" type="text" style="width:380px; height:320px" placeholder="Introduce una descripcion de tu actividad " class="form-control input-md">
              </div>
            </div>

            <!-- Input Organización de pagos-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="getPeriodo">Periodo de pago</label>
              <div class="col-md-4">
                <select  id="getPeriodoPago" name="periodoPago" class="form-control" style="width:150px">
                  <option value="mensual"> Mensual </option>
                  <option value="trimestral"> Trimestral </option>
                  <option value="anual"> Anual </option>
                </select>
              </div>
            </div>

            <!-- Input Rango edad-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="getRango">Rango de edad</label>
              <div class="col-md-4">
                <select  id="getRangoEdad" name="rangoEdad" class="form-control" style="width:150px">
                  <option value="4-7 años"> De 4 a 7 años </option>
                  <option value="8-12 años"> De 8 a 12 años </option>
                  <option value="13-17"> De 13 a 17 años </option>
                  <option value="+18 años"> Mayores de 18 </option>
                  <option value="todos los publicos"> Todos los publicos </option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <!--Tercera columna del form -->
        <div class="col-md-4" >
                <!--Cargamos la imagen de la bd-->
                  <output id="img" class="margenimagen"> <img class="imagenperfil" src="img/fontaneria.jpg" > </output>
                  <div class="col-xs-6">
                    <input id="files" name="files" class="input-file" type="file">
                    <span class="help-block">Sube tu foto de la actividad aquí</span>
                  </div>
                  <script src="js/showimg.js"></script>
        </div>
      </div>
      <!--Fila donde estan los horarios y las tablas de usuarios inscritos-->
      <div class="row">
        <!--Columna de los horarios-->
        <div class="col-md-8">
            <!-- TABLA DEL HORARIO -->
            <h4>Horarios de la actividad</h4>
            <table id="horarios">
                <tr>
                  <th style="width:150px" align="center">Dia de la semana</th>
                  <th style="width:150px" align="center">Hora de inicio</th>
                  <th style="width:150px" align="center">Hora de fin</th>
                  <th style="width:100px" align="center"></th>
                </tr>
                <?php for ($i = 0; $i< sizeof($horario); $i++)
                {
                  $rowHorario = $horario[$i]; ?>
                <tr>
                    <td> <?php echo $rowHorario["diaSemana"]?></td>
                    <td> <?php echo $rowHorario["horaInicio"]?></td>
                    <td> <?php echo $rowHorario["horaFin"]?></td>
                    <!-- Creamos boton dentro de la celda -->
                    <td>
                      <form action="eliminarTurno.php" method="post">
                        <input type="hidden" name="codTurno" value="<?php echo $rowHorario["rTurno"]?>">
                        <input type="hidden" name="codDia" value="<?php echo $rowHorario["rDias"]?>">
                        <input type="hidden" name="codFranja" value="<?php echo $rowHorario["rFranja"]?>">
                        <button type="submit">Eliminar</button>
                      </form>
                    </td>

                </tr>
                <?php } ?>
                <tr>
                  <form action="añadirTurno.php" method="post">
                    <td >
                      <input type="hidden" name="codActividad" value="<?php echo $codActividad?>">
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="seleccionarDia"></label>
                        <div class="col-md-11">
                          <select id="seleccionarDia" name="seleccionarDia" class="form-control">
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miercoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sabado</option>
                            <option value="7">Domingo</option>
                          </select>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="horaInicio"></label>
                        <div class="col-md-11">
                          <input id="horaInicio" name="horaInicio" type="text" class="form-control input-md">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="horaInicio"></label>
                        <div class="col-md-11">
                          <input id="horaFin" name="horaFin" type="text" class="form-control input-md">
                        </div>
                      </div>
                    </td>

                    <td>
                        <button type="submit">Añadir Turno</button>
                    </td>
                </form>
                </tr>
              </table>


        </div>
      </div>
      <br><br>
      <!--Fila donde estan los botones del formulario-->
      <div class="row">
        <!-- Boton Publicar Actividad -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="publicarActividad"></label>
          <div class="col-md-4">
            <button id="publicarActividad" name="publicarActividad" class="btn btn-primary">Publicar Actividad</button>
          </div>
        </div>
        <!-- Link problemas con el formulario contactanos-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="publicarNewsletter"></label>
          <div class="col-md-4">
            <button type="button" class="btn btn-link">¿Tienes problemas rellenando los campos? Contacta</button>
          </div>
        </div>
      </div>
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

    <script type="text/JavaScript">
    function cargaPueblo() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "ajax.php?pueblo="+document.getElementById("getProvincia").value, false);
      xmlhttp.send(null);
      //alert(xmlhttp.responseText); //Muestra la respuesta del documento ajax.php
      document.getElementById("getLocalidad").innerHTML=xmlhttp.responseText;
    }
    </script>

  </body>
</html>
