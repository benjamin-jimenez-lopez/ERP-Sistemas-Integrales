<?php 
	
	require_once("conexion.php");
	class Detalle_compra extends Conexion{

		public function alta($IDmateriaprima,$IDcompra,$cantidad){
			$this-> sentencia = "INSERT INTO detalle_compra VALUES (null,'$IDmateriaprima','$IDcompra','$cantidad')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDdetallecompra){
			$this-> sentencia = "DELETE FROM detalle_compra WHERE IDdetallecompra = $IDdetallecompra";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM detalle_compra";
			return $this-> obtenerSentencia();
		}
		public function modificar($IDmateriaprima,$IDcompra,$cantidad,$id){
			$this-> sentencia = "UPDATE detalle_compra SET IDmateriaprima='$IDmateriaprima',IDcompra='$IDcompra',cantidad='$cantidad' WHERE IDdetallecompra='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this-> sentencia = "SELECT * FROM detalle_compra WHERE IDdetallecompra=$id";
			return $this->obtenerSentencia();
		}
	}
 ?> 