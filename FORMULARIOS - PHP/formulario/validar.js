function validarFormulario() {
    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const errorMessage = document.getElementById('error-message');

    //LIMPIAR EL MENSAJE DE ERROR
    errorMessage.textContent = '';

    //VALIDAR LA CANTIDAD DE CARACTERES
    if (nombre.length < 3) {
        errorMessage.textContent = 'El nombre debe tener al menos 3 caracteres.';
        return false;
    }

    //VALIDAR QUE LAS CONTRASEÑAS COINCIDAN
    if (password !== confirmPassword) {
        errorMessage.textContent = 'Las contraseñas no coinciden.';
        return false;
    }

    return true; //FORMULARIO VÁLIDO
}
