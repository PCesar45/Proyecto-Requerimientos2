<script>
    function Vcita(cit){
        if (cit) {
            alert('La cita cancelada correctamente');
            location.href="Citas.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('No se pudo cancelar la cita');
            location.href="SolicitudCita.php ?id=<?= $_GET['id']; ?>"
        }
    }
</script>
<?php
require '../dbcon.php';

$Usuario_id = mysqli_real_escape_string($con, $_GET['id']);
$Cita_id=mysqli_real_escape_string($con, $_GET['cita']);



$query = "DELETE FROM citas WHERE id='$Cita_id' and usuario_id='$Usuario_id' ";

$query_run = mysqli_query($con, $query);
if($query_run)
{   
    echo "<script>
    Vcita(true)
    </script>";
   
}
else
{
    echo "<script>
    Vcita(false)
    </script>";
}

?>