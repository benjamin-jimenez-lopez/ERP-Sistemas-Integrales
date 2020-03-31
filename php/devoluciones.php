<?php 
	
	require_once("conexion.php");
	class Devoluciones extends Conexion{

		public function alta($fecha,$cantidad,$descripcion, $IDproducto){
			$this-> sentencia = "INSERT INTO devoluciones VALUES (null,'$fecha','$cantidad','$descripcion', '$IDproducto')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDdevoluciones){
			$this-> sentencia = "DELETE FROM devoluciones WHERE IDdevoluciones = $IDdevoluciones";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM devoluciones";
			return $this-> obtenerSentencia();
		}
		public function modificar($fecha,$cantidad,$descripcion, $IDproducto,$id){
			$this-> sentencia = "UPDATE devoluciones SET fecha='$fecha',cantidad='$cantidad',descripcion='$descripcion',IDproducto='$IDproducto' WHERE IDdevoluciones='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM devoluciones WHERE IDdevoluciones=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>