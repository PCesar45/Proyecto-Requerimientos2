<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Salida del país</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	<script>
		
		function guardar() {
			
			nombre = document.getElementById('nomComp');
			cedula = document.getElementById('Ced');
			tel = document.getElementById('tel');
			correo = document.getElementById('Correo');
			paisd = document.getElementById('Pdes');
			fechaSal = document.getElementById('feSal');
			fechaDes = document.getElementById('fell');		
		    
			location.href="GuardarSalida.php ?nombre="+nombre.value+"& cedula="+cedula.value+"& tel="+tel.value+"& fechaSal="+fechaSal.value+"& correo="+correo.value+"& paisd="+paisd.value+"& fechaDes="+fechaDes.value+"& id=<?= $_GET['id']; ?>";
		}
		
	</script>
<body class="container p-5">
	<div class="mt-5 "  align="center" >
		<h1>Salida del país</h1>

		<div class="form-group mt-4">
	      <div class="col-sm-10 mb-3">          
	        <input type="text" class="form-control" id="nomComp" placeholder="Nombre Completo" name="nomComp">
	     </div>
	    </div>

	    <div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="Ced" placeholder="Cedula" name="Ced">
	     </div>
	    </div>

	    <div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="tel" placeholder="Telefono" name="tel">
	     </div>
	    </div>

	    <div class="form-group">
		  <div class="col-sm-10 mb-4" >   
	      	<input type="email" class="form-control" id="Correo" placeholder="Correo" name="Correo">
	      </div>
	    </div>

	    <div class="form-group mt-4">
	      <div class="col-sm-10 mb-3">          
	        <input type="text" class="form-control" id="Pdes" placeholder="País(es) destino" name="Pdes">
	     </div>
	    </div>

	    <h4>Fecha salida:</h4>
	    <div class="form-group mt-4">
	      <div class="col-sm-10 mb-3">          
	        <input type="date" class="form-control" id="feSal" placeholder="Fecha salida" name="feSal">
	     </div>
	    </div>

	    <h4>Fecha llegada:</h4>
	    <div class="form-group mt-4">
	      <div class="col-sm-10 mb-3">          
	        <input type="date" class="form-control" id="fell" placeholder="Fecha llegada" name="fell">
	     </div>
	    </div>

 		<a type="button" class="btn btn-light mt-3" onclick="guardar()"  > <h4>Enviar</h4> </a>

	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>