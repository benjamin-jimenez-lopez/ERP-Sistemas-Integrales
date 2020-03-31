<?php 
	
	require_once("conexion.php");
	class Proyecto extends Conexion{

		public function alta($nombre_pro,$tipo_pro,$IDempleado,$fecha_in,$fecha_fin,$descripcion){
			$this-> sentencia = "INSERT INTO proyecto VALUES (null,'$nombre_pro','$tipo_pro','$IDempleado', '$fecha_in', '$fecha_fin', '$descripcion')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDproyecto){
			$this-> sentencia = "DELETE FROM proyecto WHERE IDproyecto = $IDproyecto";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM proyecto";
			return $this-> obtenerSentencia();
		}
		public function modificar($nombre_pro,$tipo_pro,$IDempleado,$fecha_in,$fecha_fin,$descripcion,$id){
			$this-> sentencia = "UPDATE FROM proyecto SET nombre_pro='$nombre_pro',tipo_pro='$tipo_pro',IDempleado='$IDempleado',fecha_in='$fecha_in',fecha_fin='$fecha_fin',descripcion='$descripcion' WHERE IDproyecto='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM proyecto WHERE IDproyecto=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>