<?php
    include 'conexion.php';
    $conn = OpenCon();
    

    function validarUsuarioExistente($nombreDeUsuario,$password){
        global $conn;
        $consulta = "SELECT * FROM usuarios WHERE NombreUsuario = '$nombreDeUsuario'";
        $ejecutarConsulta = mysqli_query($conn,$consulta);
        $datosDeLaConsulta = mysqli_fetch_array($ejecutarConsulta);

        //Si existe un usuario regresa el ROL del usuario
        if ($datosDeLaConsulta['Contraseña'] == $password)
            return $datosDeLaConsulta['ID_Rol'];
        else
            return false;
    }

    function abrirPantallaAdmin($usuario,$rol){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $rol;
        header('Location: index.php');

    }

    function abrirPantallaGamer($usuario,$rol){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $rol;
        header('Location: index.php');
    }


?>