<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="timer-container">
        <h1>Tiempo</h1>
        <div id="timer">00:00:00</div>
        <button id="finish-btn">Terminar</button>
    </div>

    <form id="time-form" action="saveTime.php" method="POST">
        <input type="hidden" id="time-input" name="tiempo_final">
    </form>

    <script src="timer.js"></script>
</body>
</html>
