 <?php
 	function ObtenerConexion() {
	 //$config = parse_ini_file('config.ini');

	  $conexion = new mysqli('bbdd.dlsi.ua.es', 'gi_jmba12', '8CLISCQO', 'gi_extraescol',3306);
	  //$conexion = new mysqli($config['servidor'], $config['usuario'], $config['password'], $config['nombreBD']);
	  return $conexion;
	}

?>