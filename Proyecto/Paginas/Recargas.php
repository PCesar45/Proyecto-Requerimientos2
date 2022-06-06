<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Recarga telefónica</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	<script>
		function Recargar() {
			cuentaE = document.getElementById('CuenST');
			MontR = document.getElementById('MontR');
			Tel =document.getElementById('Tel');
			
			if(cuentaE.value =="Cuentas"){
				alert("Seleccione una cuenta");
			}
			else{
				if(Tel.value==""){
					alert("Ingrese un telefono");
				}
				else{
					if(MontR.value!="")
						location.href="CrearPlan.php ? CuentaE="+cuentaE.value+"& id=<?= $_GET['id']; ?>& Monto="+MontR.value;
				}
			}
		}
	</script>
<body class="container p-5">
	<div  class="mt-6"  align="center" >

		<h1 class="mb-4">Recarga telefónica</h1>
		<select class="form-select" aria-label="Default select example" id="CuenST" name="CuentaSelect">
		<option selected>Cuentas</option>
		
		<?php
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
		  <option selected>Kolbi</option>
		  <option value="1">Claro</option>
		</select>

		<div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="Tel" placeholder="Telefono" name="Tel">
	     </div>
	    </div>

	    <div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="MontR" placeholder="Monto a recargar" name="MontR">
	     </div>
	    </div>

		<div class="mt-5 mb-4 d-block">
			<a type="button" class="btn btn-light mt-3" onclick="Recargar()"  > Recargar </a>
		</div>

	</div>
		<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>