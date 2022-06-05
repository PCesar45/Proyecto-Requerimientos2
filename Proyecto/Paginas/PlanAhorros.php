<?php
   error_reporting(0);
   require '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Plan de ahorros</title>

	<link rel="stylesheet"  href="../css/bootstrap.css">
	<script>
		function Plazos() {
			plazoE = document.getElementById('plazo');
			
			
			if(plazoE.value =="Corto plazo"){
				console.log(plazoE.value)
				const $tiempo = document.querySelector('#annios');
				if($tiempo.value!="1"){
					alert("El Corto plazo deber ser de un 1 año");
					$tiempo.value = "1"
				}
				
			}else{
				const $tiempo = document.querySelector('#annios');
				console.log($tiempo.value)
				if($tiempo.value=="1"){
					alert("El largo plazo deber ser de 3 o mas años");
					$tiempo.value = "3"
				}
			}
		}
		function Calcular() {
			MontoE = document.getElementById('Monto');
			cuentaE = document.getElementById('CuenST');
			plazoE = document.getElementById('plazo');
			tiempo= document.getElementById('annios');

			var tasa;
			if(MontoE.value<500000){
				alert("El monto debe ser mayor a 500 000 colones")	
			}else{
				if(plazoE.value =="Corto plazo"){
					if(MontoE.value<2500001){
						tasa=0.015;
					}else{
						if(MontoE.value<6000001){
							tasa=0.025
						}else{	
						tasa=0.02
						}
					}
					
				}
				else{
					if(tiempo.value=="3"){
						if(MontoE.value<2500001){
							tasa=0.025;
						}else{
							if(MontoE.value<6000001){
								tasa=0.03
							}else{	
							tasa=0.035
							}
						}
					}
					if(tiempo.value=="5"){
						if(MontoE.value<2500001){
							tasa=0.05;
						}else{
							if(MontoE.value<6000001){
								tasa=0.08
							}else{	
							tasa=0.1
							}
						}
					}
					if(tiempo.value=="10"){
						if(MontoE.value<2500001){
							tasa=0.125;
						}else{
							if(MontoE.value<6000001){
								tasa=0.15
							}else{	
							tasa=0.20
							}
						}
					}
				}
				
				var total;
				console.log(MontoE.value);
				console.log(tiempo.value);
				total=parseFloat(MontoE.value)+parseFloat((MontoE.value*tasa*tiempo.value));
				document.getElementById('MontoFinal').innerHTML = total;
				if(tasa!=0.035){
					document.getElementById('TasaInteres').innerHTML = parseFloat(tasa*100)+"%";
				}
				else{
					document.getElementById('TasaInteres').innerHTML = "3.5%";
				}
			}
			
		}
		function Crear() {
			cuentaE = document.getElementById('CuenST');
			nomPlanE = document.getElementById('nomPlan');
			MontoE = document.getElementById('Monto');
			
			if(cuentaE.value =="Cuentas"){
				alert("Seleccione una cuenta");
			}
			else{
				if(nomPlanE.value==""){
					alert("Seleccione un nombre de plan");
				}
				else{
					Calcular();
					location.href="CrearPlan.php ? CuentaE="+cuentaE.value+"& id=<?= $_GET['id']; ?>& Monto="+MontoE.value;
				}
			}
		}
			
	</script>
	
<body class="container p-5">
	<div class="mt-3"  align="center" >
		<h1>Plan de ahorros</h1>
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
	        <input type="text" class="form-control" id="nomPlan" placeholder="Nombre del plan" name="nomPlan">
	     </div>
	    </div>

	    <div class="form-group">
	      <div class="col-sm-10 mb-3">          
	        <input type="number" class="form-control" id="Monto" placeholder="Monto inicial (minimo 500 000 colones)" name="Monto">
	     </div>
	    </div>
		<h4>Tipo: </h4>

	    <select class="form-select" id="plazo" onclick="Plazos()" aria-label="Default select example">
		  <option selected >Corto plazo</option>
		  <option value="1">Largo plazo</option>
		</select>

		<h4 class="mt-3">Plazo en años: </h4>
		<select class="form-select" id="annios"  onclick="Plazos()" aria-label="Default select example">
		  <option selected>1</option>
		  <option value="3">3</option>
		  <option value="5">5</option>
		  <option value="10">10</option>
		</select>
		

		<div class="container-sm border mt-4  p-4 ">
			<h2>Monto final a recibir en colones:</h2>
			<h3 id="MontoFinal"></h3>
			<h2>Tasa de interés: </h2>
			<h3 id="TasaInteres"><h3>
			
		</div>

		 <a type="button" class="btn btn-light mt-3" onclick="Calcular()"  > <h4>Calcular</h4> </a>
		 <a type="button" class="btn btn-light mt-3" onclick="Crear()"  > <h4>Crear</h4> </a>
	</div>
	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>