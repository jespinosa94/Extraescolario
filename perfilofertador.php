<!DOCTYPE html>
<?php
  session_start();
  $logeado = isset($_SESSION['cod']);
  if($logeado) {
      $cod = $_SESSION['cod'];
  }

  /* Incluimos la conexión predefinida*/
  require_once ("funciones.php");

  /*HACEMOS UNA LLAMADA A LA BASE DE DATOS PARA EXTRAER INFORMACION*/
    /*Preparamos las querys a ejecutar en la página*/
    $conUser = "call getDatosOFR(".$_SESSION['cod'].")";
    $sqlVerif = "call OFRgetVerif(".$_SESSION['cod'].")";
    $sqlNoVerif = "call OFRgetNOVerif(".$_SESSION['cod'].")";

    /*Realizamos las querys a través del método guardado en funciones*/
    $datosUsuario = consulta($conUser);
    $actisVerifs = consulta($sqlVerif);
    $actisNoVerifs = consulta($sqlNoVerif);

    /*Directorio en el que se encuentras las imágenes: OJO, se tiene que usar esa barra, si
    pones la otra, no se queja pero no hace nada*/
    $dir = "img/";

      $empresaUser = $datosUsuario[0]["empresa"];
      $nickUser = $datosUsuario[0]["nick"];
      $emailUser = $datosUsuario[0]["email"];
      $passUser = $datosUsuario[0]["contrasenya"];
      $telefUser = $datosUsuario[0]["telefono"];
      $fotoUser= $dir.$datosUsuario[0]["foto"];
      $provinciaUser = $datosUsuario[0]["pNombre"];
      $localidadUser = $datosUsuario[0]["lNombre"];
      $direccionUser = $datosUsuario[0]["direccion"];
      $nifUser = $datosUsuario[0]["nif"];
      $fotoDefecto=$dir."maleavatar.jpg";

?>


<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extraescolario Project">
    <meta name="author" content="Extraescolario Team">
    <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

    <title>Perfil Ofertador</title>

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
      <?php require_once('header.php'); ?>

      <!--Cuerpo -->
      <div id="perfilbuscador" class = "container-fluid">
        <div class = "row text-center">
          <h2 class="col-xs-12"> Página personal de <?php echo $nickUser; ?> </h2>
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
                  <label class="col-xs-6 col-md-4 control-label text-left" for="nick">Nombre de la empresa:</label>
                <p class="con-xs-6 col-md-8 control-label text-left" type="password" for="pass"><?php echo $empresaUser; ?></p>
              </div>
              <div class= "row">
                  <label class="col-xs-6 col-md-4 control-label text-left" for="nick">Nick:</label>
                <p class="con-xs-6 col-md-8 control-label text-left" type="password" for="pass"><?php echo $nickUser; ?></p>
              </div>
              <div class = "row">
                <label class="col-xs-6 col-md-4 control-label text-left" for="correo">Email:</label>
                <p class="col-xs-6 col-md-8 control-label text-left" for="correo"><?php echo $emailUser; ?></p>
              </div>
              <div class ="row">
                  <label class="col-xs-6 col-md-4 control-label text-left" for="cont">Contraseña:</label>
                <p class="con-xs-6 col-md-8 control-label text-left" for="cont"><?php echo $passUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="telf">Teléfono:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="telf"><?php echo $telefUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="prov">Provincia:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="prov"><?php echo $provinciaUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="loc">Localidad:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="loc"><?php echo $localidadUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="dir">Dirección:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="dir"><?php echo $direccionUser; ?></p>
              </div>
              <div class = "row">
                      <label class="col-xs-6 col-md-4 control-label text-left" for="dir">NIF:</label>
                    <p class="con-xs-6 col-md-8 control-label text-left" for="dir"><?php echo $nifUser; ?></p>
              </div>
          </div>
          <!-- Segunda gran columna-->
          <div class ="col-md-4">
            <div class = "row text-left">
              <label>
                <h3>Actividades</h3>
              </label>
            </div>
            <div class="row col-xs-12">
              <label>
                <h3>Publicadas</h3>
              </label>
            </div>
            <div class="row col-xs-12">
              <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <!-- <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>-->
                            <?php for($i = 0; $i < sizeof($actisVerifs) && $i<5; $i++)  { $unaActVerif = $actisVerifs[$i]; ?>
                              <li><a href="<?php echo $var="#tab".$unaActVerif["cod"]?>" data-toggle="tab"><?php echo $unaActVerif["nombre"]?></a></li>
                            <?php  } ?>
                            <?php if (sizeof($actisVerifs) > 4) { ?>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php for($i = 5; $i< sizeof($actisVerifs); $i++)  { $unaActVerif = $actisVerifs[$i];?>
                                      <li><a href="<?php echo $var="#tab".$unaActVerif["cod"]?>" data-toggle="tab"><?php echo $unaActVerif["nombre"]?></a></li>
                                    <?php  } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                          <?php for($i = 0; $i< sizeof($actisVerifs); $i++)  { $unaActVerif = $actisVerifs[$i]; ?>
                            <div class="tab-pane fade" id="<?php echo $var="tab".$unaActVerif["cod"]?>">
                              <div class="row col-xs-12"> <?php echo $unaActVerif["descripcion"] ?></div>
                                <div class="span4 offset4 text-center">
                                  <a class="btn btn-primary" href="<?php echo "http://localhost/Extraescolario/exportarXML.php?cod=".$unaActVerif["cod"] ?>">Exportar xml</a>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
              </div>
            </div>
            <div class="row col-xs-12">
              <label>
                <h3>Pendientes de verificación</h3>
              </label>
            </div>
            <div class="row col-xs-12">
              <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                            <ul class="nav nav-tabs">
                            <!-- <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>-->
                            <?php for($i = 0; $i < sizeof($actisNoVerifs); $i++)  { $unaActNoVerif = $actisNoVerifs[$i]; ?>
                              <li><a href="<?php echo $var="#tab".$unaActNoVerif["cod"]?>" data-toggle="tab"><?php echo $unaActNoVerif["nombre"]?></a></li>
                            <?php  } ?>
                            <?php if (sizeof($actisNoVerifs) > 4) { ?>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php for($i = 5; $i< sizeof($actisNoVerifs); $i++)  { $unaActVerif = $actisNoVerifs[$i];?>
                                      <li><a href="<?php echo $var="#tab".$unaActNoVerif["cod"]?>" data-toggle="tab"><?php echo $unaActNoVerif["nombre"]?></a></li>
                                    <?php  } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                          <?php for($i = 0; $i< sizeof($actisNoVerifs); $i++)  { $unaActNoVerif = $actisNoVerifs[$i]; ?>
                            <div class="tab-pane fade" id="<?php echo $var="tab".$unaActNoVerif["cod"]?>">
                              <div class="row col-xs-12"> <?php echo $unaActNoVerif["descripcion"] ?></div>
                            </div>
                          <?php } ?>
                        </div>
                    </div>
              </div>
            </div>
          </div>
          <div class ="col-md-4">
            <div class = "row text-left">
              <label>
                <h3>Foto de perfil</h3>
              </label>
            </div>
            <div class = "row text-left">
              <img src="<?php echo $fotoUser; ?>" onerror="this.src='img/Maleavatar.jpg'" width="300px" height="300px"></img>
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
      <?php  require_once('footer.php'); ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
    <script src="js/calendario.js"></script>
  </body>
</html>
