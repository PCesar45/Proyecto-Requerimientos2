<script>
     
    function Vsaldo(sald){
        if (sald) {
            alert('Transferencia exitosa');
            location.href="Menu.php ?id=<?= $_GET['id']; ?>"
        }
        else{
            alert('Fondos insuficientes');
            location.href="Transferencias.php ?id=<?= $_GET['id']; ?>"
        }
    }
    function comprobante(IBAN,ced,monto,detalle) {
        var comprob=parseInt(Math.random()*(100+1)+1);
        console.log(comprob);
        alert("Comprobante: \n"+"IBAN:"+IBAN+"\n"+"Cedula beneficiario:"+ced+"\n"+"Monto:"+monto+"\nDetalle:"+detalle+"\n Numero comprobante:"+comprob);
        location.href="Menu.php ?id=<?= $_GET['id']; ?>";
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
                $CuentaIB=mysqli_real_escape_string($con,  $_GET['CuentaIB']);
                $Ced = mysqli_real_escape_string($con,  $_GET['Ced']);
                $monto = mysqli_real_escape_string($con,  $_GET['Monto']);
                $cuentaT= mysqli_real_escape_string($con,  $_GET['cuentaT']);
                $Detalle=mysqli_real_escape_string($con,  $_GET['Detalle']);

                $query = "INSERT INTO movTransferencias (CuentaBene,ced,monto,detalle,banco,cuenta_id,usuario_id) VALUES ('$CuentaIB','$Ced','$monto','$Detalle','$cuentaT','$cuenta','$Usuario_id')";
                $query_run = mysqli_query($con, $query);
                if(!$query_run){
                    echo mysqli_error($con);
                }
                else{
                    echo "<script>
                    comprobante('$CuentaIB','$Ced','$monto','$Detalle');
                    </script>";
                }

                
            
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