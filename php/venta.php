<?php 
	
	requiere_once("conexion.php");
	class Venta extends Conexion{

		public function alta($fecha,$IDCliente,$Total,$tipo_pago){
			$this-> sentencia = "INSERT INTO venta VALUES (null,'$fecha','$IDCliente', '$Total', '$tipo_pago')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDVenta){
			$this-> sentencia = "DELETE FROM venta WHERE IDVenta = $IDVenta";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM venta";
			return $this-> obtenerSentencia();
	}
 ?>