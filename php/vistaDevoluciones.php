<form action="" method="post">
	<input type="text" name="fecha" placeholder="Fecha">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad">
	<br>
	<input type="text" name="descripcion" placeholder="Descripcion">
	<br>
	<input type="text" name="IDproducto" placeholder="ID Producto">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Devolucion">
	
</form>
<?php 
	require_once("devoluciones.php");
	$obj= new Devolucion();
	if (isset($_POST["alta"])) {
		$fecha = $_POST["fecha"];
		$cantidad = $_POST["cantidad"];
		$descripcion = $_POST["descripcion"];
		$IDproducto = $_POST["IDproducto"];
		$obj-> alta($fecha,$cantidad,$descripcion,$IDproducto);
		echo "<h2> Devolucion Guardada </h2>";
	}
 ?>