<?php 
	session_start();
	if (!isset($_SESSION["autenticado"])) {
		header("Location: index.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/Chart.min.js"></script>
	<title>ERP</title>
</head>
<body>
	<section>
		<nav>
			<h2>Bienvenido: <?php echo $_SESSION["usuario"]; ?></h2>
			<ul>
				<a href="?sec=inicio"><li>Inicio</li></a>
				<a href="?sec=usu"><li>Usuario</li></a>	
				<a href="?sec=asis"><li>Asistencia</li></a>
				<a href="?sec=bal"><li>Balance</li></a>
				<a href="?sec=cli"><li>Cliente</li></a>
				<a href="?sec=com"><li>Compra</li></a>
				<a href="?sec=det_com"><li>Detalle de la Compra</li></a>
				<a href="?sec=dev"><li>Devoluciones</li></a>
				<a href="?sec=emp"><li>Empleado</li></a>
				<a href="?sec=eva"><li>Evaluacion</li></a>
				<a href="?sec=jor"><li>Jornada</li></a>
				<a href="?sec=mante"><li>Mantenimiento</li></a>
				<a href="?sec=mate"><li>Materia Prima</li></a>
				<a href="?sec=mob"><li>Mobiliario</li></a>
				<a href="?sec=pago"><li>Pago</li></a>
				<a href="?sec=ped"><li>Pedido</li></a>
				<a href="?sec=per"><li>Permisos</li></a>
				<a href="?sec=prod"><li>Productos</li></a>
				<a href="?sec=prov"><li>Proveedor</li></a>
				<a href="?sec=proy"><li>Proyecto</li></a>
				<a href="?sec=rem"><li>Reemplazo</li></a>
				<a href="?sec=ven"><li>Venta</li></a>
				<a href="?sec=cerrar"><li>Cerrar Sesion</li></a>	
			</ul>
		</nav>
		<article>
		<?php
			if (isset($_GET["sec"])) {
				$sec = $_GET["sec"];
				switch ($sec) {
					case 'ven':
						require_once("php/vistaVenta.php");
						break;
					case 'rem':
						require_once("php/vistaReemplazo.php");
						break;
					case 'proy':
						require_once("php/vistaProyecto.php");
						break;
					case 'prov':
						require_once("php/vistaProveedor.php");
						break;
					case 'per':
						require_once("php/vistaPermiso.php");
						break;
					case 'ped':
						require_once("php/vistaPedido.php");
						break;
					case 'pago':
						require_once("php/vistaPago.php");
						break;
					case 'mob':
						require_once("php/vistaMobiliario.php");
						break;
					case 'mate':
						require_once("php/vistaMateriaprima.php");
						break;
					case 'jor':
						require_once("php/vistaJornada.php");
						break;
					case 'usu':
						require_once("php/vistaUsuario.php");
						break;
					case 'asis':
						require_once("php/vistaAsistencia.php");
						break;
					case 'bal':
						require_once("php/vistaBalance.php");
						break;
					case 'cli':
						require_once("php/vistaCliente.php");
						break;
					case 'com':
						require_once("php/vistaCompra.php");
						break;
					case 'det_com':
						require_once("php/vistaDetalle_compra.php");
						break;
					case 'dev':
						require_once("php/vistaDevoluciones.php");
						break;
					case 'emp':
						require_once("php/vistaEmpleado.php");
						break;
					case 'eva':
						require_once("php/vistaEvaluacion.php");
						break;
					case 'prod';
						require_once("php/vistaProducto.php");
						break;
					case 'mante':
						require_once("php/vistaMantenimiento.php");
						break;
					case 'cerrar':
						session_destroy();
						header("Location: index.php");
						break;
				}
			}
		?>
	</article>
	</section>
	
</body>
</html>