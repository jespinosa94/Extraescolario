<?php
session_start();
require 'funciones.php';

$logeado = isset($_SESSION['cod']);
$esOfr = consulta("call esOfr(".$_SESSION['cod'].")");
if($logeado && $esOfr[0][0]) {
  $cod = $_SESSION['cod'];
} else {
  header('Location: index.php');
}

$codActividad = $_POST['codActividad'];
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
      <?php require_once('header.php'); ?>
       <body>
         <form name= "formNewsletter" method="post" action = "añadirNewsletter.php" id= "formularioNewsletter">
           <input type="hidden" name="codActividad" value="<?php echo $codActividad?>">
          <div class="row">
             <div class="col-md-6 control-label">
               <!-- Titulo de la newsletter-->
               <div class="form-group">
                 <label class="col-md-6 control-label" for="tituloNewsletter">Titulo de la newsletter</label>
                 <div class="col-md-6">
                 <input id="tituloNewsletter" name="tituloNewsletter" type="text" placeholder="Introduce el titulo de la newsletter" required="" class="form-control input-md">
                 </div>
               </div>
              <br><br><br>

             <!-- Descripcion de la newsletter-->
             <div class="form-group">
               <label class="col-md-6 control-label" for="descripcionNewsletter">Descripción</label>
               <div class="col-md-4">
               <input id="descripcionNewsletter" name="descripcionNewsletter" style="width:300px; height:300px" type="text" placeholder="Introduce el mensaje que quieres enviar" required="" class="form-control input-md">
               </div>
             </div>

           </div>
           <!-- Tipo de newsletter -->
           <div class="form-group">
             <label class="col-md-6 control-label" for="tipoNewsletter">Tipo de newsletter</label>
             <div class="col-md-2">
               <select id="tipoNewsletter" name="tipoNewsletter" class="form-control">
                 <option value="1">Promocional</option>
                 <option value="2">Notificación</option>
               </select>
             </div>
           </div>
        </div>
        <br>

        <div class="row">
        <div class="col-md-4"></div>
        <!-- Boton Confirmar newsletter -->
          <div class="form-group">
            <div class="col-md-4">
              <label class="col-md-offset-4 control-label" for="botonConfirmar"></label>
              <button id="botonConfirmar" name="botonConfirmar" type="submit" class="btn btn-success">Publicar newsLetter</button>
            </div>
          </div>
        </div>
      <br>

    </form>
      </body>



      <!-- FOOTER -->
      <?php  require_once('footer.php'); ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>
