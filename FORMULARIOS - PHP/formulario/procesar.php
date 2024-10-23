<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* 
        $nombre = htmlspecialchars(trim($_GET["nombre"]));
        $email = htmlspecialchars(trim($_GET["email"]));
        $password = htmlspecialchars(trim($_GET["password"]));
    */
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    //trim(): Limpia los espacios innecesarios.
    //htmlspecialchars(): Protege contra inyecciones de código malicioso (XSS).
    //Cross-Site Scripting

    //MOSTRAR LOS DATOS 
    echo "¡Registro exitoso!<br>";
    echo "Nombre: " . $nombre . "<br>";
    echo "Correo electrónico: " . $email . "<br>";

    //PUEDEN TAMBIEN ENVIARLOS A LA BD O HACER LA CONSULTA
}
?>
