<?php

//CREDENCIALES DE ACCESO
$host = 'sql10.freemysqlhosting.net:3306';
$dbname = 'sql10741283';
$username = 'sql10741283';
$password = 'UYr2yIJAxi';

//Crear la conexión con MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

//Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}
?>