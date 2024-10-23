<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Fetch</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Formulario con Fetch API</h2>
        <form id="formRegistro">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Enviar</button>
        </form>

        
        <div id="result"></div><!-- MOSTRAR RESULTADO -->
    </div>

    <script src="validar.js"></script>
</body>
</html>
