<?php 
	
	require_once("conexion.php");
	class Evaluacion extends Conexion{

		public function alta($tipo,$pregunta1,$pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10){
			$this-> sentencia = "INSERT INTO evaluacion VALUES (null,'$tipo','$pregunta1','$pregunta2', '$pregunta3', '$pregunta4', '$pregunta5', '$pregunta6', '$pregunta7', '$pregunta8', '$pregunta9', '$pregunta10')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDevaluacion){
			$this-> sentencia = "DELETE FROM evaluacion WHERE IDevaluacion = $IDevaluacion";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM evaluacion";
			return $this-> obtenerSentencia();
		}
		public function modificar($tipo,$pregunta1,$pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10,$id){
			$this-> sentencia = "UPDATE evaluacion SET tipo='$tipo',pregunta1='$pregunta1',pregunta2='$pregunta2',pregunta3='$pregunta3',pregunta4='$pregunta4',pregunta5='$pregunta5',pregunta6='$pregunta6',pregunta7='$pregunta7',pregunta8='$pregunta8',pregunta9=$pregunta9,pregunta10='$pregunta10' WHERE IDevaluacion='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM evaluacion WHERE IDevaluacion=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>