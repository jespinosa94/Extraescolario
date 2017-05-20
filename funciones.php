<?php

//función ajax DEbe de ir la primera no lo mováis!!
// lo correcto es meter en un .php todos los métodos que usa el usuario en otro los de otra cosa etc así encapsulas todo perfectamente
//isset comprueba que el metodo que ha hecho post se llama método
if(isset($_POST['metodo']) && $_POST['metodo'] == 'compruebaNick')// las comillas dobles evaluan carácteres especiales por eso mejor usar las simples
{
  compruebaNick();
}
function obtenerNumeroFilas($query)
{
  $resultado;
  $usuariobd = "gi_jec21";
  $contrasenya = ".gi_jec21.";

    try {
      $conexion = new PDO('mysql:host=bbdd.dlsi.ua.es;dbname=gi_extraescol;charset=utf8', $usuariobd, $contrasenya);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $stm = $conexion->prepare($query);
    $stm->execute();
    $resultado = $stm->rowCount();

    return $resultado;
}
function compruebaNick()
{
  $nick=$_POST['nick'];
  $sqlUsr = "select nick from USR where nick= \"$nick\" limit 1";
  $Nfilas = obtenerNumeroFilas($sqlUsr);

  if ($Nfilas==0)
  {

    $estado="success";
    $mensaje="no existe el nick por lo que es válido";
  }
  else
  {
    $estado="error";
    $mensaje= "este nick ya existe, por favor selecciona otro";
  }

  header('Content-type: application/json; charset=utf-8');
  echo json_encode(array('estado'=>$estado,'mensaje'=>$mensaje,'resultado'=>$Nfilas));


}



//si la sesión ya está iniciada, automáticamente va al index
function compruebaSesionIniciada() {
  if(isset($_SESSION['usuario'])){
    header('Location: index.php'); //redirigir a index.php
  }
}

//si la sesión NO está iniciada, automáticamente va al login
function verificarSesion() {
  if(!isset($_SESSION['usuario'])){
    header('Location: login.php'); //redirigir a login.php
  }
}

function esBUS($cod) {
  $usuariobd = "gi_jec21";
  $contrasenya = ".gi_jec21.";

    try {
      $conexion = new PDO('mysql:host=bbdd.dlsi.ua.es;dbname=gi_extraescol', $usuariobd, $contrasenya);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    $sql = $conexion->prepare('SELECT u.cod FROM BUS b join USR u on b.cod=u.cod where u.cod = :cod');
    $sql->execute(array(
      ':cod' => $cod
    ));
    $resultado = $sql->fetch();
    if($resultado) {
      return true;
    } else {
      return false;
    }
}

function obtenerNickUsuario($cod) {
  require_once ("conexion.php");
  $sql = $conexion->prepare('SELECT nick FROM USR  where cod=?');
  /*(i=int, d=double, s=string, b=blob)*/
  $sql->bind_param("s", $cod);
  $sql->execute();
  $sql->bind_result($resultado);  //asocio el resultado a una variable, pero no le doy valor
  $sql->fetch();  //Doy valor a la variable que he asociado

  return $resultado;
}

//Recibe una query en formato string tipo: "Select nombre from Buscador where nombre="PEPE"
//y devuelve un resultado con la ejecución de la query
function consulta($query) {
  $usuariobd = "gi_jec21";
  $contrasenya = ".gi_jec21.";

    try {
      $conexion = new PDO('mysql:host=bbdd.dlsi.ua.es;dbname=gi_extraescol;charset=utf8', $usuariobd, $contrasenya);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $stm = $conexion->prepare($query);
    $stm->execute();
    $data = $stm->fetchAll();
    return $data;
    /*Para ver el resultado de la consulta: */
    //print_r(array_values($query));
}



 ?>
