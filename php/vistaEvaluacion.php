<?php 
	require_once("evaluacion.php");
	$obj = new Evaluacion();
	if (!isset($_POST["modificar"])) { 
	?>
<form action="" method="post">
	<h2>Evaluacion</h2>
	Tipo: <br>
     <select name="tipo">
        <option value="1">Admin</option>
        <option value="2">Usuario</option>
     </select> <br>  
     <br>
	<input type="text" name="pregunta1" placeholder="Pregunta 1:"> 
	<br>
	<input type="text" name="pregunta2" placeholder="Pregunta 2:"> 
	<br>
	<input type="text" name="pregunta3" placeholder="Pregunta 3:"> 
	<br>
	<input type="text" name="pregunta4" placeholder="Pregunta 4:"> 
	<br>
	<input type="text" name="pregunta5" placeholder="Pregunta 5:"> 
	<br>
	<input type="text" name="pregunta6" placeholder="Pregunta 6:"> 
	<br>
	<input type="text" name="pregunta7" placeholder="Pregunta 7:"> 
	<br>
	<input type="text" name="pregunta8" placeholder="Pregunta 8:"> 
	<br>
	<input type="text" name="pregunta9" placeholder="Pregunta 9:"> 
	<br>
	<input type="text" name="pregunta10" placeholder="Pregunta 10:"> 
	<br>
	<input type="submit" name="alta" value="Guardar Evaluacion">

</form>

<?php }else{ 
	$res = $obj->buscar($_POST["id"]);

	$fila = $res->fetch_assoc();
	?>
	<form action="" method="post">
	<h2>Evaluacion</h2>
	Tipo: <br>
     <select name="tipo">
        <option value="1">Admin</option>
        <option value="2">Usuario</option>
     </select> <br>  
     <br>
	<input type="text" name="pregunta1" placeholder="Pregunta 1:" value="<?php echo $fila['pregunta1']; ?>"> 
	<br>
	<input type="text" name="pregunta2" placeholder="Pregunta 2:" value="<?php echo $fila['pregunta2']; ?>"> 
	<br>
	<input type="text" name="pregunta3" placeholder="Pregunta 3:" value="<?php echo $fila['pregunta3']; ?>"> 
	<br>
	<input type="text" name="pregunta4" placeholder="Pregunta 4:" value="<?php echo $fila['pregunta4']; ?>"> 
	<br>
	<input type="text" name="pregunta5" placeholder="Pregunta 5:" value="<?php echo $fila['pregunta5']; ?>"> 
	<br>
	<input type="text" name="pregunta6" placeholder="Pregunta 6:" value="<?php echo $fila['pregunta6']; ?>"> 
	<br>
	<input type="text" name="pregunta7" placeholder="Pregunta 7:" value="<?php echo $fila['pregunta7']; ?>"> 
	<br>
	<input type="text" name="pregunta8" placeholder="Pregunta 8:" value="<?php echo $fila['pregunta8']; ?>"> 
	<br>
	<input type="text" name="pregunta9" placeholder="Pregunta 9:" value="<?php echo $fila['pregunta9']; ?>"> 
	<br>
	<input type="text" name="pregunta10" placeholder="Pregunta 10:" value="<?php echo $fila['pregunta10']; ?>"> 
	<br>
	<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
	<input type="submit" name="mod" value="Modificar Evaluacion">

</form>
	
<?php
		}
		require_once("evaluacion.php");
		$obj = new Evaluacion();
	if(isset($_POST["alta"])){
		$tipo = $_POST["tipo"];
		$pregunta1 = $_POST["pregunta1"];
		$pregunta2 = $_POST["pregunta2"];
		$pregunta3 = $_POST["pregunta3"];
		$pregunta4 = $_POST["pregunta4"];
		$pregunta5 = $_POST["pregunta5"];
		$pregunta6 = $_POST["pregunta6"];
		$pregunta7 = $_POST["pregunta7"];
		$pregunta8 = $_POST["pregunta8"];
		$pregunta9 = $_POST["pregunta9"];
		$pregunta10 = $_POST["pregunta10"];
		$obj-> alta($tipo,$pregunta1,$pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10);
		echo "<script> 
				alert('Evaluacion Registrado');
				window.location.href = 'home.php?sec=eva';
				</script>";
	}
	if(isset($_POST["mod"])){
		$tipo = $_POST["tipo"];
		$pregunta1 = $_POST["pregunta1"];
		$pregunta2 = $_POST["pregunta2"];
		$pregunta3 = $_POST["pregunta3"];
		$pregunta4 = $_POST["pregunta4"];
		$pregunta5 = $_POST["pregunta5"];
		$pregunta6 = $_POST["pregunta6"];
		$pregunta7 = $_POST["pregunta7"];
		$pregunta8 = $_POST["pregunta8"];
		$pregunta9 = $_POST["pregunta9"];
		$pregunta10 = $_POST["pregunta10"];	
		$id = $_POST["id"];
		$obj-> modificar($tipo,$pregunta1,$pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10 ,$id);
		echo "<script> 
				alert('Evaluacion Modificado');
				window.location.href = 'home.php?sec=eva';
				</script>";
	}
	if (isset($_POST["eliminar"])) {
		echo "<script> 
			var opcion = confirm('¿Deseas eliminar la Evaluacion?');
			if(opcion===true){
				window.location.href = 'home.php?sec=eva&el=".$_POST["id"]."';
			}
		</script>";
	}
	if (isset($_GET["el"])) {
		$obj-> baja($_GET["el"]);
		echo "<script>
		alert('Evaluacion eliminando');
		window.location.href = 'home.php?sec=eva';
		</script>";
	}
?>
<table>
	<tr>
		<th>Tipo</th>
		<th>Pregunta 1</th>
		<th>Pregunta 2</th>
		<th>Pregunta 3</th>
		<th>Pregunta 4</th>
		<th>Pregunta 5</th>
		<th>Pregunta 6</th>
		<th>Pregunta 7</th>
		<th>Pregunta 8</th>
		<th>Pregunta 9</th>
		<th>Pregunta 10</th>
		<th>Eliminar</th>
		<th>Modificar</th>
	</tr>
	<?php 
		$res = $obj-> consulta();
		while ($fila = $res-> fetch_assoc()) {
			echo "<td>".$fila["tipo"]."</td>";
			echo "<td>".$fila["pregunta1"]."</td>";
			echo "<td>".$fila["pregunta2"]."</td>";
			echo "<td>".$fila["pregunta3"]."</td>";
			echo "<td>".$fila["pregunta4"]."</td>";
			echo "<td>".$fila["pregunta5"]."</td>";
			echo "<td>".$fila["pregunta6"]."</td>";
			echo "<td>".$fila["pregunta7"]."</td>";
			echo "<td>".$fila["pregunta8"]."</td>";
			echo "<td>".$fila["pregunta9"]."</td>";
			echo "<td>".$fila["pregunta10"]."</td>";
			?>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDevaluacion']?>" name="id">
						<input type="submit" name="eliminar" value="Eliminar">
					</form>
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" value="<?php echo $fila['IDevaluacion']?>" name="id">
						<input type="submit" name="modificar" value="Modificar">
					</form>
				</td>
			<?php
			echo "</tr>";
		}
	 ?>
</table>
