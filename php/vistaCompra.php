<form action="" method="post">
	<input type="text" name="fecha" placeholder="Fecha (Y-m-d)">
	<br>
	<input type="text" name="total" placeholder="Total">
	<br>
	<input type="text" name="tipo_pago" placeholder="Tipo de Pago">
	<br>
	<input type="text" name="id_cliente" placeholder="ID cliente">
	<br>
	<br>
	<input type="sumbit" name="alta" value="Guardar Compra">
</form>
<?php 
	require_once("compra.php");
	$obj= new Compra();
	if (isset($_POST["alta"])) {
		$fecha = $_POST["fecha"];
		$total = $_POST["total"];
		$tipo_pago = $_POST["tipo_pago"];
		$id_cliente = $_POST["id_cliente"];
		$obj-> alta($fecha,$total,$tipo_pago,$id_cliente);
		echo "<h2> Compra Guardada </h2>";
	}
 ?>