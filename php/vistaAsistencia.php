<form action="" method="post">
	<input type="date" name="Fecha" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2 }"> 
	<br>
	<input type="text" name="IDempleado" placeholder="IDempleado">
	<br>
	<input type="time" name="Hora">
	<br>
	<input type="submit" name="alta" value="Guardar Usuario">
</form>

<?php 
		require_once("asistencia.php");
			$obj= new Asistencia();
		if (isset($_POST["alta"])) {
			$IDasistencia = $_POST["IDasistencia"];
			$Fecha = $_POST["Fecha"];
			$IDempleado = $_POST["IDempleado"];
			$Hora = $_POST["Hora"];
			$obj-> alta($IDasistencia,$Fecha,$IDempleado,$Hora);
			echo "<h2>Asistencia Registrada</h2>";
		}
 ?>
