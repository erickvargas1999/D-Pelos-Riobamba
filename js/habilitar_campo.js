function habilitarCampo(event, campo) {
    event.preventDefault();

    var campoActual = document.getElementById(campo);

    if (campoActual.disabled) {
        campoActual.disabled = false;
        campoActual.focus();
    }
}
