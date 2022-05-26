
<?php
   error_reporting(0);
   require '../dbcon.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ver Cuentas</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">

	
		
	
	<script>
	function Ver(){
		var cuentaE;
		
		cuentaE = document.getElementById('CuenS');
		console.log(cuentaE.value);
		location.href="VerCuentas.php ?ban=true  & id=<?= $_GET['id']; ?>& CuentaE="+cuentaE.value;
		
	};
			
	</script>
	
		
	
	
	

<body class="container p-5">
	

	<div class="mt-5 "  align="center" >
		<h1>Cuentas </h1>
		<select class="form-select" aria-label="Default select example" id="CuenS" name="CuentaSelect">
		<option selected>Cuentas</option>
		
		<?php
		    echo $_GET['ban'];

			$Usuario_id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM cuentas  WHERE usuario_id= '$Usuario_id' ";

			$query_run = mysqli_query($con, $query);

			if(mysqli_num_rows($query_run) > 0)
			{
				
				foreach($query_run as $Cuenta)
				{
					$i=$i+1;

				
			?>
				
				
				<option value=<?= $Cuenta['id']?>><?= $Cuenta['nombre']?></option>
				
			<?php
				} 
			}
			?>
		</select>

		<a type="button" class="btn btn-light mt-3"  onclick="Ver()"> <h4>Ver</h4> </a>
		

		<div class="container-sm border mt-4  p-4 mb-5">
			<h2>	Numero:</h2>
			<?php
				if( $_GET['ban']==true){

					$val=$_GET['CuentaE'];

					$Cuenta_id = mysqli_real_escape_string($con, $val);
					$query = "SELECT numero FROM cuentas  WHERE id= '$Cuenta_id' ";

					$result = mysqli_query($con, $query);
					if ($result->num_rows > 0)
					{
						$row = $result->fetch_assoc();
						echo  "<h3>"+$row["numero"]+"<h3>";
					}
				}
				
				
			?>
				
			<h2>	Saldo: </h2>
			<?php
				if( $_GET['ban']==true){

					$val=$_GET['CuentaE'];

					$Cuenta_id = mysqli_real_escape_string($con, $val);
					$query = "SELECT saldo FROM cuentas  WHERE id= '$Cuenta_id' ";

					$result = mysqli_query($con, $query);
					if ($result->num_rows > 0)
					{
						$row = $result->fetch_assoc();
						echo  "<h3>"+$row["saldo"]+"<h3>";
					}
				}
				
				
			?>
		</div>
		<a type="button" class="btn  btn-light"  href="Menu.php ?id=<?= $_GET['id']; ?>">Volver</a>
		<script src="../js/bootstrap.bundle.js"></script>
	</div>
</body>
</html>