<?php 
	
	require_once("conexion.php");
	class Materiaprima extends Conexion{

		public function alta($Nombre,$Tipo,$Descripcion, $Precio,$Stock,$Existencias){
			$this-> sentencia = "INSERT INTO materiaprima VALUES (null,'$Nombre','$Tipo','$Descripcion', '$Precio', '$Stock', '$Existencias')";
			$this-> ejecutarSentencia();
		}

		public function baja($ID_materia){
			$this-> sentencia = "DELETE FROM materiaprima WHERE ID_materia = $ID_materia";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM materiaprima";
			return $this-> obtenerSentencia();
		}
		public function modificar($Nombre,$Tipo,$Descripcion, $Precio,$Stock,$Existencias,$id){
			$this-> sentencia = "UPDATE FROM materiaprima SET Nombre='$Nombre',Tipo='$Tipo',Descripcion='$Descripcion',Precio='$Precio',Stock='$Stock',Existencias='$Existencias' WHERE ID_materia='$id'";
			$this-> ejecutarSentencia();
		}
	}
 ?>