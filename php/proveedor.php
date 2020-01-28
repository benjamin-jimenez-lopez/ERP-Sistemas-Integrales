<?php 
	
	requiere_once("conexion.php");
	class Proveedor extends Conexion{

		public function alta($nombre,$telefono,$direccion,$correo,$rfc){
			$this-> sentencia = "INSERT INTO proveedor VALUES (null,'$nombre','$telefono','$direccion', '$correo', '$rfc')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDproveedor){
			$this-> sentencia = "DELETE FROM proveedor WHERE IDproveedor = $IDproveedor";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM proveedor";
			return $this-> obtenerSentencia();
	}
 ?>