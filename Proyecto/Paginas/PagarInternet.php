<script>
     
     function Vsaldo(sald){
        if (sald) {
            alert('Realizado con exito');
            location.href="Menu.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('Fondos insuficientes');
            location.href="Menu.php ?id=<?= $_GET['id']; ?>"
        }
    }
</script>

<?php 
    require '../dbcon.php';

    $cuenta = mysqli_real_escape_string($con,  $_GET['CuentaE']);
    $Usuario_id = mysqli_real_escape_string($con, $_GET['id']);
    $query  = "SELECT saldo FROM cuentas  WHERE usuario_id='$Usuario_id'and id='$cuenta'";
    $result = mysqli_query($con, $query);
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc(); 
        echo "<script> console.log($row[saldo])</script>";
        $Saldo=$row['saldo'];

        $val=$_GET['Cedula'];
        $Cedula = mysqli_real_escape_string($con, $val);
        $query = "SELECT monto FROM pagoInternet  WHERE cedula= '$Cedula' ";

        $result = mysqli_query($con, $query);
        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            echo  "<h3>"+$row["monto"]+"<h3>";
            $Monto=$row["monto"];
            
        }


        if($Saldo<$Monto){
            echo "<script>
            Vsaldo(false)
            </script>";

        }else{
            $query = "UPDATE cuentas SET saldo='$Saldo'-'$Monto' WHERE id='$cuenta' and usuario_id='$Usuario_id' ";

            $query_run = mysqli_query($con, $query);
            if($query_run)
            {   
                echo "<script>
                Vsaldo(true)
                </script>";
            
            }
            else
            {
                echo "<script>
                Vsaldo(false)
                </script>";
            }

        }
    }

?>