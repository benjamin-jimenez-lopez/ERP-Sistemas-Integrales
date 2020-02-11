<?php 
	
	require_once("conexion.php");
	class Cliente extends Conexion{

		public function alta($nombre,$direccion,$telefono, $correo, $apematerno, $apepaterno, $sexo, $fenacimiento){
			$this-> sentencia = "INSERT INTO cliente VALUES (null,'$nombre','$direccion','$telefono','$correo','$correo','$apematerno','$apepaterno','$sexo','$fenacimiento')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDcliente){
			$this-> sentencia = "DELETE FROM cliente WHERE IDcliente = $IDcliente";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM cliente";
			return $this-> obtenerSentencia();
		}
		public function modificar($nombre,$direccion,$telefono, $correo, $apematerno, $apepaterno, $sexo, $fenacimiento,$id){
			$this-> sentencia = "UPDATE FROM cliente SET nombre='$nombre',direccion='$direccion',telefono='$telefono',correo='$correo',apematerno='$apematerno',apepaterno='$apepaterno',sexo='$sexo',fenacimiento='$fenacimiento' WHERE IDcliente='$id'";
			$this-> ejecutarSentencia();
		}
	}
 ?>