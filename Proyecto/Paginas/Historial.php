<?php
   error_reporting(0);
   require '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Historial de movimientos</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	<script>
	function Ver(){
		var cuentaE;
		
		cuentaE = document.getElementById('CuenST');
		console.log(cuentaE.value);
		location.href="Historial.php ? id=<?= $_GET['id']; ?>& CuentaE="+cuentaE.value;
		
	};
			
	</script>
<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1>Historial de movimientos </h1>

		
		<select class="form-select" aria-label="Default select example" id="CuenST" name="CuentaSelect">
		<option selected>Cuentas</option>
		
		<?php
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

		 <a type="button" class="btn btn-light mt-5" onclick="Ver()"  > <h4>Ver historial</h4> </a>
		 <a type="button" class="btn  btn-light mt-5"  href="Menu.php ?id=<?= $_GET['id']; ?>"> <h4>Volver</h4></a>

		<div class="container-sm border mt-4  p-4 mb-5 ">
		<?php
				
			$val=$_GET['CuentaE'];

			$Cuenta_id = mysqli_real_escape_string($con, $val);
			$query = "SELECT * FROM movTransferencias  WHERE usuario_id= '$Usuario_id' and cuenta_id='$Cuenta_id' ";

			$query_run = mysqli_query($con, $query);

			if(mysqli_num_rows($query_run) > 0)
			{
				echo  "<h5>------------------------------------------------<h5>";
				foreach($query_run as $mov)
				{
					
					echo  "<h5>Cuenta Beneficiario: $mov[CuentaBene]<h5>";
					echo  "<h5>Cedula Beneficiario: $mov[ced]<h5>";
					echo  "<h5>Monto: $mov[monto]<h5>";
					echo  "<h5>Detalle: $mov[detalle]<h5>";
					echo  "<h5>Transferencia: $mov[banco]<h5>";
					echo  "<h5>------------------------------------------------<h5>";
				}
			}
				
				
				
		?>
			
		</div>
		<script src="../js/bootstrap.bundle.js"></script>
	</div>
</body>
</html>