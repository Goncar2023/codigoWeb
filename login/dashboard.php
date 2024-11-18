<?php
    session_start();//INICIAR O REANUDA SESION

    if(!isset($_SESSION['username'])){
        //REDIRIGIR AL LOGIN SI NO ESTA LOGEADO
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
</head>
<body>
    <h2>Bienvenid@ <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>Sesión iniciada correctamente</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>