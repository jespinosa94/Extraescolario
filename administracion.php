<?php
  session_start();
  require 'funciones.php';

  $logeado = isset($_SESSION['cod']);
  $esAdmin = consulta("select esADM(". $_SESSION['cod'] . ");");
if($logeado && $esAdmin[0][0]) {
    $cod = $_SESSION['cod'];
  } else {
    header('Location: login-admin.php');
  }


  $sqlnomCod = "call nombreycodBBDD()";
  $nomCod = consulta($sqlnomCod);

  $sqlTam = "call tamBBDD()";
  $tam = consulta($sqlTam);

  $sqlIndices = "call porcentajeIndices()";
  $indices = consulta($sqlIndices);

  $sqlNull = "call columnasNull();";
  $null = consulta($sqlNull);

  $sqlTipoDatos = "call InfTipoDatos()";
  $tipoDatos = consulta($sqlTipoDatos);

  $sqlInfoCol = "call infNumColTablas()";
  $infoCol = consulta($sqlInfoCol);

  $sqlInfoPrimarias = "call infPrimarias()";
  $infoPrimarias = consulta($sqlInfoPrimarias);

  $sqlInfoAjenas = "call infClavesAjenas()";
  $infoAjenas = consulta($sqlInfoAjenas);
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

    <title>Página administracion</title>

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
      <div id="cuerpo">
        <div class="row">
          <div class="col-md-12">
            <h1><a href="http://localhost/Extraescolario/admUsuarios.php">Administración de usuarios</a></h1>
          </div>

        </div>
        <div class="row">
          <div class="col-md-4">
            <h3>Estadísticas de la base de datos:</h3>
          <?php
            echo "Nombre de la base de datos: ";
            echo $nomCod[0]['name'];
          ?>
          <br>
          <?php echo "Codificación de la BD: ";
          echo $nomCod[0]['codifi']; ?> <br> <?php
          echo "Tamaño de la BD: ".$tam[0]['Tamaño']." MB"; ?> <br> <?php
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <h3>% de tamaño que ocupan los indices respecto a la tabla:</h3>
          <table id="indices">
              <tr>
                <th style="width:150px" align="center">Nombre de la BD</th>
                <th>Nombre de la tabla</th>
                <th style="width:150px" align="center">% Tamaño de los indices</th>
                <th>Motor de la BD</th>
              </tr>
              <?php for ($i = 0; $i< sizeof($indices); $i++)
              {
                $rowIndices = $indices[$i];?>
              <tr>
                  <td> <?php echo $rowIndices["table_schema"]?></td>
                  <td> <?php echo $rowIndices["table_name"]?></td>
                  <td> <?php echo $rowIndices["%"]?></td>
                  <td> <?php echo $rowIndices["engine"]?></td>

              </tr>
              <?php } ?>
          </table>
        </div>
            <br>
            <div class="col-md-4">
          <h3>Columnas que pueden ser null</h3>
          <table id="null">
                <tr>
                  <th style="width:150px" align="center">Nombre de la tabla</th>
                  <th style="width:150px" align="center">Columna null</th>
                </tr>
                <?php for ($i = 0; $i< sizeof($null); $i++)
                {
                  $rowNull = $null[$i];?>
                <tr>
                    <td> <?php echo $rowNull["table_name"]?></td>
                    <td> <?php echo $rowNull["column_name"]?></td>

                </tr>
                <?php } ?>
            </table>
          </div>
          <div class="col-md-4">
            <h3>Tipos de datos en nuestra BD:</h3>
            <table id="tipoDatos">
                  <tr>
                    <th style="width:150px" align="center">Tipo de dato</th>
                    <th style="width:150px" align="center">Nombre de la tabla</th>
                    <th style="width:150px" align="center">Motor</th>
                  </tr>
                  <?php for ($i = 0; $i< sizeof($tipoDatos); $i++)
                  {
                    $rowtipoDato = $tipoDatos[$i];?>
                  <tr>
                      <td> <?php echo $rowtipoDato["data_type"]?></td>
                      <td> <?php echo $rowtipoDato["table_name"]?></td>
                      <td> <?php echo $rowtipoDato["engine"]?></td>

                  </tr>
                  <?php } ?>
              </table>
            </div>
            <div class="row">
              <div class= "col-md-4">
              <h3>Nº de columnas por tabla en nuestra BD:</h3>
              <table id="infoCol">
                    <tr>
                      <th style="width:150px" align="center">Nº de columnas</th>
                      <th style="width:150px" align="center">Nombre de la tabla</th>
                    </tr>
                    <?php for ($i = 0; $i< sizeof($infoCol); $i++)
                    {
                      $rowinfoCol = $infoCol[$i];?>
                    <tr>
                        <td> <?php echo $rowinfoCol["num"]?></td>
                        <td> <?php echo $rowinfoCol["table_name"]?></td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
<div class= "col-md-4">
                    <h3>Informacion de las claves primarias:</h3>
                <table id="infoPrimarias">
                      <tr>
                        <th style="width:150px" align="center">Nº de columnas</th>
                        <th style="width:150px" align="center">Nombre de la tabla</th>
                      </tr>
                      <?php for ($i = 0; $i< sizeof($infoPrimarias); $i++)
                      {
                        $rowinfoPrimarias = $infoPrimarias[$i];?>
                      <tr>
                          <td> <?php echo $rowinfoPrimarias["table_name"]?></td>
                          <td> <?php echo $rowinfoPrimarias["column_name"]?></td>
                      </tr>
                      <?php } ?>
                  </table>
</div>
<div class= "col-md-4">
                  <h3>Informacion de las claves ajenas:</h3>
              <table id="infoAjenas">
                    <tr>
                      <th style="width:150px" align="center">Nº de columnas</th>
                      <th style="width:150px" align="center">Nombre de la tabla</th>
                      <th style="width:150px" align="center">Nº de columnas</th>
                      <th style="width:150px" align="center">Nº de columnas</th>
                    </tr>
                    <?php for ($i = 0; $i< sizeof($infoAjenas); $i++)
                    {
                      $rowinfoAjenas = $infoAjenas[$i];?>
                    <tr>
                        <td> <?php echo $rowinfoAjenas["table_name"]?></td>
                        <td> <?php echo $rowinfoAjenas["column_name"]?></td>
                        <td> <?php echo $rowinfoAjenas["referenced_table_name"]?></td>
                        <td> <?php echo $rowinfoAjenas["referenced_column_name"]?></td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
              </div>

        </div>
      </div>

        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
