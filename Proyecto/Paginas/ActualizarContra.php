<script>
    function Vcontra(){
        alert('Contraseña no igual a la repeticion')
        location.href="CambioContr.php ?id=<?= $_GET['id']; ?>"
    }
    function VActualizar(ban){
        if (ban) {
            alert('Contraseña actualizada exitosamente');
            location.href="Menu.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('Hubo un error al intentar actualizar la contraseña');
            location.href="CambioContr.php ?id=<?= $_GET['id']; ?>"
        }
    }
</script>
<?php
session_start();
require '../dbcon.php';


if(isset($_POST['Actualizar_Contra']))
{
    
    $Usuario_id = mysqli_real_escape_string($con, $_GET['id']);
    $ContraseA = mysqli_real_escape_string($con, $_POST['ContraseA']);
    $Contrase= mysqli_real_escape_string($con, $_POST['Contrase']);
    $ContraseR = mysqli_real_escape_string($con, $_POST['ContraseR']);
    if($Contrase!=$ContraseR){
        echo "<script>Vcontra()</script>";
    }
    else{
        $query  = "SELECT * FROM usuarios  WHERE id='$Usuario_id'";
        $result = mysqli_query($con, $query);
            
        if ($result->num_rows > 0)
        { 
            $row = $result->fetch_assoc(); 
            if($row['contraseña']==$ContraseA){
                $query = "UPDATE usuarios SET contraseña='$Contrase' WHERE  id='$Usuario_id' and contraseña='$ContraseA'";

                $query_run = mysqli_query($con, $query);
                if($query_run)

                {   
                
                        echo "<script>VActualizar(true)</script>";
                
                }
                else
                {
                    echo mysqli_error($con);
                }
            }
            else{
                echo "<script>VActualizar(false)</script>";
            }
        }
    }
}
?>