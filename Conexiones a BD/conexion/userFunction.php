<?php
require_once 'config.php';

function insertUser($username, $email) { //INSERTAR FORMULARIO
    global $pdo;//OBTENER LA CONEXION
    $sql = "INSERT INTO user (username, email) VALUES (:username, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

function getUsers() { //Obtener todos los usuarios
    global $pdo;
    $sql = "SELECT id_user, username, email FROM user";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserById($id_user) { //Obtener mediante ID
    global $pdo;
    $sql = "SELECT id_user, username, email FROM user WHERE id_user = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUser($id_user, $username, $email) {//ACTUALIZAR DATOS
    global $pdo;
    $sql = "UPDATE user SET username = :username, email = :email WHERE id_user = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
}

function deleteUser($id_user) {//ELIMINAR USUARIO
    global $pdo;
    $sql = "DELETE FROM user WHERE id_user = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    return $stmt->execute();
}
?>
