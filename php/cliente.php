<?php 
	
	requiere_once("conexion.php");
	class Cliente extends Conexion{

		public function alta($nombre,$direccion,$telefono, $correo, $apematerno, $apepaterno, $sexo, $fenacimiento){
			$this-> sentencia = "INSERT INTO cliente VALUES (null,'$nombre','$direccion','$telefono','$correo','$correo','$apematerno','$apepaterno','$sexo','$fenacimiento')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDcliente){
			$this-> sentencia = "DELETE FROM cliente WHERE IDcliente = $IDcliente";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM cliente";
			return $this-> obtenerSentencia();
	}
 ?>