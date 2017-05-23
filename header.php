<!-- Header de la página -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Barra de navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" style= "padding-bottom: 60px;"></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <div class="row">
          <div class="col-md-3">
            <div id="header1" class="pull-right">
              <?php
              if($logeado) {
                $esOFR = consulta("select esOFR(". $_SESSION['cod'] .")");
                if($esOFR[0][0]) {
                  echo("<a href=\"crearActividad.php\">Crea una actividad!</a>");
                }
              }
              if(!$logeado) {
                //linki a registrar un ofertador
                echo("<a href=\"formOFR.php\">Oferta tus propias actividades</a>");
              }
               ?>
            </div>
          </div>
          <div id="header2" class="col-md-offset-3 col-md-3 pull-right">
            <ul class="nav navbar-nav">
              <?php
              //Botón de Inicio
              $muestraPantalla = "<li class=\"";
              if($_SERVER['PHP_SELF'] == "/Extraescolario/index.php") {
                $muestraPantalla = $muestraPantalla . "active ";
                 ?>
                 <?php
              }
              $muestraPantalla = $muestraPantalla . "dropdown singleDrop\"><a href=\"index.php\">Inicio</a></li>";
              echo($muestraPantalla);
              ?>
              <?php
              //Botón de Ayuda
              $muestraPantalla = "<li class=\"";
              if($_SERVER['PHP_SELF'] == "/Extraescolario/ayuda.php") {
                $muestraPantalla = $muestraPantalla . "active ";
                 ?>
                 <?php
              }
              $muestraPantalla = $muestraPantalla . "dropdown singleDrop\"><a href=\"ayuda.php\">Ayuda</a></li>";
              echo($muestraPantalla);

              //Botón de incicio de sesión
              if($logeado) {
                 ?>
                 <li class="dropdown">
                   <?php
                   $nick = obtenerNickUsuario($cod);
                   echo '<span class="label-header">Hola ' . $nick . '</span>'
                    ?>
                   <a href="#" id="miCuenta" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Mi cuenta <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                     <?php
                     $linkPerfil = '';
                     if (!esBUS($cod)) {
                       $linkPerfil = 'perfilofertador.php';
                     } else {
                       $linkPerfil = 'perfilbuscador.php';
                     }
                      ?>
                     <li><a href=<?php echo $linkPerfil ?>>Editar perfil</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="cerrarSesion.php">Cerrar sesión</a></li>
                   </ul>
                 </li>
                 <?php
              } else {
                 ?>
                 <li class="dropdown singleDrop">
                   <a href="login.php">Iniciar sesión</a>
                 </li>
                 <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
