<?php 
	
	requiere_once("conexion.php");
	class Permisos extends Conexion{

		public function alta($IDusuario,$actpermiso,$actconsulta,$asispermiso,$asisconsulta,$balpermiso,$balconsulta,$clipermiso,$cliconsulta,$compermiso,$comconsulta,$dcompermiso,$dcomconsulta,$devpermiso,$devconsulta,$emppermiso,$empconsulta,$evapermiso,$evaconsulta,$jorpermiso,$jorconsulta,$manpermiso,$manconsulta,$matpermiso,$matconsulta,$mobpermiso,$mobconsulta,$pagopermiso,$pagoconsulta,$pedidopermiso,$pedidoconsulta,$produpermiso,$produconsulta,$provepermiso,$proveconsulta,$proyepermiso,$proyeconsulta,$rempermiso,$remconsulta,$usuariopermiso,$usuarioconsulta,$ventapermiso,$ventaconsulta){
			$this-> sentencia = "INSERT INTO permisos VALUES (null,'$IDusuario','$actpermiso', '$actconsulta', '$asispermiso', '$asisconsulta', '$balpermiso', '$balconsulta', '$clipermiso', '$cliconsulta', '$compermiso', '$comconsulta', '$dcompermiso', '$dcomconsulta', '$devpermiso', '$devconsulta', '$emppermiso', '$empconsulta', '$evapermiso', '$evaconsulta', '$jorpermiso', '$jorconsulta', '$manpermiso', '$manconsulta', '$matpermiso', '$matconsulta', '$mobpermiso', '$mobconsulta', '$pagopermiso', '$pagoconsulta', '$pedidopermiso', '$pedidoconsulta', '$produpermiso', '$produconsulta', '$provepermiso', '$proveconsulta', '$proyepermiso', '$proyeconsulta', '$rempermiso', 'remconsulta', '$usuariopermiso', '$usuarioconsulta', '$ventapermiso', '$ventaconsulta')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDpermiso){
			$this-> sentencia = "DELETE FROM permisos WHERE IDpermiso = $IDpermiso";
			$this-> ejecutarSentencia();
		}

		public function consulta()
			$this-> sentencia = "SELECT * FROM permisos";
			return $this-> obtenerSentencia();
	}
 ?>