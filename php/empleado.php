<?php 
	
	require_once("conexion.php");
	class Empleado extends Conexion{

		public function alta($nombre,$appaterno,$apmaterno, $correo, $rfc, $telefono, $sexo, $fechadeingreso, $cargo, $salario, $estadocivil, $nss){
			$this-> sentencia = "INSERT INTO empleado VALUES (null,'$nombre','$appaterno','$apmaterno', '$correo', '$rfc', '$telefono', '$sexo', '$fechadeingreso', '$cargo', '$salario', '$estadocivil', '$nss')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDempleado){
			$this-> sentencia = "DELETE FROM empleado WHERE IDempleado = $IDempleado";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM empleado";
			return $this-> obtenerSentencia();
		}
		public function modificar($nombre,$appaterno,$apmaterno, $correo, $rfc, $telefono, $sexo, $fechadeingreso, $cargo, $salario, $estadocivil,$nss,$id){
			$this-> sentencia = "UPDATE empleado SET nombre='$nombre',appaterno='$appaterno',apmaterno='$apmaterno',correo='$correo',rfc='$rfc',telefono='$telefono',sexo='$sexo',fechadeingreso='$fechadeingreso',cargo='$cargo',salario='$salario',estadocivil='$estadocivil',nss='$nss' WHERE IDempleado='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this-> sentencia = "SELECT * FROM empleado WHERE IDempleado=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>