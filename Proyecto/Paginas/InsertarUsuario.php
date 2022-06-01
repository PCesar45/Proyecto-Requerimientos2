<script src="../js/Registrado.js"></script>
<?php
session_start();
require '../dbcon.php';


if(isset($_POST['insertar_usuario']))
{
    
    $Registrado=false;
    $nombre = mysqli_real_escape_string($con, $_POST['Nombre']);
    $apellido= mysqli_real_escape_string($con, $_POST['Apellido']);
    $usuario = mysqli_real_escape_string($con, $_POST['Usuario']);
    $contra= mysqli_real_escape_string($con, $_POST['Contra']);
    $correo = mysqli_real_escape_string($con, $_POST['Correo']);


    $query = "INSERT INTO usuarios (nombre,apellido,correo,usuario,contraseña) VALUES ('$nombre','$apellido','$correo','$usuario','$contra')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {   
        echo "<script>Registrado(true)</script>";
       
    }
    else
    {
        echo "<script>Registrado(false)</script>";
    }
}
?>