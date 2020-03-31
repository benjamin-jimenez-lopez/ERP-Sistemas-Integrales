<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="devoluciones" name="tabla">
    <input type="hidden" value="cantidad" name="dato">
    <input type="hidden" value="IDproducto" name="encabezado">
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>
<?php 
  if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
  }
 ?>
 <?php 
	require_once("devoluciones.php");
	$obj = new Devoluciones();
	if (!isset($_POST["modificar"])) { 
	?>

<form action="" method="post">
	<h2>Devoluciones</h2>
	<input type="date" name="fecha"  required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad">
	<br>
	<input type="text" name="descripcion" placeholder="Descripcion">
	<br>
	<input type="text" name="IDproducto" placeholder="ID Producto">
	<br>
	<br>
	<input type="submit" name="alta" value="Guardar Devolucion">
	
</form>
<?php }else{
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
		<h2>Devoluciones</h2>
	<input type="date" name="fecha"  required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $fila['fecha']; ?>">
	<br>
	<input type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $fila['cantidad']; ?>">
	<br>
	<input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $fila['descripcion']; ?>">
	<br>
	<input type="text" name="IDproducto" placeholder="ID Producto" value="<?php echo $fila['IDproducto']; ?>">
	<br>
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Devolucion">
	
</form>
}
<?php }
	require_once("devoluciones.php");
	$obj= new Devoluciones();
	if (isset($_POST["alta"])) {
		$fecha = $_POST["fecha"];
		$cantidad = $_POST["cantidad"];
		$descripcion = $_POST["descripcion"];
		$IDproducto = $_POST["IDproducto"];
		$obj-> alta($fecha,$cantidad,$descripcion,$IDproducto);
		echo "<script> 
				alert('Devolucion Guardada');
				window.location.href = 'home.php?sec=dev';
				</script>";
	}
	if(isset($_POST["mod"])){
		$fecha = $_POST["fecha"];
		$cantidad = $_POST["cantidad"];
		$descripcion = $_POST["descripcion"];
		$IDproducto = $_POST["IDproducto"];	
		$id = $_POST["id"];
		$obj-> modificar($fecha,$cantidad,$descripcion,$IDproducto,$id);
		echo "<script> 
				alert('Devolucion Modificado');
				window.location.href = 'home.php?sec=dev';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar la Devolucion?');
			if(opcion===true){
				window.location.href = 'home.php?sec=dev&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Devolucion eliminando');
		window.location.href = 'home.php?sec=dev';
		</script>";
	}
?>
<table>
	<tr>
		<th>Fecha</th>
		<th>Cantidad</th>
		<th>Descripcion</th>
		<th>ID Producto</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["cantidad"]."</td>";
			echo "<td>".$fila["descripcion"]."</td>";
			echo "<td>".$fila["IDproducto"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDdevoluciones']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDdevoluciones']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
