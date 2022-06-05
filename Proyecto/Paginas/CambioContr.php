<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cambio de contraseña</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
<body class="container p-5">
	<div  class="mt-6"  align="center" >

		<h1 class="mb-5">Cambio de contraseña</h1>
		<form action="ActualizarContra.php ? id=<?= $_GET['id']; ?>" method="POST">
			<div class="form-group">
			<div class="col-sm-10 mb-4" >   
				<input type="password" class="form-control" id="ContraseA" placeholder="Contraseña actual" name="ContraseA">
			</div>
			</div>

			<div class="form-group">
			<div class="col-sm-10 mb-4">          
				<input type="password" class="form-control" id="Contrase" placeholder="Contraseña"  
				pattern="(?=.*\d)(?=.*[!,¡,#,¿,?,@])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener mas de 8 caracteres y minimo 1 digito ,1 minuscula,1 mayuscula y un 1 caracter especial(!¡#¿?@)" required name="Contrase">
			</div>
			</div>

			<div class="form-group">
			<div class="col-sm-10 mb-4">          
				<input type="password" class="form-control" id="ContraseR" placeholder="Repetir contraseña"  
				pattern="(?=.*\d)(?=.*[!,¡,#,¿,?,@])(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe tener mas de 8 caracteres y minimo 1 digito ,1 minuscula,1 mayuscula y un 1 caracter especial(!¡#¿?@)" required name="ContraseR">
			</div>
			</div>

			<button type="submit" class="btn btn-light mt-5" name="Actualizar_Contra" > <h2>Cambiar contraseña</h2> </button>
		</form>


		

	</div>
		<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>