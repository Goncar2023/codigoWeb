<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = htmlspecialchars(trim($_POST["email"]));

    if (!empty($nombre) && !empty($email)) {
        echo "Hola, $nombre. Tu correo ($email) ha sido registrado correctamente.";
    } else {
        echo "Rellena todos los campos";
    }
} else {
    echo "SOLO SE ACEPTAN POST";
}
?>
