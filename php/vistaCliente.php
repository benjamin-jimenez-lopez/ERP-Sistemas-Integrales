<?php 
	require_once("cliente.php");
	$obj = new Cliente();
	if (!isset($_POST["modificar"])) { 
	?>
<form action="" method="post">
	<h2>Clientes</h2>
	<input type="text" name="nombre" placeholder="Nombre">
	<br>
	<input type="text" name="apematerno" placeholder="Apellido Materno">
	<br>
	<input type="text" name="apepaterno" placeholder="Apellido Paterno">
	<br>
	<input type="text" name="direccion" placeholder="Direccion">
	<br>
	<input type="text" name="telefono" placeholder="Telefono">
	<br>
	<input type="text" name="correo" placeholder="Correo">
	<br>
	<input type="text" name="sexo" placeholder="Sexo">
	<br>
	<input type="date" name="fenacimiento" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Cliente">
</form>

<?php }else{
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
	<input type="text" name="nombre" placeholder="Nombre" value="<?php echo $fila['nombre']; ?>">
	<br>
	<input type="text" name="apematerno" placeholder="Apellido Materno" value="<?php echo $fila['apematerno']; ?>">
	<br>
	<input type="text" name="apepaterno" placeholder="Apellido Paterno" value="<?php echo $fila['apepaterno']; ?>">
	<br>
	<input type="text" name="direccion" placeholder="Direccion" value="<?php echo $fila['direccion']; ?>">
	<br>
	<input type="text" name="telefono" placeholder="Telefono" value="<?php echo $fila['telefono']; ?>">
	<br>
	<input type="text" name="correo" placeholder="Correo" value="<?php echo $fila['correo']; ?>">
	<br>
	<input type="text" name="sexo" placeholder="Sexo" value="<?php echo $fila['sexo']; ?>">
	<br>
	<input type="text" name="fenacimiento" placeholder="Fecha de Nacimiento" value="<?php echo $fila['fenacimiento']; ?>">
	<br>
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Cliente">
</form>

<?php } 
	require_once("cliente.php");
		$obj= new CLiente();
		if (isset($_POST["alta"])) {
			$nombre = $_POST["nombre"];
			$direccion = $_POST["direccion"];
			$telefono = $_POST["telefono"];
			$correo = $_POST["correo"];
			$apematerno = $_POST["apematerno"];
			$apepaterno = $_POST["apepaterno"];
			$sexo = $_POST["sexo"];
			$fenacimiento = $_POST["fenacimiento"];
			$obj-> alta($nombre,$direccion,$telefono,$correo,$apematerno,$apepaterno,$sexo,$fenacimiento);
			echo "<script> 
				alert('Cliente Guardado');
				window.location.href = 'home.php?sec=cli';
				</script>";
		}
		if(isset($_POST["mod"])){
		$nombre = $_POST["nombre"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];
		$correo = $_POST["correo"];
		$apematerno = $_POST["apematerno"];
		$apepaterno = $_POST["apepaterno"];
		$sexo = $_POST["sexo"];
		$fenacimiento = $_POST["fenacimiento"];
		$id = $_POST["id"];
		$obj-> modificar($nombre,$direccion,$telefono,$correo,$apematerno,$apepaterno,$sexo,$fenacimiento,$id);
		echo "<script> 
				alert('Cliente Modificado');
				window.location.href = 'home.php?sec=cli';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar el Cliente?');
			if(opcion===true){
				window.location.href = 'home.php?sec=cli&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Cliente Eliminado');
		window.location.href = 'home.php?sec=cli';
		</script>";
	}

?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>Apellido Materno</th>
		<th>Apellido Paterno</th>
		<th>Sexo</th>
		<th>Fecha de Nacimiento</th>
		<th>Modificar</th>
		<th>Eliminar</th>
		<th></th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["direccion"]."</td>";
			echo "<td>".$fila["telefono"]."</td>";
			echo "<td>".$fila["correo"]."</td>";
			echo "<td>".$fila["apematerno"]."</td>";
			echo "<td>".$fila["apepaterno"]."</td>";
			echo "<td>".$fila["sexo"]."</td>";
			echo "<td>".$fila["fenacimiento"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDcliente']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDcliente']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
