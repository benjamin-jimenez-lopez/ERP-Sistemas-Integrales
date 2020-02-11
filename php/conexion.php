<?php 

	class Conexion{
		private $usuario = "root";
		private $base = "erp";
		private $password = "";
		private $host = "localhost";
		protected $sentencia = "";
		public $conexion;

		private function abrir_conexion(){
			$this-> conexion = new mysqli($this->host, $this->usuario, $this->password, $this->base);
		}

		private function cerrarConexion(){
			$this-> conexion->close();
		}

		public function ejecutarSentencia(){
			$this-> abrir_conexion();
			$this-> conexion-> query($this->sentencia);
			$this-> cerrarConexion();
		}

		public function obtenerSentencia(){
			$this-> abrir_conexion();
			$resultado = $this->conexion->query($this->sentencia);
			return $resultado;
		}
	}

?>