<script src="../js/Validado.js"></script>


<?php
session_start();
require '../dbcon.php';

global $ID;

if(isset($_POST['validar_usuario']))
{
    $usuario = mysqli_real_escape_string($con, $_POST['Usuario']);
    $contra= mysqli_real_escape_string($con, $_POST['Contra']);

    $query  = "SELECT * FROM usuarios  WHERE usuario='$usuario'";
    $result = mysqli_query($con, $query);
        
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc(); 
        
        echo "contraseña: " . $row["contraseña"];
        if($contra==$row["contraseña"]){
            $ID =$row["id"];
           
           echo "<script>Validado(true,$ID)</script>";
           
        }
        else{
            echo "<script>Validado(false,$ID)</script>";
        }

        
    } 
    else 
    {
        echo "<script>Validado(false)</script>";
    }
}

?>