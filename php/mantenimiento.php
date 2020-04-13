<?php 
	
	require_once("conexion.php");
	class Mantenimiento extends Conexion{

		public function alta($fecha_man,$area,$IDmob, $costo_man, $IDempleado){
			$this-> sentencia = "INSERT INTO mantenimiento VALUES (null,'$fecha_man','$area','$IDmob', '$costo_man', '$IDempleado')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDmantenimiento){
			$this-> sentencia = "DELETE FROM mantenimiento WHERE IDmantenimiento = $IDmantenimiento";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM mantenimiento";
			return $this-> obtenerSentencia();
		}
		public function modificar($fecha_man,$area,$IDmob, $costo_man,$IDempleado,$id){
			$this-> sentencia = "UPDATE mantenimiento SET fecha_man='$fecha_man',area='$area',IDmob='$IDmob',costo_man='$costo_man',IDempleado='$IDempleado' WHERE IDmantenimiento='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM mantenimiento WHERE IDmantenimiento=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>