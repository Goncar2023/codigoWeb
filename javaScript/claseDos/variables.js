
//DIFERENCIAS EN AMBITO
if(true){
   var globalVar =  "Soy global";
   let blockLet = "Solo existo en este bloque";
   const blockConst = "Constantes"; 
}
console.log("GLOBAL: "+globalVar);
//console.log("LET: "+blockLet);
//console.log("CONST: "+blockConst);

var nota = 7;

if(nota >= 4){
    console.log("RAMO APROBADO :)");
}else if (nota < 4){
    console.log("RAMO REPROBADO :(");
}else{
    console.log("ERROR");
}

/*
    DESARROLLAR EL JUEGO DE ADIVINAR EL NUMERO EN WEB
            HTML - CSS - JAVASCRIPT
    -> GENERAR EL NUMERO DE FORMA ALEATORIO
    -> EL USUARIO INGRESA EL NUMERO  
    -> MOSTRAR EL NUMERO DE INTENTOS DEL USUARIO
    -> DAR PISTAS (SI EL NUMERO ES MAYOR O MENOR)
    -> INDICAR AL USUARIO CUANDO ADIVINE EL NUMERO
    -> PERMITIR AL USUARIO REINICIAR EL JUEGO

*/
//NUMERO ALEATORIO
let numAleatorio = Math.floor(Math.random() * 100)+1;
console.log(numAleatorio);