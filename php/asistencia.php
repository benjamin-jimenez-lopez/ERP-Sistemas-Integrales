<?php 
	
	require_once("conexion.php");
	class Asistencia extends Conexion{

		public function alta($Fecha,$IDempleado,$Hora){
			$this-> sentencia = "INSERT INTO asistencia VALUES (null,'$Fecha','$IDempleado','$Hora')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDasistencia){
			$this-> sentencia = "DELETE FROM asistencia WHERE IDasistencia = $IDasistencia";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM asistencia";
			return $this-> obtenerSentencia();
		}
		public function modificar($Fecha,$IDempleado,$Hora,$id){
			$this-> sentencia = "UPDATE FROM asistencia SET Fecha='$Fecha',IDempleado='$IDempleado',Hora='$Hora' WHERE IDasistencia='$id'";
			$this-> ejecutarSentencia();
		}
	}
 ?>