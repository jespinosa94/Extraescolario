<?php
session_start();
require 'funciones.php';

$logeado = isset($_SESSION['cod']);
if($logeado) {
  $cod = $_SESSION['cod'];
}


$sqlUsuarios = "call getBUSAdmin()";
$usuarios = consulta($sqlUsuarios);

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

    <title>Página principal</title>

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
      <?php
      if ($logeado) {
        require 'header.registered.php';
      } else {
        ?>
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
                <a class="navbar-brand" href="index.php"></a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <div class="row">
                  <div class="col-md-3">
                    <div id="header1" class="pull-right">
                      <a href="#">Oferta tus propias actividades</a>
                    </div>
                  </div>
                  <div id="header2" class="col-md-offset-5 col-md-2 pull-right">
                    <ul class="nav navbar-nav">
                      <li class="active dropdown singleDrop">
                        <a href="index.html">Inicio</a>
                      </li>
                      <li class="dropdown singleDrop">
                        <a href="#">Ayuda</a>
                      </li>
                      <li class="dropdown singleDrop">
                        <a href="login.php">Iniciar sesión</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </header>
        <?php
      }
       ?>
       <body>
         <div class="row">
           <div class="col-md-10">
           <!--TABLA DE USUARIOS INSCRITOS PENDIENTES DE VALIDAR-->
           <br><br>
           <h2>Administración de usuarios</h2>
           <table id="usuarios">
             <tr>
               <th style="width:100px" align="center">Nombre</th>
               <th style="width:100px" align="center">Apellidos</th>
               <th style="width:100px" align="center">Edad</th>
               <th style="width:100px" align="center">Nick</th>
               <th style="width:100px" align="center">Nº de actividades inscritas</th>
               <th style="width:100px" align="center">Nº de comentarios</th>
               <th>¿Eliminar?</th>

             </tr>
             <?php for ($i = 0; $i< sizeof($usuarios); $i++)
             {
               $rowUsuarios = $usuarios[$i]; ?>

             <tr>
                 <td> <?php echo $rowUsuarios["nombre"]?> </td>
                 <td> <?php echo $rowUsuarios["apellidos"]?>  </td>
                 <?php
                 //Preparamos el codigo del usuario para ejecutar una funcion a la que le pasaremos el codigo de usuario
                 $cod = $rowUsuarios["cod"];
                 //Añadimos las "" al codigo para poder pasar la variable como parametro de una función
                 $codTratado = '"'.$cod.'"';
                 //Preparamos la query para obtener la edad y la almacenamos
                 $sqlUsuarios = "call getEdad($codTratado)";
                 $resEdad = consulta($sqlUsuarios);
                 $edad = $resEdad[0];
                 //Preparamos la query para obtener el numero de actividades inscritas y la almacenamos
                 $sqlNActividades = "call getNActividadesInscritas($codTratado)";
                 $resNActividades = consulta($sqlNActividades);
                 $nActividades = $resNActividades[0];
                 //echo $nActividades["n"];*/
                 //preparamos la query para obtener el numero de comentarios de un usuario
                 $sqlNComentarios = "call getNComentarios($codTratado)";
                 $resNComentarios = consulta($sqlNComentarios);
                 $nComentarios = $resNComentarios[0];
                 ?>


                 <td style="width:100px" align="center"> <?php echo $edad["edad"] ?> </td>
                 <td style="width:100px" align="center"> <?php echo $rowUsuarios["nick"]?></td>
                 <td style="width:100px" align="center"> <?php echo $nActividades["n"] ?> </td>
                 <td style="width:100px" align="center"> <?php echo $nComentarios["n"] ?> </td>
                 <!-- Creamos el boton de borrar dentro de la celda -->
                 <td>

                   <form action="borroUsuarios.php" id="borrarUsuarios" method="post">
                     <input type="hidden" name="codigoUSR" value="<?php echo $cod?>">
                     <button type="submit">Borrar</button>
                   </form>
                 </td>

             </tr>
             <?php } ?>
           </table>
         </div>
       </div>
      </body>



      <!-- FOOTER -->
      <footer>
        <div class="footer clearfix">
          <div class="container">
            <div class="row">
              <div class="col-sm-3 col-xs-12">
                <div class="footerContent">
                  <a class="footer-logo" href="index.php">
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
