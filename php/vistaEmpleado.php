<form action="" method="post">
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
	<input type="text" name="fechadeingreso" placeholder="Fecha de Ingreso">
	<br>
	<input type="text" name="carga" placeholder="Cargo">
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
<?php 
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
		$carga = $_POST["carga"];
		$salario = $_POST["salario"];
		$estadocivil = $_POST["estadocivil"];
		$nss = $_POST["nss"];
		$obj-> alta($nombre,$appaterno,$apmaterno,$correo,$rfc,$telefono,$sexo,$fechadeingreso,$carga,$salario,$estadocivil,$nss);
		echo "<h2> Empleado Agregado </h2>";	
	}
 ?>