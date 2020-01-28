<?php 
	
	requiere_once("conexion.php");
	class Actividad extends Conexion{

		public function alta($registro,$IDusuario,$movimiento_act, $movimiento_tabla){
			$this-> sentencia = "INSERT INTO actividad VALUES (null,'$registro','$IDusuario','$movimiento_act','$movimiento_tabla')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDactividad){
			$this-> sentencia = "DELETE FROM actividad WHERE IDactividad = $IDactividad";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM usuario";
			return $this-> obtenerSentencia();
	}
 ?>