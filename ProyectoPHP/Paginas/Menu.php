<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu TECBANK</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">

</head>
<body class="container">
	<div class="container mt-5 "  align="center" >
		<h2  class="mb-5">Menu TECBANK</h2>
		<?php 
		echo $_GET['id'];
		?>
		<div class="container mb-4 d-block ">
			<a type="button" class="btn  btn-light"  href="VerCuentas.php ?ban=false & id=<?= $_GET['id']; ?>">Ver Cuentas</a>
		</div>
		
		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="Citas.html">Citas</a>
		</div>

		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="Tramites.html">Solicitar Tramites</a>
		</div>

		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="Reportes.php">Reportes</a>
		</div>

		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="Transferencias.php">Realizar una Transferencia bancaria</a>
		</div>

		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="Historial.php">Historial de movimientos de las transferencias </a>
		</div>

		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="Servicios.html">Pago de Servicios</a>
		</div>

		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="CambioContr.php">Cambio de contraseña</a>
		</div>
		<div class="container mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="TipoCambio.html">Tipo de cambio</a>
		</div>
	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>