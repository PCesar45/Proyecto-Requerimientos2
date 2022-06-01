<script>
    function Vcita(cit){
        if (cit) {
            alert(' Hora de la cita modificada correctamente');
            location.href="Citas.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('No se pudo modificar la cita');
            location.href="SolicitudCita.php ?id=<?= $_GET['id']; ?>"
        }
    }
</script>
<?php
require '../dbcon.php';


$hora= mysqli_real_escape_string($con,  $_GET['hora']);
$Usuario_id = mysqli_real_escape_string($con, $_GET['id']);
$Cita_id=mysqli_real_escape_string($con, $_GET['cita']);



$query = "UPDATE citas SET hora='$hora' WHERE id='$Cita_id' and usuario_id='$Usuario_id' ";

$query_run = mysqli_query($con, $query);
if($query_run)
{   
    echo "<script>
    Vcita(true)
    </script>";
   
}
else
{
   // echo 'ERROR';
    echo $hora.' '.$Cita_id.' '.$Usuario_id;
}

?>