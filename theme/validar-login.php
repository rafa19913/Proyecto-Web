
<?php    
    include 'funciones.php';

    $ADMIN = 1;
    $GAMER = 2;

    $nombreDeUsuario = $_POST['nombreDeUsuario'];
    $contraseña = $_POST['contraseña'];
    $rolDelUsuario = validarUsuarioExistente($nombreDeUsuario,$contraseña); 


    //Seleccionar que pantalla se abrirá (ADMIN, GAMER)
    switch ($rolDelUsuario){
        case $ADMIN: 
            abrirPantallaAdmin($nombreDeUsuario,$rolDelUsuario);
            break;
            
        case $GAMER:
            abrirPantallaGamer($nombreDeUsuario,$rolDelUsuario);
            break;

        default:
            usuarioNoEncontrado();
            break;
    }


?>