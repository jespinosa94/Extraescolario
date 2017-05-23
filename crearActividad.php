<!DOCTYPE html>
<?php
  session_start();
  /* Incluimos la conexión predefinida*/
  require_once ("funciones.php");

  $logeado = isset($_SESSION['cod']);
  $esOFR = consulta("select esOFR(". $_SESSION['cod'] .")");
  if($logeado && $esOFR[0][0]) {
    $cod = $_SESSION['cod'];
  } else {
    header('Location: index.php');
  }



  $logeado = isset($_SESSION['cod']);
  if($logeado) {
    $cod = $_SESSION['cod'];
  }

  /*Recibimos los datos de la actividad a cargar*/
  $codActividad = 1;
  /*HACEMOS UNA LLAMADA A LA BASE DE DATOS PARA EXTRAER INFORMACION*/

    $conUser = "call datosOFR(".$_SESSION['cod'].")";

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
  <?php require_once('header.php'); ?>

  <form enctype="multipart/form-data" action="añadirActividad.php" method="post">
    <div class="container-fluid">

      <input type="hidden" name="codigoOfertador" value="<?php echo $cod?>">
      <!--Fila donde estaran las 3 columnas del form -->
      <div class="row">
        <!--Primera columna del form -->
        <div class="col-md-4">
              <div class="row">
                <!-- InputNombreActividad -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="nombreActividad">Nombre Actividad:</label>
                  <div class="col-md-4">
                    <input class="form-control" id="nombreActividad" name="nombreActividad" style="width:280px" required="" placeholder="Zumba"/>
                  </div>
                </div>
              </div>
            <div class="row">
              <!-- Selector Provincia -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="getProvincia">Provincia</label>
                <div class="col-md-4">

                  <select id="getProvincia" name="getProvincia" style="width:200px" onchange="cargaPueblo()" required="" class="form-control" style="width:150px">
                    <option value=""> Selecciona Provincia </option>
                    <!--php para rellenar el combo box-->
                    <?php for ($i = 0; $i < sizeof($provincias); $i++)
                    {  $rowProvincia = $provincias[$i] ; ?>
                  <option value="<?php echo $rowProvincia["cod"]; ?>"> <?php echo $rowProvincia["nombre"]; ?></option>
                  <?php } ?>
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
                  <select id="getLocalidad" name="getLocalidad" style="width:200px" required="" class="form-control" style="width:150px">
                    <option value=""> Selecciona localidad </option>
                  </select>
                </div>
              </div>
            </div>
            <br>
              <!-- Input Direccion-->
              <div class="row">
                <div class="form-group">
                  <label class="col-md-4 control-label" for="getDireccion">Direccion</label>
                  <div class="col-md-4">
                  <input id="getDireccion" name="getDireccion" type="text" style="width:300px" required="" placeholder="C/ Atrapame si puedes nº15" class="form-control input-md">
                  </div>
                </div>
              </div>
              <br>
              <!-- Input precio actividad-->
            <div class="row">
              <div class="form-group">
                <label class="col-md-4 control-label" for="getPrecio">Precio</label>
                <div class="col-md-4">
                <input id="getPrecio" name="getPrecio" type="text" required="" placeholder="Ej: 100" class="form-control input-md">
                </div>
              </div>
            </div>
            <br>
            <!-- Selector Multiple Forma de pago -->
            <div class="row">
              <div class="form-group">
                <label class="col-md-4 control-label" for="getFormaPago[]">Forma de Pago</label>
                <div class="col-md-4">
                  <select id="getFormaPago[]" name="getFormaPago[]" class="form-control" multiple="multiple" required="">
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
                         <input class="form-control" id="fechaInicio" name="fechaInicio" style="width:120px" required="" placeholder="YYYY-MM-DD" type="text"/>
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
                            <input class="form-control" id="fechaFin" name="fechaFin"style="width:120px" required="" placeholder="YYYY-MM-DD" type="text"/>
                          </div>
                        </div>
        </div>
        <!--Segunda columna del form -->
        <div class="col-md-4">
          <div class="row">
            <p><b> Describe eso que hace a tu actividad tan especial</b></p>
            <!-- Input Descripcion actividad-->
            <div class="form-group">
              <label class="col-md-4 control-label" </label>
              <div class="col-md-4">
              <input id="getDescripcion" name="getDescripcion" type="text" style="width:380px; height:320px" required="" placeholder="Introduce una descripcion de tu actividad " class="form-control input-md">
              </div>
            </div>
          </div>
            <!-- Input Organización de pagos-->
            <div class="row">
              <div class="form-group">
                <label class="col-md-4 control-label" for="getPeriodo">Periodo de pago</label>
                <div class="col-md-4">
                  <select  id="getPeriodoPago" name="getPeriodoPago" class="form-control" required="" style="width:150px">
                    <option value="mensual"> Mensual </option>
                    <option value="trimestral"> Trimestral </option>
                    <option value="anual"> Anual </option>
                  </select>
                </div>
              </div>
            </div>
            <br>
            <!-- Input Rango edad-->
            <div class="row">
              <div class="form-group">
                <label class="col-md-4 control-label" for="getRangoEdad">Rango de edad</label>
                <div class="col-md-4">
                  <select  id="getRangoEdad" name="getRangoEdad" class="form-control" required="" style="width:150px">
                    <option value="4-7 años"> De 4 a 7 años </option>
                    <option value="8-12 años"> De 8 a 12 años </option>
                    <option value="13-17 años"> De 13 a 17 años </option>
                    <option value="+18 años"> Mayores de 18 </option>
                    <option value="todos los publicos"> Todos los publicos </option>
                  </select>
                </div>
              </div>
            </div>
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

        </div>
      </div>
      <br><br>
      <!--Fila donde estan los botones del formulario-->
      <div class="row">
        <!-- Boton Publicar Actividad -->
        <div class="form-group">
          <label class="col-md-5 control-label" for="publicarActividad"></label>
          <div class="col-md-4">
            <button id="publicarActividad" name="publicarActividad" class="btn btn-primary">Publicar Actividad</button>
          </div>
        </div>
        <br>
        <!-- Link problemas con el formulario contactanos
        <div class="form-group">
          <label class="col-md-4 control-label" for="publicarNewsletter"></label>
          <div class="col-md-4">
            <button type="button" class="btn btn-link">¿Tienes problemas rellenando los campos? Contacta</button>
          </div>
        </div>-->
      </div>
      </div>
    </form>







      <!-- FOOTER -->
      <?php  require_once('footer.php'); ?>

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
