<!DOCTYPE html>
<!--<script language="JavaScript" type="text/javascript" src="js/valOFR.js"></script>-->
<?php

session_start();
require_once ("conexion.php");
require_once ("funciones.php");
$logeado = isset($_SESSION['cod']);

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
      <?php require_once('header.php'); ?>

      <!--Cuerpo -->
      <div id="formOFR" class = "container-fluid">

        <div class = "row text-center">
          <h2 class="col-xs-12"> Primero necesitamos algunos datos </h2>
        </div>
        <div class="row margen">

          <form name= "form1" enctype="multipart/form-data" method="post" action = "insertarDatosOFR.php" id= "formularioOFR" onsubmit="return validar_Todo()">


          <div class="col-xs-12 col-md-6">
<!--// 1a columna ===============================================================================================================-->


              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for=nombreempresa>Nombre de la empresa:</label>
                <div class="col-xs-6 ">
                <input id=nombreempresa name=nombreempresa provincia"Ejemplo: Fontaneria Mario y Luigi" class="form-control input-md" required="" type="text">
                <span class="help-block">Inserta el nombre de tu empresa aquí</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for=correoempresa>Dirección de correo electrónico:</label>
                <div class="col-xs-6 ">
                <input id=correoempresa name=correoempresa placeholder="Ejemplo: mariolovespeach@gmail.com" class="form-control input-md" required="" type="text" onchange="validar_Email()">
                <span class="help-block">Inserta tu dirección de correo electrónico</span>
                </div>
              </div>

              <!-- Password input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for=pass1>Introduce la contraseña:</label>
                <div class="col-xs-6">
                  <input id=pass1 name=pass1 placeholder="" class="form-control input-md" required="" type="password" onchange="validar_Pass1()">
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
                <label class="col-xs-6 control-label text-center" for="cifo"> NIF/CIF:</label>
                <div class="col-xs-6">
                  <input id="cifo" name="cifo" placeholder="" class="form-control input-md" required="" type="text">
                  <span class="help-block">Introduce tu tu Nº de identificación fiscal (NIF/CIF)</span>
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

                    <output id="img" class="margenimagen"> <img class="imagenperfil" src="img/fontaneria.jpg" > </output>
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
                <input id="nicko" name="nicko" placeholder="MBCompany" class="form-control input-md" required="" type="text" onChange="validar_Nick()">
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
      <?php  require_once('footer.php'); ?>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/valOFR.js"></script>
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
