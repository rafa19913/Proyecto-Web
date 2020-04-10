<?php
require 'include/header.php'; # contiene la navegacion
?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Consolas</h1>
        <buttom type="buttom" class="btn btn-primary" data-toggle="modal" data-target="#agregarConsolaModal">Agregar</buttom>
        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <div id="listadoConsolas" class="row">
        <!-- Aqui se carga la lista de consolas desde components/listarConsolasCards.php -->
    </div>

<?php
# modals
require 'include/modals/consolas/addConsola.php';
require 'include/modals/confirmDeleteConsola.php';
require 'include/modals/consolas/updateConsola.php';
require 'include/modals/consolas/listJuegosConsola.php';
require 'include/modals/consolas/advertenciaSinJuegos.php';
?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/izitoast/iziToast.min.js" type="text/javascript"></script>
    <script src="js/functions.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {

            loadListConsolas(); // carga lista de consolas

        }, false);
    </script>

<?php
# footer
require 'include/footer.php'; # contiene los scripts js y logout modal.
?>