<?php 
	
	require_once("conexion.php");
	class Balance extends Conexion{

		public function alta($fechainicio,$fechafin,$total){
			$this-> sentencia = "INSERT INTO balance VALUES (null,'$fechainicio','$fechafin','$total')";
			$this-> ejecutarSentencia();
			echo $this->sentencia;
		}

		public function baja($IDbalance){
			$this-> sentencia = "DELETE FROM balance WHERE IDbalance = $IDbalance";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM balance";
			return $this-> obtenerSentencia();
		}
		public function modificar($fechainicio,$fechafin,$total,$id){
			$this-> sentencia = "UPDATE balance SET fechainicio='$fechainicio',fechafin='$fechafin',total='$total' WHERE IDbalance='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM balance WHERE IDbalance=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>