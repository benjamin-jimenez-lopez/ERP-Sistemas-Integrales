<form action="" method="post">
	<input type="datetime" name="fechainicio" placeholder="Fecha de Inicio">
	<br>
	<input type="datetime" name="fechafin" placeholder="Fecha de Fin">
	<br>
	<input type="datetime" name="total" placeholder="Total">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Balance">
	<br>
</form>

<?php 
	require_once("balance.php");
		$obj= new Balance();
	if (isset($_POST["alta"])) {
		$fechainicio = $_POST["fechainicio"];
		$fechafin = $_POST["fechafin"];
		$total = $_POST["total"];
		$obj-> alta($fechainicio,$fechafin,$total);
		echo "<h2>Balance Guardado</h2>";
	}
	
 ?>