<?php 
	
	requiere_once("conexion.php");
	class Empleado extends Conexion{

		public function alta($nombre,$appaterno,$apmaterno, $correo, $rfc, $telefono, $sexo, $fechadeingreso, $cargo, $salario, $estadocivil, $nss){
			$this-> sentencia = "INSERT INTO empleado VALUES (null,'$nombre','$appaterno','$apmaterno', '$correo', '$rfc', '$telefono', '$sexo', '$fechadeingreso', '$cargo', '$salario', '$estadocivil', '$nss')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDempleado){
			$this-> sentencia = "DELETE FROM empleado WHERE IDempleado = $IDempleado";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM empleado";
			return $this-> obtenerSentencia();
	}
 ?>