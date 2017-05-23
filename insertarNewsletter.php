<?php
require_once ("funciones.php");


  //preparamos las variables para insertar
  $titulo = '"'.$_POST['tituloNewsletter'].'"';
  $descripcion = '"'.$_POST['descripcionNewsletter'].'"';
  $promo = 0;
  $noti = 0;
  $cod = $_POST['codActividad'];
  $tipo = $_POST['tipoNewsletter'];

  //Asignamos valor dependiento del tipo de newsletter recibida
  if($tipo === 1 )
  {
    $promo = 1;
  }
  else
  {
    $noti = 1;
  }



  //preparamos y ejecutamos la consulta
  $sqlinsertarNewsletter = "call insertarNewsletter($titulo,$descripcion, $promo, $noti, $cod)";
  $insertarNewsletter = consulta($sqlinsertarNewsletter);

  header('Location: /Extraescolario/perfilOfertador.php');


//}

?>
