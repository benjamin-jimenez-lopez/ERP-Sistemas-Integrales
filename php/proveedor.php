<?php 
	
	require_once("conexion.php");
	class Proveedor extends Conexion{

		public function alta($nombre,$telefono,$direccion,$correo,$rfc){
			$this-> sentencia = "INSERT INTO proveedor VALUES (null,'$nombre','$telefono','$direccion', '$correo', '$rfc')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDproveedor){
			$this-> sentencia = "DELETE FROM proveedor WHERE IDproveedor = $IDproveedor";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM proveedor";
			return $this-> obtenerSentencia();
		}
		public function modificar($nombre,$telefono,$direccion,$correo,$rfc,$id){
			$this-> sentencia = "UPDATE FROM proveedor SET nombre='$nombre',telefono='$telefono',direccion='$direccion',correo='$correo',rfc='$rfc' WHERE IDproveedor='$id'";
			$this-> ejecutarSentencia();
		}
	}
 ?>