<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="mantenimiento" name="tabla">
    <input type="hidden" value="costo_man" name="dato">
    <input type="hidden" value="area" name="encabezado">
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>
<?php 
  if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
  }
 ?>
 <?php 
	require_once("mantenimiento.php");
	$obj = new Mantenimiento();
	if (!isset($_POST["modificar"])) { 
	?>

<form action="" method="post">
	<input type="date" name="fecha_man"  required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	<br>
	<input type="text" name="area" placeholder="Area">
	<br>
	<input type="text" name="IDmob" placeholder="ID Mobiliario">
	<br>
	<input type="text" name="costo_man" placeholder="Costo del Mantenimiento">
	<br>
	<input type="text" name="IDempleado" placeholder="ID empleado">
	<br>
	<input type="submit" name="alta" value="Guardar Devolucion">
	
</form>
<?php }else{
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
	<input type="date" name="fecha_man"  required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $fila['fecha_man']; ?>">
	<br>
	<input type="text" name="area" placeholder="Area" value="<?php echo $fila['area']; ?>">
	<br>
	<input type="text" name="IDmob" placeholder="ID Mobiliario" value="<?php echo $fila['IDmob']; ?>">
	<br>
	<input type="text" name="costo_man" placeholder="Costo del Mantenimiento" value="<?php echo $fila['costo_man']; ?>">
	<br>
	<input type="text" name="IDempleado" placeholder="IDempleado" value="<?php echo $fila['IDempleado']; ?>">
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="alta" value="Guardar Devolucion">
	
</form>
}
<?php }
	require_once("mantenimiento.php");
	$obj= new Mantenimiento();
	if (isset($_POST["alta"])) {
		$fecha_man = $_POST["fecha_man"];
		$area = $_POST["area"];
		$IDmob = $_POST["IDmob"];
		$costo_man = $_POST["costo_man"];
		$IDempleado = $_POST["IDempleado"];
		$obj-> alta($fecha_man,$area,$IDmob, $costo_man, $IDempleado);
		echo "<script> 
				alert('Mantenimiento Registrado');
				window.location.href = 'home.php?sec=mante';
				</script>";
	}
	if(isset($_POST["mod"])){
		$fecha_man = $_POST["fecha_man"];
		$area = $_POST["area"];
		$IDmob = $_POST["IDmob"];
		$costo_man = $_POST["costo_man"];
		$IDempleado = $_POST["IDempleado"];
		$id = $_POST["id"];
		$obj-> modificar($fecha_man,$area,$IDmob, $costo_man, $IDempleado,$id);
		echo "<script> 
				alert('Mantenimiento Modificado');
				window.location.href = 'home.php?sec=mante';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar el Mantenimiento?');
			if(opcion===true){
				window.location.href = 'home.php?sec=mante&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Devolucion eliminando');
		window.location.href = 'home.php?sec=mante';
		</script>";
	}
?>
<table>
	<tr>
		<th>Fecha del Mantenimiento</th>
		<th>Area</th>
		<th>ID mobiliario</th>
		<th>Costo del Mantenimiento</th>
		<th>ID empleado</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<td>".$fila["fecha_man"]."</td>";
			echo "<td>".$fila["area"]."</td>";
			echo "<td>".$fila["IDmob"]."</td>";
			echo "<td>".$fila["costo_man"]."</td>";
			echo "<td>".$fila["IDempleado"];
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDmantenimiento']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDmantenimiento']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
