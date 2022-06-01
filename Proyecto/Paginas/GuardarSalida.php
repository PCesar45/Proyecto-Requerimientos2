<script>
     function Vsalida(sald){
        if (sald) {
            alert(' Salida del país registrada correctamente');
            location.href="Menu.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('No se pudo registrar la Salida del país');
            location.href="SalidaPais.php ?id=<?= $_GET['id']; ?>"
        }
    }
</script>
<?php 
    require '../dbcon.php';
   

    $nombre=mysqli_real_escape_string($con,$_GET['nombre']);
    $cedula=mysqli_real_escape_string($con,$_GET['cedula']);
    $tel=mysqli_real_escape_string($con,$_GET['tel']);
    $correo=mysqli_real_escape_string($con,$_GET['correo']);
    $paisd =mysqli_real_escape_string($con,$_GET['paisd']);
    $fechaSal=mysqli_real_escape_string($con,$_GET['fechaSal']);
    $fechaDes=mysqli_real_escape_string($con,$_GET['fechaDes']);
    $Usuario_id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "INSERT INTO SalidaDelPais (nombre,cedula,tel,correo,paisdestino,llegada,salida,usuario_id) VALUES ('$nombre','$cedula','$tel','$correo','$paisd','$fechaDes','$fechaSal','$Usuario_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {   
    echo "<script>
        Vsalida(true)
        </script>";
    
    }
    else
    {
        echo mysqli_error($con);
    }
    
?>