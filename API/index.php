<!-- API (INTERFAZ DE PROGRAMACION DE APLICACIONES) -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Pokémon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <!-- FORMULARIO DE BUSQUEDA -->
        <div class="form-container">
            <h1>Pokédex</h1>

            <!-- BUSCAR POR NOMBRE -->
            <form method="GET" action="">
                <label for="pokemon">INGRESA EL NOMBRE DEL POKÉMON</label>
                <input type="text" id="pokemon" name="pokemon" required>
                <button type="submit">IR A BUSCAR</button>
            </form>
        </div>

        <!-- RESULTADOS -->
        <div class="result-container">
            <?php
            if (isset($_GET['pokemon']) && !empty($_GET['pokemon'])) {
                $pokemon = htmlspecialchars($_GET['pokemon']);
                $url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemon);

                //USAR cURL (Client URL) PARA OBTENER LOS DATOS DE LA API
                $ch = curl_init();//INICIAR SESION
                curl_setopt($ch, CURLOPT_URL, $url); //CONFIGURAR DIFERENTES PARAMETROS PARA LA SOLICITUD
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//PARA DEVOLVER LA RESPUESTA COMO STRING
                curl_setopt($ch, CURLOPT_FAILONERROR, true);//MANEJAR ERRORES
                $respuesta = curl_exec($ch); //EJECUTAR SOLICITUD
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($http_status == 404) {
                    echo "<p class='error'>POKÉMON '$pokemon' NO ENCONTRADO.</p>";
                } elseif ($respuesta === FALSE) {
                    echo "<p class='error'>ERROR AL CONECTAR CON LA API.</p>";
                } else {
                    //DECODIFICAR LA RESPUESTA JSON A UN ARRAY
                    $datos = json_decode($respuesta, true);
                    $nombre = ucfirst($datos['name']);
                    $tipos = array_map(fn($tipo) => $tipo['type']['name'], $datos['types']);
                    $habilidades = array_map(fn($habilidad) => $habilidad['ability']['name'], $datos['abilities']);
                    $imagen = $datos['sprites']['front_default'];
                
                    //ESTADISTICAS DEL POKÉMON
                    $hp = $datos['stats'][0]['base_stat'];
                    $attack = $datos['stats'][1]['base_stat'];
                    $defense = $datos['stats'][2]['base_stat'];
                    $speed = $datos['stats'][5]['base_stat'];
                
                    //DESCRIPCION
                    //USAR EL ENDPOINT ADICIONAL PARA OBTENER LA INFOR EN ESPAÑOL (SI ESTÁ DISPONIBLE)
                    $descripcion = "";
                    $url_desc = "https://pokeapi.co/api/v2/pokemon-species/" . $datos['id'];
                    $respuesta_desc = file_get_contents($url_desc);
                    $datos_desc = json_decode($respuesta_desc, true);
                    foreach ($datos_desc['flavor_text_entries'] as $entry) {
                        if ($entry['language']['name'] == 'es') {
                            $descripcion = $entry['flavor_text'];
                            break;
                        }
                    }
                
                    echo "<div class='pokemon-card'>";
                    echo "<h3>$nombre</h3>";
                    echo "<p>Tipo(s): <span class='types'>" . implode(", ", $tipos) . "</span></p>";
                    echo "<p><strong>Habilidades:</strong> <span class='abilities'>" . implode(", ", $habilidades) . "</span></p>";
                    echo "<img src='$imagen' alt='Imagen de $nombre'>";
                    echo "<div class='stats'>";
                    echo "<p><strong>HP:</strong> $hp</p>";
                    echo "<p><strong>Ataque:</strong> $attack</p>";
                    echo "<p><strong>Defensa:</strong> $defense</p>";
                    echo "<p><strong>Velocidad:</strong> $speed</p>";
                    echo "</div>";
                    echo "<p class='description'><strong>Descripción:</strong> $descripcion</p>";
                    echo "</div>";
                }
            }
            ?>
        </div>
</body>
</html>
