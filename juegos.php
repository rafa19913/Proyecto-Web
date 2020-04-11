<?php
    require 'include/header.php'; # contiene la navegacion
    require_once 'db/Database.php';
    $db = new Database;
    $connection = $db->connect();

    $sql = "SELECT * FROM juegos;";
    $resultado = mysqli_query($connection, $sql);
    $row_cnt = mysqli_num_rows($resultado);
?>


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Juegos</h1>
          </div>

          <div id="listadoJuegos">
              <!-- Aqui se carga la lista de consolas desde components/listarConsolasCards.php -->
          </div>
          <!-- --------------------------- -->

            <!-- Termina información de juegos -->
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<?php
  # modals
  require 'include/modals/juegos/addJuego.php';
  require 'include/modals/juegos/editJuego.php';
  require 'include/modals/juegos/deleteJuego.php';
?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/izitoast/iziToast.min.js" type="text/javascript"></script>
    <script src="js/functionsJuegos.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            loadListJuegos(); // carga lista de juegos
        }, false);
    </script>

    <script type="text/javascript">
      let contenedor;
    </script>
<?php
# footer
require 'include/footer.php'; # contiene los scripts js y logout modal.
?>