<?php 
	require_once("detalle_compra.php");
	$obj = new Detalle_compra();
	if (!isset($_POST["modificar"])) { 
	?>
<form action="" method="post">
	<h2>Detalle de la Compra</h2>
	<input type="text" name="IDmateriaprima" placeholder="ID Materia Prima">
	<br>
	<input type="text" name="IDcompra" placeholder="ID Compra">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Detalle">
</form>
<?php }else{
	$res = $obj->buscar($_POST["id"]);
	$fila = $res->fetch_assoc();
	?>
<form action="" method="post">
	<h2>Detalle de la Compra</h2>
	<input type="text" name="IDmateriaprima" placeholder="ID Materia Prima" value="<?php echo $fila['IDmateriaprima'];?>">
	<br>
	<input type="text" name="IDcompra" placeholder="ID Compra" value="<?php echo $fila['IDcompra']; ?>">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $fila['cantidad']; ?>">
	<br>
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Detalle">
</form>
<?php
}
	require_once("detalle_compra.php");
	$obj= new Detalle_compra();
	if (isset($_POST["alta"])) {
		$IDmateriaprima = $_POST["IDmateriaprima"];
		$IDcompra = $_POST["IDcompra"];
		$cantidad = $_POST["cantidad"];
		$obj-> alta($IDmateriaprima,$IDcompra,$cantidad);
		echo "<script> 
				alert('Detalle de la Compra Agregado');
				window.location.href = 'home.php?sec=det_com';
				</script>";
	}
 if(isset($_POST["mod"])){
		$IDmateriaprima = $_POST["IDmateriaprima"];
		$IDcompra = $_POST["IDcompra"];
		$cantidad = $_POST["cantidad"];	
		$id = $_POST["id"];
		$obj-> modificar($IDmateriaprima,$IDcompra,$cantidad,$id);
		echo "<script> 
				alert('Producto Modificado');
				window.location.href = 'home.php?sec=det_com';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar el Producto?');
			if(opcion===true){
				window.location.href = 'home.php?sec=det_com&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Producto eliminando');
		window.location.href = 'home.php?sec=det_com';
		</script>";
	}
?>
<table>
	<tr>
		<th>ID Materia Prima</th>
		<th>ID Compra</th>
		<th>Cantidad</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<td>".$fila["IDmateriaprima"]."</td>";
			echo "<td>".$fila["IDcompra"]."</td>";
			echo "<td>".$fila["cantidad"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDdetallecompra']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDdetallecompra']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>

