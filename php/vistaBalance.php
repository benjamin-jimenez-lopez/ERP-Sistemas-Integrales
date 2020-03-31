	<?php
	require_once("balance.php");
	$obj = new Balance();
	if (!isset($_POST["modificar"])) { 
	?>
<form action="" method="post">
	<h2>Balance</h2>
	<input type="date" name="fechainicio" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	<br>
	<br>
	<input type="date" name="fechafin" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	<br>
	<br>
	<input type="text" name="total" placeholder="Total">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Balance">
	<br>
</form>
<?php }else{ 
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
	<input type="date" name="fechainicio" placeholder="Fecha de inicio:" value="<?php echo $fila['fechainicio']; ?>">
	<br>
	<input type="date" name="fechafin" placeholder="Fecha de fin:" value="<?php echo $fila['fechafin']; ?>"> 
	<br>
	<input type="text" name="total" value="<?php echo $fila['total']; ?>">
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Balance">

</form>

<?php }
	require_once("balance.php");
		$obj= new Balance();
	if (isset($_POST["alta"])) {
		$fechainicio = $_POST["fechainicio"];
		$fechafin = $_POST["fechafin"];
		$total = $_POST["total"];
		$obj-> alta($fechainicio,$fechafin,$total);
		echo "<script>
			alert('Balance Guardado');
			window.location.href = 'home.php?sec=bal';
			</script>";
	}
	if(isset($_POST["mod"])){
		$fechainicio = $_POST["fechainicio"];
		$fechafin = $_POST["fechafin"];
		$total = $_POST["total"];
		$id = $_POST["id"];
		$obj-> modificar($fechainicio,$fechafin,$total,$id);
		echo "<script> 
				alert('Balance Modificado');
				window.location.href = 'home.php?sec=bal';
				</script>";
		}
	if (isset($_POST["eliminar"])) {
			echo "<script> 
				var opcion = confirm('¿Deseas eliminar el balance?');
				if(opcion===true){
					window.location.href = 'home.php?sec=bal&el=".$_POST["id"]."';
				}
			</script>";
		}
		if (isset($_GET["el"])) {
			$obj-> baja($_GET["el"]);
			echo "<script>
			alert('Balance eliminando');
			window.location.href = 'home.php?sec=bal';
			</script>";
		}
 ?>
 <table>
	<tr>
		<th>Fecha de Inicio</th>
		<th>Fecha de Fin</th>
		<th>Total</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["fechainicio"]."</td>";
			echo "<td>".$fila["fechafin"]."</td>";
			echo "<td>".$fila["total"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDbalance']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDbalance']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
