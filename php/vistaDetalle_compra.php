<form action="" method="post">
	<input type="text" name="IDmateriaprima" placeholder="ID Materia Prima">
	<br>
	<input type="text" name="IDcompra" placeholder="ID Compra">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Detalle">
</form>
<?php 
	require_once("detalle_compra.php");
	$obj= new Detalle_compra();
	if (isset($_POST["alta"])) {
		$IDmateriaprima = $_POST["IDmateriaprima"];
		$IDcompra = $_POST["IDcompra"];
		$cantidad = $_POST["cantidad"];
		$obj-> alta($IDmateriaprima,$IDcompra,$cantidad);
		echo "<h2> Detalle Guardado </h2>";
	}
 ?>