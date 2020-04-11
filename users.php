<?php
require 'include/header.php'; # contiene la navegacion
?>

<link rel="stylesheet" type="text/css" href="css/main.css">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
        <buttom type="buttom" class="btn btn-primary" data-toggle="modal" data-target="#agregarUsuarioModal">Agregar</buttom>
    </div>


    
    <div id="listadoUsuarios" class="row">
        <!-- Aqui se carga la lista de usuarios desde components/listarUsuariosCards.php -->
    </div>

    <?php
        # modals
        
         require 'include/modals/usuarios/addUsuario.php';
         require 'include/modals/usuarios/showUsuarioSeleccionado.php';
    //     require 'include/modals/confirmarEliminacion.php';
         require 'include/modals/usuarios/updateUsuario.php';
    // ?>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/izitoast/iziToast.min.js" type="text/javascript"></script>
    <script src="js/functions.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            loadListUsuarios(); // carga lista de usuarios
        }, false);
    </script>



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php
require 'include/footer.php'; # contiene los scripts js y logout modal.
?>