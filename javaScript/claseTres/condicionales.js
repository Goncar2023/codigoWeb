var nota = 6;

/* 
    CONDICIONAL IF - ELSE
*/
if(nota >= 4){
    alert("CURSO APROBADO");
}else{
    alert("CURSO REPROBADO");
}
/*
    CUANDO TENEMOS SOLO UNA LINEA DENTRO DEL IF
    PODEMOS OMITIR LAS {} Y DEJAR EL CODIGO EN UNA LINEA
*/
if(nota >= 4) alert("CURSO APROBADO");

/* 
    camelCase -> nombreCompleto
    PascalCase -> NombreCompleto
    snake_case -> nombre_completo
    kebab-case -> nombre-completo
*/

//OPERADOR TERNARIO ?

//SINTAXIS -> condicion ? expresionUno : expresionDos

//OPERADOR TERNARIO: CONDICION ? VERDADERO : FALSO
var respuesta = (nota >= 4) ? "APROBADO" : "REPROBADO";
alert("EL CURSO FUE: "+respuesta);

//SWITCH CASE 
let diaSemana = prompt("¿QUE DIA ES HOY?");
let texto;
switch(diaSemana){
    case "1":
        texto = "Lunes";
        break;
    case "2":
        texto = "Martes";
        break;
    case "3":
        texto = "Miercoles";
        break;
    case "4":
        texto = "Jueves";    
        break;
    case "5":
        texto = "Viernes";
        break;
    case "6":
    case "7":
        texto= "Fin de semana";
        break;
    default: 
        texto = "DATO INCORRECTO";
}
alert(texto);

/*
    UNA FORMA MAS EFICIENTE PARA MANEJAR MUCHOS
    CASOS PODEMOS USAR UN OBJETO EN LUGAR DE UN SWITCH.

    FUNCIONA CUANDO ESTAMOS TRABAJANDO CON VALORES
    O FUNCIONES ASOCIADOS A CLAVES
*/

    const dias = {
        1: "Lunes",
        2: "Martes",
        3: "Miercoles",
        4: "Jueves",
        5: "Viernes",
        6: "Sabado",
        7: "Domingo"
    }

    let dia = 3;
    console.log(dias[dia] || "DIA NO VALIDO" );

/* 
    MAP -> CONJUNTO DE VALORES DINAMICOS Y MAS COMPLEJOS
        -> LA ESTRUCTURA ES MAS COMPLEJA QUE UN OBJETO

*/
const meses = new Map ([
    [1, "ENERO"],
    [2, "FEBRERO"],
    [3, "MARZO"],
    [4, "ABRIL"],
    [5, "MAYO"],
    [6, "JUNIO"],
    [7, "JULIO"],
    [8, "AGOSTO"],
    [9, "SEPTIEMBRE"],
    [10, "OCTUBRE"],
    [11, "NOVIEMBRE"],
    [12, "DICIEMBRE"],
]);

let mes = 9;
console.log(meses.get(mes) || "MES NO VALIDO");

const frutas = new Map([
    ["MANZANA", 1500],
    ["PLATANO", 2000],
    ["NARANJA", 1000],
    ["PERA", 1800]
]);

let fruta = "PLATANO";
console.log(frutas.get(fruta) || "FRUTA NO VALIDA");
