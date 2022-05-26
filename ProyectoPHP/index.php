<?php
    session_start();
    require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TECBANK Web Costa Rica</title>
	<link rel="stylesheet"  href="css/bootstrap.css">
</head>
<body class="container">
	
	<div class="container"  align="center">
		<img src="Imagenes/icn.png" alt="icono" class="rounded">
		<form action="Paginas/VerificarUsuario.php" method="POST">
			<div class="form-group">
			<div class="col-sm-10 mb-3" >   
				<input type="text" class="form-control" id="Usuario" placeholder="Usuario" name="Usuario">
			</div>
			</div>
		
			<div class="form-group">
			<div class="col-sm-10 mb-3">          
				<input type="password" class="form-control" id="Contra" placeholder="Contraseña" name="Contra">
			</div>
			</div>
			<button type="submit" class="btn btn-light" name="validar_usuario">Iniciar sesión</button>
			<h3>----------------------------------o----------------------------------</h3>
		</form>
			<a type="button" class="btn btn-light"  href="Paginas/Registrarse.php">Registrarse</a>
	</div>
	<script src="js/bootstrap.bundle.js"></script>
</body>
</html>