<?php 
	require_once("asistencia.php");
	$obj = new Asistencia();
	if (!isset($_POST["modificar"])) {  
	?>
<form action="" method="post">
	<h2>Asistencia</h2>
	<input type="date" name="Fecha" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> 
	<br>
	<br>
	<input type="text" name="IDempleado" placeholder="IDempleado">
	<br>
	<br>
	<input type="time" name="Hora">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Usuario">
</form>
<?php }else{ 
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
	<input type="date" name="Fecha" placeholder="Fecha:" value="<?php echo $fila['Fecha']; ?>">
	<br>
	<input type="text" name="IDempleado" placeholder="IDempleado" value="<?php echo $fila['IDempleado']; ?>"> 
	<br>
	<input type="time" name="Hora" value="<?php echo $fila['Hora']; ?>">
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Asistencia">

</form>

<?php }
		require_once("asistencia.php");
			$obj= new Asistencia();
		if (isset($_POST["alta"])) {
			$Fecha = $_POST["Fecha"];
			$IDempleado = $_POST["IDempleado"];
			$Hora = $_POST["Hora"];
			$obj-> alta($Fecha,$IDempleado,$Hora);
			echo "<script>
					alert('Asistencia Agregada');
				window.location.href = 'home.php?sec=asis';
				</script>";
		}
		if(isset($_POST["mod"])){
		$Fecha = $_POST["Fecha"];
		$IDempleado = $_POST["IDempleado"];
		$Hora = $_POST["Hora"];
		$id = $_POST["id"];
		$obj-> modificar($Fecha,$IDempleado,$Hora,$id);
		echo "<script> 
				alert('Asistencia Modificado');
				window.location.href = 'home.php?sec=asis';
				</script>";
		}
		if (isset($_POST["eliminar"])) {
			echo "<script> 
				var opcion = confirm('¿Deseas eliminar la asistencia?');
				if(opcion===true){
					window.location.href = 'home.php?sec=asis&el=".$_POST["id"]."';
				}
			</script>";
		}
		if (isset($_GET["el"])) {
			$obj-> baja($_GET["el"]);
			echo "<script>
			alert('Asistencia eliminanda');
			window.location.href = 'home.php?sec=asis';
			</script>";
		}
 ?>
 <table>
	<tr>
		<th>Fecha</th>
		<th>ID Empleado</th>
		<th>Hora</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["Fecha"]."</td>";
			echo "<td>".$fila["IDempleado"]."</td>";
			echo "<td>".$fila["Hora"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDasistencia']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDasistencia']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
