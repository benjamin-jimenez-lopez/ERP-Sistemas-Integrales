<?php 
	
	requiere_once("conexion.php");
	class Remplazo extends Conexion{

		public function alta($IDmobiliario,$fecha,$costo,$descripcion){
			$this-> sentencia = "INSERT INTO remplazo VALUES (null,'$IDmobiliario','$fecha','$costo', '$descripcion')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDremplazo){
			$this-> sentencia = "DELETE FROM remplazo WHERE IDremplazo = $IDremplazo";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM remplazo";
			return $this-> obtenerSentencia();
	}
 ?>