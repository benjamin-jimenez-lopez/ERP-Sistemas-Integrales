	<?php 
		
		require_once("conexion.php");
		class Pedido extends Conexion{

			public function alta($IDpedido,$fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto){
				$this-> sentencia = "INSERT INTO pedido VALUES (null,'$IDpedido','$fecha','$IDcliente', '$precio', '$cantidad', '$direccion', '$IDproducto')";
				$this-> ejecutarSentencia();
			}

			public function baja($IDpedido){
				$this-> sentencia = "DELETE FROM pedido WHERE IDpedido = $IDpedido";
				$this-> ejecutarSentencia();
			}

			public function consulta(){
				$this-> sentencia = "SELECT * FROM pedido";
				return $this-> obtenerSentencia();
			}
			public function modificar($IDpedido,$fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto,$id){
			$this-> sentencia = "UPDATE FROM pedido SET IDpedido='$IDpedido',fecha='$fecha',IDcliente='$IDcliente',precio='$precio',cantidad='$cantidad',direccion='$direccion',IDproducto='$IDproducto' WHERE IDpedido='$id'";
			$this-> ejecutarSentencia();
			}
		}
	 ?>