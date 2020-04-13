<?php 
	
	require_once("conexion.php");
	class Venta extends Conexion{

		public function alta($fecha,$IDCliente,$Total,$tipo_pago){
			$this-> sentencia = "INSERT INTO venta VALUES (null,'$fecha','$IDCliente', '$Total', '$tipo_pago')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDVenta){
			$this-> sentencia = "DELETE FROM venta WHERE IDVenta = $IDVenta";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM venta";
			return $this-> obtenerSentencia();
		}
		public function modificar($fecha,$IDCliente,$Total,$tipo_pago,$id){
			$this-> sentencia = "UPDATE venta SET fecha='$fecha',IDCliente='$IDCliente',Total='$Total',tipo_pago='$tipo_pago' WHERE IDVenta='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM venta WHERE IDVenta=$id";
			return $this->obtenerSentencia();
		}
	}
?>