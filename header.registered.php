<!DOCTYPE html>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extraescolario Project">
    <meta name="author" content="Extraescolario Team">
    <link rel="icon" href="http://www.iconj.com/ico/n/q/nqjqtckys4.ico">

    <title>Página principal</title>
  </head>
  <body>
    <div class="principal">
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
              <a class="navbar-brand" href="#"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <div class="row">
                <div id="header2" class="col-md-offset-5 col-md-2 pull-right">
                  <ul class="nav navbar-nav">
                    <li class="active dropdown singleDrop">
                      <a href="index.html">Inicio</a>
                    </li>
                    <li class="dropdown singleDrop">
                      <a href="#">Ayuda</a>
                    </li>
                    <li class="dropdown">
                      <?php
                      echo '<span class="label-header">Hola ' . $_SESSION['usuario'] . '</span>'
                       ?>
                      <!-- <span class="label-header">Hola Jorge </span> -->
                      <a href="#" id="miCuenta" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Mi cuenta <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <?php
                        $linkPerfil = '';
                        if ($esOFR) {
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
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </header>
    </div>
  </body>
</html>
