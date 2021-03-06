<?php 
	
	require_once("conexion.php");
	class Permisos extends Conexion{

		public function alta($IDusuario,$actpermiso,$actconsulta,$asispermiso,$asisconsulta,$balpermiso,$balconsulta,$clipermiso,$cliconsulta,$compermiso,$comconsulta,$dcompermiso,$dcomconsulta,$devpermiso,$devconsulta,$emppermiso,$empconsulta,$evapermiso,$evaconsulta,$jorpermiso,$jorconsulta,$manpermiso,$manconsulta,$matpermiso,$matconsulta,$mobpermiso,$mobconsulta,$pagopermiso,$pagoconsulta,$pedidopermiso,$pedidoconsulta,$produpermiso,$produconsulta,$provepermiso,$proveconsulta,$proyepermiso,$proyeconsulta,$rempermiso,$remconsulta,$usuariopermiso,$usuarioconsulta,$ventapermiso,$ventaconsulta){
			$this-> sentencia = "INSERT INTO permisos VALUES (null,'$IDusuario','$actpermiso', '$actconsulta', '$asispermiso', '$asisconsulta', '$balpermiso', '$balconsulta', '$clipermiso', '$cliconsulta', '$compermiso', '$comconsulta', '$dcompermiso', '$dcomconsulta', '$devpermiso', '$devconsulta', '$emppermiso', '$empconsulta', '$evapermiso', '$evaconsulta', '$jorpermiso', '$jorconsulta', '$manpermiso', '$manconsulta', '$matpermiso', '$matconsulta', '$mobpermiso', '$mobconsulta', '$pagopermiso', '$pagoconsulta', '$pedidopermiso', '$pedidoconsulta', '$produpermiso', '$produconsulta', '$provepermiso', '$proveconsulta', '$proyepermiso', '$proyeconsulta', '$rempermiso', 'remconsulta', '$usuariopermiso', '$usuarioconsulta', '$ventapermiso', '$ventaconsulta')";
			$this-> ejecutarSentencia();
		}

		public function baja($IDpermiso){
			$this-> sentencia = "DELETE permisos WHERE IDpermiso = $IDpermiso";
			$this-> ejecutarSentencia();
		}

		public function consulta(){
			$this-> sentencia = "SELECT * FROM permisos";
			return $this-> obtenerSentencia();
		}
		public function modificar($IDusuario,$actpermiso,$actconsulta,$asispermiso,$asisconsulta,$balpermiso,$balconsulta,$clipermiso,$cliconsulta,$compermiso,$comconsulta,$dcompermiso,$dcomconsulta,$devpermiso,$devconsulta,$emppermiso,$empconsulta,$evapermiso,$evaconsulta,$jorpermiso,$jorconsulta,$manpermiso,$manconsulta,$matpermiso,$matconsulta,$mobpermiso,$mobconsulta,$pagopermiso,$pagoconsulta,$pedidopermiso,$pedidoconsulta,$produpermiso,$produconsulta,$provepermiso,$proveconsulta,$proyepermiso,$proyeconsulta,$rempermiso,$remconsulta,$usuariopermiso,$usuarioconsulta,$ventapermiso,$ventaconsulta,$id){
			$this-> sentencia = "UPDATE FROM permisos SET IDusuario='$IDusuario',actpermiso='$actpermiso',actconsulta='$actconsulta',asispermiso='$asispermiso',asisconsulta='$asisconsulta',balpermiso='$balpermiso',balconsulta='$balconsulta',clipermiso='$clipermiso',cliconsulta='$cliconsulta',compermiso='$compermiso',comconsulta='$comconsulta',dcompermiso='$dcompermiso',dcomconsulta='$dcomconsulta',devpermiso='$devpermiso',devconsulta='$devconsulta',emppermiso='$emppermiso',empconsulta='$empconsulta',evapermiso='$evapermiso',evaconsulta='$evaconsulta',jorpermiso='$jorpermiso',jorconsulta='$jorconsulta',manpermiso='$manpermiso',manconsulta='$manconsulta',matpermiso='$matpermiso',matconsulta='$matconsulta',mobpermiso='$mobpermiso',mobconsulta='$mobconsulta',pagopermiso='$pagopermiso',pagoconsulta='$pagoconsulta',pedidopermiso='$pedidopermiso',pedidoconsulta='$pedidoconsulta',produpermiso='$produpermiso',produconsulta='$produconsulta',provepermiso='$provepermiso',proveconsulta='$proveconsulta',proyepermiso='$proyepermiso',proyeconsulta='$proyeconsulta',rempermiso='$rempermiso',remconsulta='$remconsulta',usuariopermiso='$usuariopermiso',usuarioconsulta='$usuarioconsulta',ventapermiso='$ventapermiso',ventaconsulta='$ventaconsulta' WHERE IDpermiso='$id'";
			$this-> ejecutarSentencia();
		}
		public function buscar($id){
			$this->sentencia = "SELECT * FROM permisos WHERE IDpermiso=$id";
			return $this->obtenerSentencia();
		}
	}
 ?>