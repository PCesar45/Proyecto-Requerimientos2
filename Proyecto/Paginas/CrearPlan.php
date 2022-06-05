<script>
     
     function Vsaldo(sald){
        if (sald) {
            alert('Plan de ahorros creado de forma  exitosa');
            location.href="Menu.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('Fondos insuficientes');
            location.href="PlanAhorros.php ?id=<?= $_GET['id']; ?>"
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
        $Monto=$_GET['Monto'];
        if($row['saldo']<$_GET['Monto']){
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