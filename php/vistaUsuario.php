<form action="" method="post">
	<input type="text" name="nombre" placeholder="Name:">
	<br>
	<input type="password" name="password" placeholder="Password"> <br>
	Tipo: <br>
	<select name="tipo">
		<option value="1">Admin</option>
		<option value="2">Usuario</option>
	</select> <br>
	<input type="submit" name="alta" value="Guardar Usuario">

</form>

<?php 
		require_once("usuario.php");
		$obj = new Usuario();
	if(isset($_POST["alta"])){
		$nombre = $_POST["nombre"];
		$password = $_POST["password"];
		$tipo = $_POST["tipo"];
		$obj-> alta($nombre,$tipo,$password);
		echo "<script> 
				alert('Usuario Registrado');
				window.location.href = 'index.php';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar el Usuario?');
			if(opcion===true){
				window.location.href = 'index.php?el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Usuario eliminando');
		window.location.href = 'index.php';
		</script>";
	}

?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Password</th>
		<th>Tipo</th>
		<th></th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>***********</td>";
			echo "<td>".$fila["tipo"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDusuario']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>