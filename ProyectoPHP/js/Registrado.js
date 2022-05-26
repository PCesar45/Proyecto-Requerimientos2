
function Registrado(Regis) {
  
  if (Regis) {
     alert('Registrado Correctamente');
     location.href="../index.php"
  }
  else{
    alert('No se pudo registrar correctamente');
    location.href="/Registrarse.php"
  }
}
