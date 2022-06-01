<?php
   error_reporting(0);
   require '../dbcon.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Transferencias</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	

<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1 class="mb-4">Transferencias</h1>
		<?php
			echo $_GET['id'];?>
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


		<div class="form-group mt-4">
	      <div class="col-sm-10 mb-3">          
	        <input type="text" class="form-control" id="CuentaIB" placeholder="Cuenta IBAN" name="CuentaIB">
	     </div>
	    </div>

	    <div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="Ced" placeholder="Cedula" name="Ced">
	     </div>
	    </div>

	    <div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="Monto" placeholder="Monto" name="Monto">
	     </div>
	    </div>

	    <div class="form-group">
		  <div class="col-sm-10 mb-4" >   
	      	<input type="text" class="form-control" id="Detalle" placeholder="Detalle" name="Detalle">
	      </div>
	    </div>

	    <div class="custom-control custom-radio">
		  <input type="radio" class="custom-control-input" id="CuentaInterna" name="flexRadioDefault">
		  <label class="custom-control-label" for="CuentaInterna"><h3>Cuenta Interna</h3></label>
		</div>

		<div class="custom-control custom-radio">
		  <input type="radio" class="custom-control-input" id="CuentaExterna" name="flexRadioDefault">
		  <label class="custom-control-label" for="CuentaExterna"><h3>Cuenta Externa</h3></label>
		</div>

	    
 		<a type="button" class="btn btn-light mt-3" onclick="VerUsuarios()"  > <h4>Procesar</h4> </a>

	</div>

	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>