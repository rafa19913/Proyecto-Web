<?php
# @uthor armando_rdz, at 08/04/20


    // Se reciben los datos desde js/functions.js para agregar una nueva consola
    require '../db/Database.php';
    $db = new Database;
    $connection = $db -> connect(); // funcion para conectarse a la BD
  

    $rol = $_POST['rol'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechaNac = $_POST['fechaNac'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $monedas = $_POST['monedas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $imagen = $_POST['imagen'];

    $fb = $_POST['fb'];
    $yt = $_POST['yt'];
    $tw = $_POST['tw'];

    // $nombreImg = $_FILES['imagen']['name'];
    // $archivo = $_FILES['imagen']['tmp_name'];
    // $ruta = "updates";
    // $ruta = $ruta."/".$nombreImg;
    // move_uploaded_file($archivo,$ruta);

    if ($rol == "Administrador"){
        $tipo = 1;
    }else{
        $tipo = 2;
    }

      $sql = "INSERT INTO usuarios(tipo,nombre, apellidos, f_nacimiento, genero, telefono, email, monedas, username, password, dir_img) 
              VALUES('$tipo', '$nombre', '$apellidos','$fechaNac','$genero','$telefono', '$email','$monedas','$username','$password', '$imagen')";
      echo $result = mysqli_query($connection, $sql);


    //Agregando las redes sociales
    if ($fb!= ""){
        insertarEnRedesSociales("Facebook",$fb,$email);
    }
    if ($yt!= ""){
        insertarEnRedesSociales("YouTube",$yt,$email);
    }
    if ($tw!= ""){
        insertarEnRedesSociales("Twitch",$tw,$email);
    }

    function insertarEnRedesSociales($nombre, $url, $email){
        global $connection;
        $idUsuario = obtenerIdUsuario($email);
        $consulta = "INSERT INTO redes(nombre,url,id_usuario) VALUES('$nombre','$url','$idUsuario')";
        $ejecutarConsulta = mysqli_query($connection,$consulta);
    }

    function obtenerIdUsuario($email){
        global $connection;
        $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
        $ejecutarConsulta = mysqli_query($connection,$consulta);
        $resultadosConsulta = mysqli_fetch_array($ejecutarConsulta);
        $id = $resultadosConsulta['id'];
        return $id;
    }


?>
