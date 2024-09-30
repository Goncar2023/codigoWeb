function saludar(){
    //Obtener el valor del input
    var nombre = document.getElementById("nombre").value; 
    console.log("Nombre: "+nombre)
    
    //VERIFICAR SI SE INGRESÓ UN NOMBRE
    if(nombre){
        alert("¡Hola, "+nombre+"!")
        document.getElementById("resultado").innerText = "¡Hola, "+nombre+"!";
    }else{
        //null, undefined, "", NaN, 0 
        document.getElementById("resultado").innerText = "Por favor, ingresa un nombre";
    }
}