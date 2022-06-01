<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cancelar cita</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	<script>
	function Borrar(){
		citaE = document.getElementById('citaS');
		location.href="BorrarCita.php ?cita="+citaE.value+"& id=<?= $_GET['id']; ?>";

	}
	</script>
<body class="container p-5">
	<div class="mt-6 "  align="center" >
		<h1>Cancelar cita</h1>


		<select class="form-select mt-5" id="citaS" aria-label="Default select example">
		<option selected>Citas registradas</option>
		<?php
			error_reporting(0);
   			require '../dbcon.php';

			$Usuario_id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM citas  WHERE usuario_id= '$Usuario_id' ";

			$query_run = mysqli_query($con, $query);
			
		
			if(mysqli_num_rows($query_run) > 0)
			{
				foreach($query_run as $Citas)
				{
					
		?>	
			<option value=<?= $Citas['id']?>><?= $Citas['tipo'].', '.$Citas['sucursal'].', '.$Citas['dia'].' '.$Citas['hora']?></option>	
		<?php
			} 
		}
		else{
			echo "<script>
					console.log('nada')
					</script>";
		}
		?>
		</select>


	     <a type="button" class="btn btn-light mt-5" onclick="Borrar()" > <h4>Cancelar</h4></a>
	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>