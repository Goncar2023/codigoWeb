<?php 
    session_start();
    //ELIMINAR VARIABLES DE SESION
    session_unset();
    //DESTRUIR LA SESION ACTUAL
    session_destroy();

    //REDIRIGIR AL LOGIN
    header("Location: index.php");
    exit();
?>