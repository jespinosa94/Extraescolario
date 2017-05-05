<!DOCTYPE html>

<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $notificaciones = "call obtenNotis(".$_SESSION['cod'].");";
  $promociones= "call obtenPromos(".$_SESSION['cod'].");";

  $datosNotis = consulta($notificaciones);
  $datosPromos = consulta($promociones);

  ?>


<html>
  <head>
    <style>
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
      }

      td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(even) {
          background-color: #dddddd;
      }
    </style>
  </head>
  <body>
    <!-- div con todo el contenido -->
    <div class= "row align-items-center">
      <h3>Suscripciones de Notificación</h3>
      <table id="notis">
        <tr>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Localidad</th>
          <th>Eliminar suscripción</th>
        </tr>
        <?php for ($i = 0; $i< sizeof($datosNotis); $i++) {  $unanoti=$datosNotis[$i]; ?>
        <tr>
            <td> <?php echo $unanoti["Actividad"]?></td>
            <td> <?php echo $unanoti["direccion"]?></td>
            <td> <?php echo $unanoti["Localidad"]?></td>
            <td>
              <form action="borroNotis.php" method="post">
                <input type="hidden" name="codigoActiv" value="<?php echo $unanoti["cod"]?>">
                <button type="submit">Eliminar Suscripción</button>
              </form>
            </td>

            <!-- <td> <button class="btn btn-primary" onclick="dameNumero(<?php echo $i?>)">Eliminar Suscripcion</button></td> -->
        </tr>
        <?php } ?>


      <!-- Tabla  de promociones-->
      </table>
      <br><br>
      <h3>Suscripciones Promocionales</h3>
      <table id="promos">
        <tr>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Localidad</th>
          <th>Eliminar suscripción</th>
        </tr>
        <?php for ($i = 0; $i< sizeof($datosPromos); $i++) {  $unapromo=$datosPromos[$i]; ?>
        <tr>
            <td> <?php echo $unapromo["Actividad"]?></td>
            <td> <?php echo $unapromo["direccion"]?></td>
            <td> <?php echo $unapromo["Localidad"]?></td>
            <!-- Creamos los botones de borrar dentro de la celda -->
            <td>               
              <form action="borroPromos.php" method="post">
                <input type="hidden" name="codigoActiv" value="<?php echo $unapromo["cod"]?>">
                <button type="submit">Eliminar Suscripción</button>
              </form>
            </td>
        </tr>
        <?php } ?>
      </table>
      <br><br>
    
    <!-- Row con los botones-->
    <div class= "row col-xs-12">
      <div class="span4 offset4 text-center">
        <button class="btn btn-default" onclick="cierro()">Volver</button>
      </div>
    </div>
  </div>

  <script>

  function dameNumero(y) {
      alert("<?php consulta($notificaciones); ?>");

  }

  function cierro() {
    close();
  }

  </script>

  </body>
</html>
