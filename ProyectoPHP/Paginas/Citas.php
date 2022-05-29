<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Citas TECBANK</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
<body class="container p-5">
	<div class="mt-6 "  align="center" >
		<h1>Citas TECBANK </h1>

		<div class="mt-5 mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="SolicitudCita.php?id=<?= $_GET['id']; ?>">Solicitar cita</a>
		</div>

		<div class=" mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="ModificarCita.php">Modificar cita</a>
		</div>

		<div class="mb-4 d-block ">
			<a type="button" class="btn btn-light"  href="CancelarCita.php">Cancelar cita</a>
		</div>
	</div>
		<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>