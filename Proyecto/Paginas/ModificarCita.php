<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar cita</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1>Modificar cita</h1>

		<h4 class="mt-3">Cita:</h4>
		<select class="form-select" aria-label="Default select example">
		  <option selected>Cita 1</option>
		  <option value="1">Cita 2</option>
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

	     <a type="button" class="btn btn-light mt-3" onclick="Registrarse()"  > <h4>Modificar</h4> </a>
	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>