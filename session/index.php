<?php 
    //SIMULAR CREDENCIALES
    $usuarios = [
        'admin' => '12345',
        'root'  => '54321',
        'erick' => 'trigo'
    ];

    /* 
        SESSION
        LAS VARIABLES DE SESION PERMITE ALMACENAR
        INFORMACION DE USUARIO DE FORMA PERSISTENTE
        PUEDEN SER UTILES PARA GUARDAR INFORMACION COMO
        DATOS DE AUTENTICACION, PREFERENCIAS DE USUARIO, ETC,
    */
    session_start(); //INICIA O REANUDA UNA SESION

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
        $usuario = $_POST['username'];
        $password = $_POST['password'];
        //VERIFICAR CONTRASEÑA
        if(isset($usuarios[$usuario]) && $usuarios[$usuario] === $password){
            //GUARDAR LAS CREDENCIALES EN LA SESION
            $_SESSION['username'] = $usuario;
            //IMPRIMIR SESION echo "NOMBRE: ".$_SESSION['username'];
            header("Location: dashboard.php");
            exit();
        }else{
            $error = "USUARIO O CONTRASEÑA INCORRECTOS";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>LOGIN</h2>
    <form method="POST" action="">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
    <?php if(isset($error)) echo"<p style='color:red;'>$error</p>"; ?>
</body>
</html>