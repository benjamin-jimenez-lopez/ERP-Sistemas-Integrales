<?php 
	
	requiere_once("conexion.php");
	class Producto extends Conexion{

		public function alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria){
			$this-> sentencia = "INSERT INTO producto VALUES (null,'$nombre','$descripcion','$preciov', '$precioc', '$cantidad', '$cantmin', '$cantmax', '$categoria')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDproducto){
			$this-> sentencia = "DELETE FROM producto WHERE IDproducto = $IDproducto";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM producto";
			return $this-> obtenerSentencia();
	}
 ?>