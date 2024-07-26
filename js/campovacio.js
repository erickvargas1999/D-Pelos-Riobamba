function verificarCampos() {
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    var celular= document.getElementById("celular").value;
    var servicio= document.getElementById("servicio").value;

    if (nombre =="" || email=="" || celular=="" || servicio=="" ) {
      alert('Por favor, complete todos los campos antes de continuar.');
      return false; 
    }else{
    alert('Datos enviados correctamente.');
    }

   
    if (nombre.toLowerCase() === 'falso' || email.toLowerCase() === 'falso') {
      alert('No se permiten datos falsos en los campos.');
      return false; 
    }
  }
