<?php 
    //CREDENCIALES DE ACCESO A LA BD
    $host = 'sql10.freemysqlhosting.net:3306';
    $dbname = 'sql10741283';
    $username = 'sql10741283';
    $password = 'UYr2yIJAxi';

    try{
        //PDO -> PHP DATA OBJECTS
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username,$password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        die("Error de conexión". $error -> getMessage());
    }
?>