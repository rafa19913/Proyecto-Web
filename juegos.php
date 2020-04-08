<?php
    require 'include/header.php'; # contiene la navegacion
    require_once 'db/Database.php';
    $db = new Database;
    $connection = $db->connect();

    $sql = "SELECT id, titulo, dir_img, descrpcion FROM juegos; ";
    $resultado = mysqli_query($connection, $sql);
?>


          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Juegos</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Mostrar cantidad de juegos registrados -->
            <div class="col-xl-3 col-md-6 mb-4">    
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Juegos registrados</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <!-- Hacer consulta aqui -->
                            <?php
                              $row_cnt = mysqli_num_rows($resultado);
                            ?>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row_cnt ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-gamepad fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Botón registrar juego -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="registrar_juego.php" style="text-decoration:none">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Registrar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Videojuego</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
            <!-- Empieza informacion de juegos -->
            <?php

              
              while($mostrar=mysqli_fetch_array($resultado)){
                ?>
                  <!-- Area Chart -->
                  <div class="col-xl-3 col-lg-7">
                    <div class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo $mostrar['titulo'] ?></h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opciones:</div>
                            <a class="dropdown-item" href="#">Editar</a>
                            <a class="dropdown-item" href="#">Eliminar</a>
                          </div>
                        </div>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                        <div class="chart-area">
                          <img src="<?php echo $mostrar['dir_img'] ?>" alt="" class="img-thumbnail">
                          <div class="dropdown-divider"></div>
                          <!-- Obtener todo las plataformas que existen -->
                          <?php 
                            $plataformas = "SELECT p.nombre FROM juegos j JOIN plataformaRegistro pr ON j.id = pr.id_juego JOIN plataformas p ON p.id = pr.id_plataforma"; 


                          ?>


                      </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            ?>
            


            <!-- Termina información de juegos -->
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



<?php
    require 'include/footer.php'; # contiene los scripts js y logout modal.
?>