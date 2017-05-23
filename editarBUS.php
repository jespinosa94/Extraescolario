<!DOCTYPE html>
<!--<script language="JavaScript" type="text/javascript" src="js/valOFR.js"></script>-->
<?php

session_start();

require_once ("funciones.php");

$logeado = isset($_SESSION['cod']);
if($logeado)
{
  $cod = $_SESSION['cod'];
}

//$codUsuario = $cod;
$codUsuario = $cod;

/*Preparamos y ejecutamos la query que carga todos los tag Especificos que tiene el usuario*/
$sqlTagEsp = "call getTagEspBus($codUsuario)";
$tagEsp = consulta($sqlTagEsp);

/*Preparamos y ejecutamos la query que carga todos los tag generales que tiene el usuario*/
$sqlTagGen = "call getTagGenBus($codUsuario)";
$tagGen = consulta($sqlTagGen);

/*Preparamos y ejecutamos la query que carga los tags Especificos pendientes por añadir al usuario */
$sqlTagEspRestantes = "call getTagEspRestantes($codUsuario)";
$tagEspRestantes = consulta($sqlTagEspRestantes);

/*Preparamos y ejecutamos la query que carga los tags Generales pendientes por añadir al usuario */
$sqlTagGenRestantes = "call getTagGenRestantes($codUsuario)";
$tagGenRestantes = consulta($sqlTagGenRestantes);


$sqlProvincias = "call getAllProvincias()";
$provincias = consulta($sqlProvincias);

$sqlBUS = "call getDatosBUS(".$_SESSION['cod'].")";
$datosUsuario = consulta($sqlBUS);

$nickUser = $datosUsuario[0]["nick"];
$emailUser = $datosUsuario[0]["email"];
$passUser = $datosUsuario[0]["contrasenya"];
$telefUser = $datosUsuario[0]["telefono"];
$fotoUser= $datosUsuario[0]["foto"];
$provinciaUser = $datosUsuario[0]["pNombre"];
$localidadUser = $datosUsuario[0]["lNombre"];
$direccionUser = $datosUsuario[0]["direccion"];
$nombreUser = $datosUsuario[0]["nombre"];
$apellidosUser = $datosUsuario[0]["apellidos"];
$fechaNacUser = $datosUsuario[0]["fechaNacimiento"];
$sexoUser = $datosUsuario[0]["sexo"];
$codigolocalidad=$datosUsuario[0]["codLocalidad"];




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

      <?php require_once('header.php'); ?>

      <!--Cuerpo -->
      <div id="formOFR" class = "container-fluid">

        <div class = "row text-center">
          <h2 class="col-xs-12"> Modifica los datos que quieras </h2>
        </div>
        <div class="row margen">

          <form name= "form1" enctype="multipart/form-data" method="post" action = "modificarDatosBUS.php" id= "formularioBUS" onsubmit="return validar_Todo()">


          <div class="col-xs-12 col-md-6">
<!--// 1a columna ===============================================================================================================-->


              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for=nombreempresa>Nombre:</label>
                <div class="col-xs-6 ">
                <input id=nombreempresa name=nombreempresa value = "<?php echo $nombreUser; ?>" placeholder="Mario" class="form-control input-md" required="" type="text">
                <span class="help-block">Inserta tu nombre aquí</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for=apellidos>Apellido:</label>
                <div class="col-xs-6 ">
                <input id=apellidos name=apellidos placeholder="Bross" value = "<?php echo $apellidosUser; ?>" class="form-control input-md" required="" type="text">
                <span class="help-block">Inserta tu apellido aquí</span>
                </div>
              </div>

              <!-- Multiple Radios -->
              <div class="form-group">
                <label class="col-xs-6 control-label text-center" for="sexo">Selecciona tu sexo:  </label>
                <div class="col-md-6">

                <div class="radio">
                  <label for="sexo-0">
                    <input name="sexo" id="sexo-0" value="Hombre" <?php if ($sexoUser=='Hombre'){echo("checked=\"checked\"");}?> type="radio">
                    Hombre
                  </label>
              	</div>
                <div class="radio">
                  <label for="sexo-1">
                    <input name="sexo" id="sexo-1" value="Mujer" <?php if ($sexoUser=='Mujer'){echo("checked=\"checked\"");}?> type="radio">
                    Mujer
                  </label>
              	</div>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="correoempresa">Dirección de correo electrónico:</label>
                <div class="col-xs-6 ">
                <input id=correoempresa name=correoempresa placeholder="Ejemplo: mariolovespeach@gmail.com" value = "<?php echo $emailUser; ?>" class="form-control input-md" required="" type="text" onchange="validar_Email()">
                <span class="help-block">Inserta tu dirección de correo electrónico</span>
                </div>
              </div>



              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="telefonoempresa">Nº teléfono:</label>
                <div class="col-xs-6 ">
                <input id="telefonoempresa" name="telefonoempresa" value = "<?php echo $telefUser; ?>" placeholder="Ejemplo: 652987431" class="form-control input-md" required="" type="text" onchange="validar_Telef()">
                <span class="help-block">Introduce tu número de teléfono</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="direccionempresa">Dirección:</label>
                <div class="col-xs-6 ">
                <input id="direccionempresa" name="direccionempresa" value = "<?php echo $direccionUser; ?>" placeholder="Ejemplo: Castillo Bowser nº2" class="form-control input-md" required="" type="text">
                <span class="help-block">Introduce la deirección dende se sitúa tu empresa</span>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group row">
                <label class="col-xs-6 control-label text-center" for="fechan">Fecha de Nacimiento</label>
                <div class="col-xs-6">
                  <input id="fechan" name="fechan" placeholder="1985-8-13" value = "<?php echo $fechaNacUser; ?>" class="form-control input-md" required="" type="text" onchange="validar_Fecha()">
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
                  <!--<?php // $fotoUser='null';?>-->

                    <?php if ($fotoUser=='null')
                    { ?>
                      <output id="img" class="margenimagen"> <img class="imagenperfil" src= "img/mario.jpg"> </output>
                      <?php
                    }
                    else
                    {
                      ?>
                       <output id="img" class="margenimagen"> <img class="imagenperfil" src="<?php echo "img/".$fotoUser;?>" > </output>
                       <?php
                    }?>
                    <!--<output id="img" class="margenimagen"> <img class="imagenperfil" src="<?php echo "img/".$fotoUser;?>" > </output>-->
                  </div>
                </div>

              </center>
              <label class="col-xs-6 control-label text-center" for="files">Foto de perfil:</label>
              <div class="col-xs-6">
                <input id="files" name="files" class="input-file" type="file" value = "<?php echo $fotoUser; ?>">
                <span class="help-block">Sube tu foto de perfil aquí</span>
              </div>
            </div>
            <script src="js/showimg.js"></script>

            <!-- Select Basic -->
            <div class="form-group row">
            <label class="col-xs-6 control-label text-center" for="provincia">Provincia:</label>
            <div class="col-xs-6">
              <select id="provincia" name="provincia" class="form-control" onchange="cargaPueblo()">
                <option value="<?php echo $provinciaUser; ?>"><?php echo $provinciaUser; ?> </option>
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
                <option value = "<?php echo $codigolocalidad; ?>" ><?php echo $localidadUser; ?> </option>
              </select>
            </div>
            </div>



            <!-- Text input
            (this.value) pasa como parámetro el valor del input
            si el navegador no tiene html 5 el requierd no funciona
          -->








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


        <div class='form-group row'>
          <!-- TABLA DE TAGS ESPECIFICOS -->
          <div class="col-xs-6">
            <table id="tagsEspecificos">
                <tr>
                  <th style="width:300px" align="center">Tag Especificos del Usuario</th>
                  <th></th>
                </tr>
                <?php for ($i = 0; $i< sizeof($tagEsp); $i++)
                {
                  $rowTagEsp = $tagEsp[$i];?>
                <tr>
                    <td> <?php echo $rowTagEsp["nombre"]?></td>
                    <!-- Creamos boton dentro de la celda -->
                    <td>
                      <form action="eliminarTagEsp.php" method="post">
                        <input type="hidden" name="codTagEsp" value="<?php echo $rowTagEsp["cod"]?>">
                        <input type="hidden" name="codUsuario" value="<?php echo $codUsuario?>">
                        <button style="width:200px" type="submit">Eliminar</button>
                      </form>
                    </td>

                </tr>
                <?php } ?>
                <tr>
                  <form action="añadirTagEsp.php" method="post">
                    <td >
                      <input type="hidden" name="codUsuario" value="<?php echo $codUsuario?>">
                      <div class="form-group">
                        <label class="col-xs-3 control-label"  for="seleccionarTagEsp"></label>
                        <div class="col-xs-3">
                          <select id="seleccionarTagEsp" style="width:150px" name="seleccionarTagEsp" class="form-control">
                          <?php for($i = 0; $i < sizeof($tagEspRestantes); $i++)
                          {
                              $rowTagEsp = $tagEspRestantes[$i];
                              ?>
                              <option value="<?php echo $rowTagEsp["cod"]?>"><?php echo $rowTagEsp["nombre"] ?></option>
                   <?php  }?>
                          </select>
                        </div>
                      </div>
                    </td>
                    <td>
                        <input type="hidden" name="codUsuario" value="<?php echo $codUsuario?>">
                        <button type="submit">Añadir Tag</button>
                    </td>
                </form>
                </tr>
              </table>
          </div>



          <!-- TABLA DE CATEGORIAS GENERALES-->
          <div class="col-xd-6">
                <table id="tagsCategorias">
                    <tr>
                      <th style="width:300px" align="center">Categorias generales del Usuario</th>
                      <th></th>
                    </tr>
                    <?php for ($i = 0; $i< sizeof($tagGen); $i++)
                    {
                      $rowTagGen = $tagGen[$i];?>
                    <tr>
                        <td> <?php echo $rowTagGen["nombre"]?></td>
                        <!-- Creamos boton dentro de la celda -->
                        <td>
                          <form action="eliminarTagGen.php" method="post">
                            <input type="hidden" name="codTagGen" value="<?php echo $rowTagGen["cod"]?>">
                            <input type="hidden" name="codUsuario" value="<?php echo $codUsuario?>">
                            <button style="width:200px" type="submit">Eliminar</button>
                          </form>
                        </td>

                    </tr>
                    <?php } ?>
                    <tr>
                      <form action="añadirTagGen.php" method="post">
                        <td >
                          <input type="hidden" name="codUsuario" value="<?php echo $codUsuario?>">
                          <div class="form-group">
                            <label class="col-md-4 control-label"  for="seleccionarTagGen"></label>
                            <div class="col-md-11">
                              <select id="seleccionarTagGen" style="width:150px" name="seleccionarTagGen" class="form-control">
                              <?php for($i = 0; $i < sizeof($tagGenRestantes); $i++)
                              {
                                  $rowTagGen = $tagGenRestantes[$i];
                                  echo $rowTagGen["nombre"];
                                  ?>
                                  <option value="<?php echo $rowTagGen["cod"]?>"><?php echo $rowTagGen["nombre"] ?></option>
                       <?php  }?>
                              </select>
                            </div>
                          </div>
                        </td>
                        <td>
                            <input type="hidden" name="codUsuario" value="<?php echo $codUsuario?>">
                            <button type="submit">Añadir Tag</button>
                        </td>
                    </form>
                    </tr>
                  </table>
          </div>


        </div>



        <br>
        <br>

      </div>

      <!-- FOOTER -->

      <?php  require_once('footer.php'); ?>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/valedBUS.js"></script>
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
