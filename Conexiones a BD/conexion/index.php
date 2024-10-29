<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD USUARIOS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>CRUD USUARIOS</h1>

        <?php
        require_once 'userFunction.php';
        //AL HACER CLIC EN EDITAR SE OBTIENEN LOS DATOS DEL USUARIO
        if (isset($_GET['edit'])) {
            $id_user = $_GET['edit'];
            $editUser = getUserById($id_user); //OBTIENE LOS DATOS MEDIANTE ID
        }

        //INSERTAR
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            insertUser($username, $email);
        }

        //ACTUALIZAR
        if (isset($_POST['update'])) {
            $id_user = $_POST['id_user'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            updateUser($id_user, $username, $email);
        }

        //ELIMINAR AL SELECCIONAR
        if (isset($_GET['delete'])) {
            $id_user = $_GET['delete'];
            deleteUser($id_user);
        }
        ?>

        <form action="index.php" method="POST" class="user-form">
            <input type="hidden" id="id_user" name="id_user" value="<?php echo isset($editUser) ? $editUser['id_user'] : ''; ?>">

            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($editUser) ? $editUser['username'] : ''; ?>" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($editUser) ? $editUser['email'] : ''; ?>" required>

            <button type="submit" name="<?php echo isset($editUser) ? 'update' : 'submit'; ?>">
                <?php echo isset($editUser) ? 'Actualizar usuario' : 'Guardar usuario'; ?>
            </button>
        </form>

        <hr>

        <!-- MOSTRAR USUARIOS -->
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Usuario</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $users = getUsers();//OBTENER Y MOSTRAR
                foreach ($users as $user) {
                    echo "<tr>
                            <td>{$user['id_user']}</td>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}</td>
                            <td>
                                <a href='index.php?edit={$user['id_user']}' class='btn btn-edit'>Editar</a>
                                <a href='index.php?delete={$user['id_user']}' class='btn btn-delete' onclick='return confirm(\"¿Estás seguro de eliminar este usuario?\");'>Eliminar</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
