<?php 
$host = "localhost";
$db = "mi_app";
$user = "root";
$pwd ="IPCHILE";
//CONECTANDO
$mysqli = new mysqli($host, $user, $pwd, $db);

//VERIFICAR
if($mysqli -> connect_error){
    die("ERROR AL CONECTAR".$mysqli -> connect_error);
}
?>