<?php
  session_start();

  /* Incluimos la conexión predefinida*/
  require_once ("conexion.php");
  require_once ("funciones.php");

  $borranotif = "call borroNotis(".$_SESSION['cod'].",".$_POST['codigoActiv'].");";

  $datosNotis = consulta($borranotif);

  header("Location: http://localhost/Extraescolario/newsletter.php");
 ?>
<!--
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		<onload="returnSuscripciones()"> 
	</div>
</body>

<script>

  function returnSuscripciones() {
      window.location.replace("http://localhost/Extraescolario/newsletter.php");
  }

</script>

</html> -->