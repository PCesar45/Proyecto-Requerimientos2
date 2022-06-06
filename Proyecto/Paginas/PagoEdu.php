<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pago de educación</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	<script>
		function pagar() {
			location.href="PagarEducacion.php ? CuentaE=<?=$_GET['CuentaE']?> & id=<?= $_GET['id'] ?>& Cedula=<?=$_GET['Cedula']?>";
		};
	</script>
	<script>
	function Ver(){
		cuentaE = document.getElementById('CuenST');
		Ced = document.getElementById('Ced');
		console.log(Ced.value);
		location.href="PagoEdu.php ?id=<?= $_GET['id']; ?>& Cedula="+Ced.value+ "& CuentaE="+cuentaE.value;
	};	
	</script>
<body class="container p-5">
	<div  class="mt-6"  align="center" >

		<h1 class="mb-4">Pago de educación</h1>

		<select class="form-select" aria-label="Default select example" id="CuenST" name="CuentaSelect">
		<option selected>Cuentas</option>
		
		<?php
			error_reporting(0);
			require '../dbcon.php';
			echo $_GET['id'];
			$Usuario_id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM cuentas  WHERE usuario_id= '$Usuario_id' ";

			$query_run = mysqli_query($con, $query);

			if(mysqli_num_rows($query_run) > 0)
			{
				foreach($query_run as $Cuenta)
				{				
			?>	
				<option value=<?= $Cuenta['id']?>><?= $Cuenta['nombre']?></option>	
			<?php
				} 
			}
			?>
		</select>

		<select class="mb-4 mt-4 form-select" aria-label="Default select example">
		  <option selected>UCR</option>
		  <option value="1">TEC</option>
		</select>

		<select class="mb-4 form-select" aria-label="Default select example">
		  <option selected>Matricula</option>
		  <option value="1">arancel de examén de admisión</option>
		  <option value="1">Derechos de gradución</option>
		</select>

		<div class="mt-4 form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="Ced" placeholder="Numero de carnet o cedula" name="Ced">
	     </div>
	    </div>
		
		<div class="mt-4 mb-4 d-block">
			<a type="button" class="btn btn-light mt-3"  onclick="Ver()"> Ver</a>
		</div>

		<div class="container-sm border mt-4  p-4 mb-3">
			<h2>	Monto a pagar:</h2>
			<?php
				
					
					$val=$_GET['Cedula'];
					$Cedula = mysqli_real_escape_string($con, $val);
					$query = "SELECT monto FROM pagoUniversidades  WHERE cedula= '$Cedula' ";

					$result = mysqli_query($con, $query);
					if ($result->num_rows > 0)
					{
						$row = $result->fetch_assoc();
						echo  "<h3>"+$row["monto"]+"<h3>";
						
					}
					
				
				
				
			?>
			
			
		</div>

		<div class="mt-3 mb-4 d-block">
			<a type="button" class="btn btn-light mt-3"  onclick="pagar()"> Pagar</a>
		</div>

	</div>
		<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>