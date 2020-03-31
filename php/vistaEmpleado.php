<?php 
	require_once("empleado.php");
	$obj = new Empleado();
	if (!isset($_POST["modificar"])) { 
	?>
<form action="" method="post">
	<h2>Empleados</h2>
	<input type="text" name="nombre" placeholder="Nombre">
	<br>
	<input type="text" name="appaterno" placeholder="Apellido Paterno">
	<br>
	<input type="text" name="apmaterno" placeholder="Apellido Materno">
	<br>
	<input type="text" name="correo" placeholder="Correo">
	<br>
	<input type="text" name="rfc" placeholder="RFC">
	<br>
	<input type="text" name="telefono" placeholder="Telefono">
	<br>
	<input type="text" name="sexo" placeholder="Sexo">
	<br>
	<input type="date" name="fechadeingreso" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	<br>
	<input type="text" name="cargo" placeholder="Cargo">
	<br>
	<input type="text" name="salario" placeholder="Salario">
	<br>
	<input type="text" name="estadocivil" placeholder="Estado Civil">
	<br>
	<input type="text" name="nss" placeholder="NSS">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Empleado">
</form>
<?php }else{ 
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
	<h2>Empleados</h2>
	<input type="text" name="nombre" placeholder="Nombre" value="<?php echo $fila['nombre']; ?>">
	<br>
	<input type="text" name="appaterno" placeholder="Apellido Paterno" value="<?php echo $fila['appaterno']; ?>">
	<br>
	<input type="text" name="apmaterno" placeholder="Apellido Materno" value="<?php echo $fila['apmaterno']; ?>">
	<br>
	<input type="text" name="correo" placeholder="Correo" value="<?php echo $fila['correo']; ?>">
	<br>
	<input type="text" name="rfc" placeholder="RFC" value="<?php echo $fila['rfc']; ?>">
	<br>
	<input type="text" name="telefono" placeholder="Telefono" value="<?php echo $fila['telefono']; ?>">
	<br>
	<input type="text" name="sexo" placeholder="Sexo" value="<?php echo $fila['sexo']; ?>">
	<br>
	<input type="date" name="fechadeingreso" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $fila['fechadeingreso']; ?>">
	<br>
	<input type="text" name="cargo" placeholder="Cargo" value="<?php echo $fila['cargo']; ?>">
	<br>
	<input type="text" name="salario" placeholder="Salario" value="<?php echo $fila['salario']; ?>">
	<br>
	<input type="text" name="estadocivil" placeholder="Estado Civil" value="<?php echo $fila['estadocivil']; ?>">
	<br>
	<input type="text" name="nss" placeholder="NSS" value="<?php echo $fila['nss']; ?>">
	<br>
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Empleado">
</form>
	

<?php
		}
	require_once("empleado.php");
	$obj= new Empleado();
	if (isset($_POST["alta"])) {
		$nombre = $_POST["nombre"];
		$appaterno = $_POST["appaterno"];
		$apmaterno = $_POST["apmaterno"];
		$correo = $_POST["correo"];
		$rfc = $_POST["rfc"];
		$telefono = $_POST["telefono"];
		$sexo = $_POST["sexo"];
		$fechadeingreso = $_POST["fechadeingreso"];
		$cargo = $_POST["cargo"];
		$salario = $_POST["salario"];
		$estadocivil = $_POST["estadocivil"];
		$nss = $_POST["nss"];
		$obj-> alta($nombre,$appaterno,$apmaterno,$correo,$rfc,$telefono,$sexo,$fechadeingreso,$cargo,$salario,$estadocivil,$nss);
		echo "<script> 
				alert('Empleado Agregado');
				window.location.href = 'home.php?sec=emp';
				</script>";	
	}
 if(isset($_POST["mod"])){
		$nombre = $_POST["nombre"];
		$appaterno = $_POST["appaterno"];
		$apmaterno = $_POST["apmaterno"];
		$correo = $_POST["correo"];
		$rfc = $_POST["rfc"];
		$telefono = $_POST["telefono"];
		$sexo = $_POST["sexo"];
		$fechadeingreso = $_POST["fechadeingreso"];
		$cargo = $_POST["cargo"];
		$salario = $_POST["salario"];
		$estadocivil = $_POST["estadocivil"];
		$nss = $_POST["nss"];
		$id = $_POST["id"];
		$obj-> modificar($nombre,$appaterno,$apmaterno,$correo,$rfc,$telefono,$sexo,$fechadeingreso,$cargo,$salario,$estadocivil,$nss,$id);
		echo "<script> 
				alert('Empleado Modificado');
				window.location.href = 'home.php?sec=emp';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar al Empleado?');
			if(opcion===true){
				window.location.href = 'home.php?sec=emp&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Empleado eliminando');
		window.location.href = 'home.php?sec=emp';
		</script>";
	}
?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Correo</th>
		<th>RFC</th>
		<th>Telefono</th>
		<th>Sexo</th>
		<th>Fecha de Ingreso</th>
		<th>Cargo</th>
		<th>Salario</th>
		<th>Estado Civil</th>
		<th>NSS</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["appaterno"]."</td>";
			echo "<td>".$fila["apmaterno"]."</td>";
			echo "<td>".$fila["correo"]."</td>";
			echo "<td>".$fila["rfc"]."</td>";
			echo "<td>".$fila["telefono"]."</td>";
			echo "<td>".$fila["sexo"]."</td>";
			echo "<td>".$fila["fechadeingreso"]."</td>";
			echo "<td>".$fila["cargo"]."</td>";
			echo "<td>".$fila["salario"]."</td>";
			echo "<td>".$fila["estadocivil"]."</td>";
			echo "<td>".$fila["nss"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDempleado']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDempleado']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
