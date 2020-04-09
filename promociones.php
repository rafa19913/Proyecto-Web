<?php
require 'include/header.php'; # contiene la navegacion
?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Promociones</h1>
        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>
     <div id="listadoPromocion1" class="row">
        <!-- Aqui se carga la lista de consolas desde components/listarConsolasCards.php -->
    </div>




<?php

require 'include/modals/promociones/updatePromocion1.php';
require 'include/modals/promociones/updatePromocion2.php';

?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/izitoast/iziToast.min.js" type="text/javascript"></script>
    <script src="js/functions.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {

            loadListPromocion1(); // carga lista de promociones1
        }, false);
    </script>

<?php
# footer
require 'include/footer.php'; # contiene los scripts js y logout modal.
?>

