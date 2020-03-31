<?php 
	
	require_once("conexion.php");
	class Pago extends Conexion{

		public function alta($IDempleado,$sal,$fecha_dep,$met_pag,$des){
			$this-> sentencia = "INSERT INTO pago VALUES (null,'$IDempleado','$sal','$fecha_dep', '$met_pag', '$des')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDpago){
			$this-> sentencia = "DELETE FROM pago WHERE IDpago = $IDpago";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM pago";
			return $this-> obtenerSentencia();
		}
		public function modificar($IDempleado,$sal,$fecha_dep,$met_pag,$des,$id){
			$this-> sentencia = "UPDATE FROM pago SET IDempleado='$IDempleado',sal='$sal',fecha_dep='$fecha_dep',met_pag='$met_pag',des='$des' WHERE IDpago='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM pago WHERE IDpago=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>