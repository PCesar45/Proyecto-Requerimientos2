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
	<script>
		var compra;
		var req = new XMLHttpRequest();
		req.open('GET', 'https://tipodecambio.paginasweb.cr/api', true);
		req.onreadystatechange = function (aEvt) {
		  if (req.readyState == 4) {
		     if(req.status == 200){
		      console.log(JSON.parse(req.responseText));
			  respuesta=JSON.parse(req.responseText);
			  console.log(respuesta.compra);
			  compra=respuesta.compra;
			 }
		     else
		      console.log("Error loading page\n");
		  }
		};
		req.send(null); 
		var externa=false;
		function Transferencia(){
			cuentaE = document.getElementById('CuenST');
			CuentaIB = document.getElementById('CuentaIB');
			Ced = document.getElementById('Ced');
			monto = document.getElementById('Monto');
			cuentaT = document.getElementById('cuentaT');
			Detalle=document.getElementById('Detalle');
			console.log(monto.value)
			if(cuentaE.value!="Cuentas"& monto.value!=""){
				if(externa==true){
					monto.value=parseFloat(monto.value)+(parseFloat(compra)*2);
					console.log(monto.value);
				}
				location.href="RealizarTransferencia.php ? CuentaE="+cuentaE.value+"& CuentaIB="+CuentaIB.value+"& Ced="+Ced.value+"& cuentaT="+cuentaT.value+"& Detalle="+Detalle.value+"& id=<?= $_GET['id']; ?>& Monto="+monto.value;
			}

		}
		var ban; 
		function Cuentas(){
			cuentaT = document.getElementById('cuentaT');
			if(cuentaT.value !="Cuenta Interna"){
				if(ban==true){
					alert("Cuenta externa se le cobrara una comision de 2 dolares");
					ban=false;
					externa=true;
				}
				
			}else{
				externa=false;
				ban=true;
			}
		}
	</script>

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

	    <select class="form-select" id="cuentaT"  onclick="Cuentas()" aria-label="Default select example">
		  <option selected>Cuenta Interna</option>
		  <option value="Banco de Costa Rica">Banco de Costa Rica</option>
		  <option value="Banco Nacional">Banco Nacional</option>
		  <option value="Banco Popular">Banco Popular</option>
		</select>

	    
 		<a type="button" class="btn btn-light mt-3" onclick="Transferencia()"  > <h4>Procesar</h4> </a>

	</div>

	<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>