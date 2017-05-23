<!DOCTYPE html>
<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("funciones.php");

  $logeado = isset($_SESSION['cod']);
  if($logeado) {
    $cod = $_SESSION['cod'];
  }

  //$codUsuario = $cod;
  $codUsuario = 5000001;
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
  ?>

<div class="row">
  <!-- TABLA DE TAGS ESPECIFICOS -->
  <div class="col-md-4">
    <table id="tagsEspecificos">
        <tr>
          <th style="width:150px" align="center">Tag Especificos del Usuario</th>
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
                <button style="width:105px" type="submit">Eliminar</button>
              </form>
            </td>

        </tr>
        <?php } ?>
        <tr>
          <form action="añadirTagEsp.php" method="post">
            <td >
              <input type="hidden" name="codUsuario" value="<?php echo $codUsuario?>">
              <div class="form-group">
                <label class="col-md-4 control-label"  for="seleccionarTagEsp"></label>
                <div class="col-md-11">
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
  <div class="col-md-4">
        <table id="tagsCategorias">
            <tr>
              <th style="width:150px" align="center">Categorias generales del Usuario</th>
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
                    <button style="width:105px" type="submit">Eliminar</button>
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
