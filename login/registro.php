<?php 
require "config.php"; //CONEXION BD

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    $confirm_pwd = $_POST['confirm_password'];

    if($password !== $confirm_pwd){
        $error = "LAS CONTRASEÑAS NO COINCIDEN";
    }else{
        //VERIFICAR SI EL NOMBRE DE USUARIO YA EXISTE
        $stmt = $mysqli -> prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt -> bind_param("s",$usuario);
        $stmt -> execute();
        $result = $stmt -> get_result();//OBTENER RESULTADOS
        
        if($result -> num_rows > 0){
            $error = "EL NOMBRE DE USUARIO NO ESTA DISPONIBLE";
        }else{
            //HASHEAR LA CONTRASEÑA
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            //INSERTAR EL USUARIO
            $stmt = $mysqli -> prepare("INSERT INTO usuarios (username,password_hash) VALUES (?,?)");
            $stmt -> bind_param("ss", $usuario, $password_hash);

            if($stmt -> execute()){
                //SI SE REGISTRA, REDIRIGE AL LOGIN
                $stmt -> close();
                header("Location: index.php");
                exit();
            }else{
                $error = "ERROR AL REGISTRAR USUARIO";
            }
        }
    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
</head>
<body>
    <h2>REGISTRO</h2>
    <form method="POST" action="">
        <label for="username">Usuario:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br>
        <button type="submit">Registrarse</button>
    </form>
    <?php if(isset($error)) echo"<p style='color:red;'>$error</p>"; ?>
</body>
</html>