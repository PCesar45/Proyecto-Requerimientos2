<script>
    function Vcita(cit){
        if (cit) {
            alert(' cita registrada correctamente');
            location.href="Citas.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('No se pudo registrar la cita correctamente');
            location.href="SolicitudCita.php ?id=<?= $_GET['id']; ?>"
        }
    }
</script>
<?php
require '../dbcon.php';

$tipo = mysqli_real_escape_string($con, $_GET['Tipo']);
$Sucursal= mysqli_real_escape_string($con, $_GET['Sucursal']);
$dia = mysqli_real_escape_string($con,  $_GET['dia']);
$hora= mysqli_real_escape_string($con,  $_GET['hora']);
$Usuario_id = mysqli_real_escape_string($con, $_GET['id']);

echo $tipo;
echo $_GET['Tipo'];

$query = "INSERT INTO citas (tipo,sucursal,dia,hora,usuario_id) VALUES ('$tipo','$Sucursal','$dia','$hora','$Usuario_id')";

$query_run = mysqli_query($con, $query);
if($query_run)
{   
    echo "<script>
    Vcita(true)
    </script>";
   
}
else
{
    echo mysqli_error($phpconnect);
}

?>