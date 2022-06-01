<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Solicitud cita</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">

	<script>
	function Registrar(){
			
		TipoE = document.getElementById('TipoS');
		console.log(TipoE.value);
		SucursalE = document.getElementById('SucursalS');
		console.log(SucursalE.value);
		diaE = document.getElementById('dia');
		if(diaE.value==""){
			alert("Rellene el día de la cita")
		}
		else{
			console.log(diaE.value);
			horaE = document.getElementById('hora');
			if(horaE.value==""){
				alert("Rellene la hora de la cita");
			}
			else{
				console.log(TipoE.value);
				location.href="RegistrarCita.php ? Tipo="+TipoE.value+"& id=<?= $_GET['id']; ?>& Sucursal="+SucursalE.value+"& dia="+diaE.value+"& hora="+horaE.value;
			}

			

		}
		
		//location.href="VerCuentas.php ?ban=true  & id=<?= $_GET['id']; ?>& CuentaE="+cuentaE.value;

		
	};
			
	</script>

<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1>Solicitud cita</h1>

		<h4 class="mt-3">Tipo:</h4>
		<select class="form-select mb-3" id="TipoS" aria-label="Default select example" >
		  <option selected>Solicitud Firma digital</option>
		  <option value="Solicitud o renovacion licencia">Solicitud o renovacion licencia</option>
		  <option value="Solicitud o renovacion pasaporte">Solicitud o renovacion pasaporte</option>
		  <option value="Reserva de espacio">Reserva de espacio</option>
		</select>
		
		<h4>Sucursal:</h4>
		<select class="form-select"  id="SucursalS" aria-label="Default select example">
		  <option selected>San José Centro</option>
		  <option value="Multiplaza del Este">Multiplaza del Este</option>
		  <option value="Lincoln Plaza">Lincoln Plaza</option>
		  <option value="Alajuela Centro">Alajuela Centro</option>
		  <option value="City Mall">City Mall</option>
		  <option value="Oxigeno Mall">Oxigeno Mall</option>
		  <option value="Paseo Metropoli">Paseo Metropoli</option>
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

	     <a type="button" class="btn btn-light mt-3" onclick="Registrar()"> <h4>Enviar</h4> </a>

	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>