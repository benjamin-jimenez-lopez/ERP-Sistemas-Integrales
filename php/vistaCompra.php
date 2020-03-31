<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="compra" name="tabla">
    <input type="hidden" value="total" name="dato">
    <input type="hidden" value="id_cliente" name="encabezado">
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>
<?php 
  if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
  }
 ?>
<?php 
	require_once("compra.php");
	$obj = new Compra();
	if (!isset($_POST["modificar"])) { 
	?>
<form action="" method="post">
	<h2>Compra</h2>
	<input type="date" name="fecha" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	<br>
	<input type="text" name="total" placeholder="Total">
	<br>
	<input type="text" name="tipo_pago" placeholder="Tipo de Pago">
	<br>
	<input type="text" name="id_cliente" placeholder="ID cliente">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Compra">
</form>
<?php }else{
	$res = $obj->buscar($_POST["id"]);
	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
	<h2>Compra</h2>
	<input type="date" name="fecha"  required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $fila['fecha']; ?>">
	<br>
	<input type="text" name="total" placeholder="Total" value="<?php echo $fila['total']; ?>">
	<br>
	<input type="text" name="tipo_pago" placeholder="Tipo de Pago" value="<?php echo $fila['tipo_pago']; ?>">
	<br>
	<input type="text" name="id_cliente" placeholder="ID cliente" value="<?php echo $fila['id_cliente']; ?>">
	<br>
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="alta" value="Guardar Compra">
</form>
<?php
}
	require_once("compra.php");
	$obj= new Compra();
	if (isset($_POST["alta"])) {
		$fecha = $_POST["fecha"];
		$total = $_POST["total"];
		$tipo_pago = $_POST["tipo_pago"];
		$id_cliente = $_POST["id_cliente"];
		$obj-> alta($fecha,$total,$tipo_pago,$id_cliente);
		echo "<script> 
				alert('Compra Registrado');
				window.location.href = 'home.php?sec=com';
				</script>";
	}
	if(isset($_POST["mod"])){
		$fecha = $_POST["fecha"];
		$total = $_POST["total"];
		$tipo_pago = $_POST["tipo_pago"];
		$id_cliente = $_POST["id_cliente"];	
		$id = $_POST["id"];
		$obj-> modificar($fecha,$total,$tipo_pago,$id_cliente,$id);
		echo "<script> 
				alert('Compra Modificado');
				window.location.href = 'home.php?sec=com';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar la Compra?');
			if(opcion===true){
				window.location.href = 'home.php?sec=com&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Compra eliminando');
		window.location.href = 'home.php?sec=com';
		</script>";
	}
 ?>
<table>
	<tr>
		<th>Fecha</th>
		<th>Total</th>
		<th>Tipo de Pago</th>
		<th>ID Cliente</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["total"]."</td>";
			echo "<td>".$fila["tipo_pago"]."</td>";
			echo "<td>".$fila["id_cliente"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDcompra']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDcompra']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
