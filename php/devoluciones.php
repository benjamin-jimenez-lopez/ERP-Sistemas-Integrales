<?php 
	
	requiere_once("conexion.php");
	class Devoluciones extends Conexion{

		public function alta($fecha,$cantidad,$descripcion, $IDproducto){
			$this-> sentencia = "INSERT INTO devoluciones VALUES (null,'$fecha','$cantidad','$descripcion', '$IDproducto')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDdevoluciones){
			$this-> sentencia = "DELETE FROM devoluciones WHERE IDdevoluciones = $IDdevoluciones";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM devoluciones";
			return $this-> obtenerSentencia();
	}
 ?>