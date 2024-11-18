<?php 
require "config.php"; //CONEXION BD 
session_start(); //INICIAR O REANUDAR LA SESION

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    //PREPARAR Y CONSULTAR
    $stmt = $mysqli -> prepare("SELECT * FROM usuarios 
    WHERE username=?");
    $stmt -> bind_param("s", $usuario);
    $stmt -> execute(); //SE EJECUTA LA CONSULTA
    $result = $stmt -> get_result(); //OBTENER RESULTADO
    $user = $result -> fetch_assoc();

    //VERIFICAR LA CONTRASEÑA ES CORRECTA
    if($user && password_verify($password, $user['password_hash'])){
        //ALMACENAR EL NOMBRE DE USUARIO EN LA SESSION
        $_SESSION['username'] = $usuario; 
        header("Location: dashboard.php");//REDIRIGIR
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
    <p>¿No tienes cuenta?<a href="registro.php">REGISTRATE AQUÍ</a></p>
</body>
</html>