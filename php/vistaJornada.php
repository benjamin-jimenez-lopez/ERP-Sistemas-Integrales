<?php 
	require_once("jornada.php");
	$obj = new Jornada();
	if (!isset($_POST["modificar"])) { 
	?>
<form action="" method="post">
	<h2>Jornada</h2>
	<input type="text" name="hrs_trabajadas" placeholder="Horas Trabajadas:">
	<br>
	<input type="text" name="dias_trabajados" placeholder="Dias Trabajados:">
	<br>
	<input type="text" name="pago_hora" placeholder="Pago Hora:">
	<br>
	<input type="text" name="horas_extra" placeholder="Horas Extras:">
	<br>
	<input type="text" name="bonos" placeholder="bonos">
	<br>
	<input type="text" name="IDempleado" placeholder="ID Empleado:">
	<br>
	<input type="submit" name="alta" value="Guardar Jornada">

</form>

<?php }else{ 
	$res = $obj->buscar($_POST["id"]);
	$fila = $res->fetch_assoc();
	?>
<form action="" method="post">
	<h2>Jornada</h2>
	<input type="text" name="hrs_trabajadas" placeholder="Horas Trabajadas:" value="<?php echo $fila['hrs_trabajadas']; ?>">
	<br>
	<input type="text" name="dias_trabajados" placeholder="Dias Trabajados:" value="<?php echo $fila['dias_trabajados']; ?>">
	<br>
	<input type="text" name="pago_hora" placeholder="Pago Hora:" value="<?php echo $fila['pago_hora']; ?>">
	<br>
	<input type="text" name="horas_extra" placeholder="Horas Extras:" value="<?php echo $fila['horas_extra']; ?>">
	<br>
	<input type="text" name="bonos" placeholder="bonos" value="<?php echo $fila['bonos']; ?>">
	<br>
	<input type="text" name="IDempleado" placeholder="ID Empleado:" value="<?php echo $fila['IDempleado']; ?>">
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Jornada">

</form> 

<?php
		}
		require_once("jornada.php");
		$obj = new Jornada();
	if(isset($_POST["alta"])){
		$hrs_trabajadas = $_POST["hrs_trabajadas"];
		$dias_trabajados = $_POST["dias_trabajados"];
		$pago_hora = $_POST["pago_hora"];
		$horas_extra = $_POST["horas_extra"];
		$bonos = $_POST["bonos"];
		$IDempleado = $_POST["IDempleado"];
		$obj-> alta($hrs_trabajadas, $dias_trabajados, $pago_hora, $horas_extra, $bonos, $IDempleado);
		echo "<script> 
				alert('Jornada Registrada');
				window.location.href = 'home.php?sec=jor';
				</script>";
	}
	if(isset($_POST["mod"])){
		$hrs_trabajadas = $_POST["hrs_trabajadas"];
		$dias_trabajados = $_POST["dias_trabajados"];
		$pago_hora = $_POST["pago_hora"];
		$horas_extra = $_POST["horas_extra"];
		$bonos = $_POST["bonos"];
		$IDempleado = $_POST["IDempleado"];
		$id = $_POST["id"];
		$obj-> modificar($hrs_trabajadas, $dias_trabajados, $pago_hora, $horas_extra, $bonos, $IDempleado,$id);
		echo "<h2>Jornada Modificada</h2>";
		//echo "<script> 
		//		alert('Jornada Modificada');
		//		window.location.href = 'home.php?sec=jor';
		//		</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar la Jornada?');
			if(opcion===true){
				window.location.href = 'home.php?sec=jor&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Jornada eliminanda');
		window.location.href = 'home.php?sec=jor';
		</script>";
	}

?>
<table>
	<tr>
		<th>Horas Trabajadas</th>
		<th>Dias Trabajados</th>
		<th>Pago x Hora</th>
		<th>Horas Extras</th>
		<th>Bonos</th>
		<th>IDempleado</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<td>".$fila["hrs_trabajadas"]."</td>";
			echo "<td>".$fila["dias_trabajados"]."</td>";
			echo "<td>".$fila["pago_hora"]."</td>";
			echo "<td>".$fila["horas_extra"]."</td>";
			echo "<td>".$fila["bonos"]."</td>";
			echo "<td>".$fila["IDempleado"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDjornada']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDjornada']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>