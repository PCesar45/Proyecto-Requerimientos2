
function Registrarse() {
  //document.getElementById("Contrase").addEventListener("invalid", ContraInvalida);  
  var contr = document.getElementById("Contrase");
  if (!contr.checkValidity()) {
     alert('La contraseña debe tener mas de 8 caracteres y minimo 1 digito ,1 minuscula,1 mayuscula y un 1 caracter especial(!¡#¿?@)');
  }
  else{
    location.href="../index.html"
  }
}
