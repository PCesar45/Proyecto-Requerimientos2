<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar cita</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	<script>
		function Modificar(){
			citaE = document.getElementById('citaS');
			console.log(citaE.value);
			diaE = document.getElementById('dia');
			horaE = document.getElementById('hora');
			if(diaE.value==""){
				location.href="ActualizarCitaHora.php ?hora="+horaE.value+"& cita="+citaE.value+"& id=<?= $_GET['id']; ?>";
				
			}
			else{
				if(horaE.value==""){
					alert("Rellene la hora de la cita");
				}
				else{
					location.href="ActualizarCita.php ?hora="+horaE.value+"& dia="+diaE.value+"& cita="+citaE.value+"& id=<?= $_GET['id']; ?>";
				}
			}


		}

	</script>
<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1>Modificar cita</h1>
		
		<h4 class="mt-3">Cita:</h4>
		<select class="form-select" id="citaS" aria-label="Default select example">
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

		
		<h4>Día:</h4>
		<div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="date" class="form-control" id="dia" placeholder="Día" name="dia">
	     </div>
	    </div>

		
	    <h4>Hora:</h4>
		<div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="time" class="form-control" id="hora" placeholder="Hora" name="hora">
	     </div>
	    </div>

	     <a type="button" class="btn btn-light mt-3" onclick="Modificar()"  > <h4>Modificar</h4> </a>
	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>