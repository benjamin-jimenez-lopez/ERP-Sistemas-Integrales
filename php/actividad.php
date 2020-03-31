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

		public function consulta(){
			$this-> sentencia = "SELECT * FROM actividad";
			return $this-> obtenerSentencia();
		}
		public function modificar($registro,$IDusuario,$movimiento_act, $movimiento_tabla, $id){
			$this-> sentencia = "UPDATE FROM actividad SET registro='$registro',IDusuario='$IDusuario',movimiento_act='$movimiento_act',movimiento_tabla='$movimiento_tabla' WHERE IDactividad='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM actividad WHERE IDactividad=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>