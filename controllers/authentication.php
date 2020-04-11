<?php
/*
 * Validacion y autenticacion de usuarios
 * TODO: Hash para cifrar contraseñas, Validar a partir del tipo de usuario (admin, socio).
 */

require_once '../db/Database.php';
$db = new Database;
$connection = $db->connect();

session_start();
if(isset($_SESSION['id'])){
    header('Location: ../index.php');
}

# Preparar el SQL, evitando ataques de inyeccion.
if ($stmt = $connection->prepare('SELECT id, tipo, password FROM usuarios WHERE email = ?')) {
    # vincular parametros; en este caso es string (s).
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    # guarda el resultado
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $tipo, $password);
        $stmt->fetch();
        # La cuenta existe, ahora se validara el password
        if (password_verify($_POST['password'], $password)) { # verificar password encriptada
            # verificacion correcta, ahora se creara una sesion con el id del usuaro.
            # Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $id;
            $_SESSION['tipo'] = $tipo;
            if($tipo == 1) {
                header('Location: ../index.php');
                exit;
            }if($tipo == 2) {
                header('Location: ../indexGamer.php');
            }

        } else {
            header('Location: ../login.php');
            exit;
        }
    } else {
        header('Location: ../login.php');
        exit;
    }

    $stmt->close();
}


?>


