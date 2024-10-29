<?php
require_once 'config.php';

function insertUser($username, $email) {//INSERTAR USUARIO EN LA BD
    global $mysqli;//OBTENER CONEXION
    $sql = "INSERT INTO user (username, email) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $username, $email);//SS -> INDICA QUE VAN DOS PARAMETROS DE TIPO STRING
    return $stmt->execute();
}

function getUsers() {//OBTENER TODOS LOS USUARIOS
    global $mysqli;
    $sql = "SELECT id_user, username, email FROM user";
    $result = $mysqli->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getUserById($id_user) {//OBTENER MEDIANTE ID
    global $mysqli;
    $sql = "SELECT id_user, username, email FROM user WHERE id_user = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id_user);//i -> INDICAR QUE EL PARAMETRO ES DE TIPO INT
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function updateUser($id_user, $username, $email) {//ACTUALIZAR USUARIO
    global $mysqli;
    $sql = "UPDATE user SET username = ?, email = ? WHERE id_user = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $id_user);
    return $stmt->execute();
}

function deleteUser($id_user) {//ELIMINAR USUARIO MEDIANTE ID
    global $mysqli;
    $sql = "DELETE FROM user WHERE id_user = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id_user);
    return $stmt->execute();
}
?>
