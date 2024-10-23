document.getElementById("formRegistro").addEventListener("submit", function(event) {
    event.preventDefault(); //EVITA LA RECARGA DE LA PAGINA

    //OBTENER LOS VALORES DEL FORMULARIO
    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;

    //Crear un objeto FormData
    let formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("email", email);

    //ENVIAR SOLICITUD MEDIANTE FETCH
    fetch("procesar.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text()) //PROCESAR LA RESPUESTA
    .then(data => {
        //MOSTRAR EL RESULTADO EN EL DIV
        document.getElementById("result").innerHTML = data;
    })
    .catch(error => {
        console.error("Error:", error);
        document.getElementById("result").innerHTML = "ERROR AL ENVIAR LOS DATOS";
    });
});
