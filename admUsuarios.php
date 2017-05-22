<?php
session_start();
require 'funciones.php';

$logeado = isset($_SESSION['cod']);
$esOfr = consulta("call esOfr(".$_SESSION['cod'].")");
if($logeado) {
  $cod = $_SESSION['cod'];
} else {
  header('Location: index.php');
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
      <?php require_once('header.php'); ?>
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
      <?php  require_once('footer.php'); ?>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
