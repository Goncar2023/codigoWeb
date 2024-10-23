<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Formulario</h2>
        <form id="formRegistro" action="procesar.php" method="POST" onsubmit="return validarFormulario()">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Ingresa tu correo" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingresa una contraseña" required>

            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirma tu contraseña" required>

            <button type="submit">Registrarse</button>
        </form>
        <div id="error-message"></div>
    </div>

    <script src="validar.js"></script>
</body>
</html>
