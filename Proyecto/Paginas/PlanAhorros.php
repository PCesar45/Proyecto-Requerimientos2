<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Plan de ahorros</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1>Plan de ahorros</h1>

		<div class="form-group mt-4">
	      <div class="col-sm-10 mb-3">          
	        <input type="text" class="form-control" id="nomPlan" placeholder="Nombre del plan" name="nomPlan">
	     </div>
	    </div>

	    <div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="Contra" placeholder="Monto inicial (minimo 500 000 colones)" name="Contra">
	     </div>
	    </div>

	    <select class="form-select" aria-label="Default select example">
		  <option selected>Corto plazo</option>
		  <option value="1">Largo plazo</option>
		</select>

		<select class="form-select mt-3" aria-label="Default select example">
		  <option selected>1</option>
		  <option value="1">3</option>
		</select>

		<div class="container-sm border mt-4  p-4 ">
			<h2>Monto final a recibir:</h2>
			<?php 
				if( $_GET['ban']==true){
					
				}
			?>
			<h2>Tasa de interés: </h2>
			
			
		</div>

		 <a type="button" class="btn btn-light mt-3" onclick="Registrarse()"  > <h4>Crear</h4> </a>
	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>