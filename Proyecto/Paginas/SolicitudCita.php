<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Solicitud cita</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1>Solicitud cita</h1>

		<h4 class="mt-3">Tipo:</h4>
		<select class="form-select mb-3" aria-label="Default select example" >
		  <option selected>Solicitud Firma digital</option>
		  <option value="1">Solicitud o renovacion licencia</option>
		  <option value="2">Solicitud o renovacion pasaporte</option>
		  <option value="3">Reserva de espacio</option>
		</select>
		
		<h4>Sucursal:</h4>
		<select class="form-select" aria-label="Default select example">
		  <option selected>San José Centro</option>
		  <option value="1">Multiplaza del Este</option>
		  <option value="2">Lincoln Plaza</option>
		  <option value="3">Alajuela Centro</option>
		  <option value="4">City Mall</option>
		  <option value="5">Oxigeno Mall</option>
		  <option value="6">Paseo Metropoli</option>
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

	     <a type="button" class="btn btn-light mt-3" onclick="Registrarse()"  > <h4>Enviar</h4> </a>

	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>