<?php 
	
	requiere_once("conexion.php");
	class Compra extends Conexion{

		public function alta($fecha,$total,$tipo_pago, $id_cliente){
			$this-> sentencia = "INSERT INTO compra VALUES (null,'$fecha','$total','$tipo_pago','$id_cliente')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDcompra){
			$this-> sentencia = "DELETE FROM compra WHERE IDcompra = $IDcompra";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM compra";
			return $this-> obtenerSentencia();
	}
 ?>