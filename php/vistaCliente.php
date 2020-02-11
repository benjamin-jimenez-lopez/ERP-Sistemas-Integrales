<form action="" method="post">
	<input type="text" name="nombre" placeholder="Nombre">
	<br>
	<input type="text" name="direccion" placeholder="Direccion">
	<br>
	<input type="text" name="telefono" placeholder="Telefono">
	<br>
	<input type="text" name="correo" placeholder="Correo">
	<br>
	<input type="text" name="apematerno" placeholder="Apellido Materno">
	<br>
	<input type="text" name="apepaterno" placeholder="Apellido Paterno">
	<br>
	<input type="text" name="sexo" placeholder="Sexo">
	<br>
	<input type="text" name="fenacimiento" placeholder="Fecha de Nacimiento">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Cliente">
</form>
<?php 
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
			echo "<h2> Cliente Guardado </h2>";
		}
 ?>