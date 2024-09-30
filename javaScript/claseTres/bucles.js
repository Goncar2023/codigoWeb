//BUCLE FOR
document.write("<h1>BUCLE FOR</h1>");
for(let x =0; x < 5; x++){
    document.write("<h2 class='numeros'>N°: "+x+"</h2>");
}
document.write("<h1>BUCLE WHILE</h1>");

//WHILE
let i = 0
while(i < 10){
    document.write("<h2 class='numeros'>N°: "+i+"</h2>");
    i++;
}

document.write("<h1>BUCLE DO - WHILE</h1>");
//DO - WHILE
let t = 20;
do{
    document.write("<h2 class='numeros'>N°: "+t+"</h2>");
    t--;
}while(t > 0 );
