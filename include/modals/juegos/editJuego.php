<?php
# @uthor adrian_amaya, at 08/04/20
$db = new Database;
$connection = $db->connect();

$sql = "SELECT * FROM plataformas;";
$resultado = mysqli_query($connection, $sql);
?>

<!-- Modal para editar nueva consola -->
<div class="modal fade right" id="editarJuego" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <div class="modal-dialog modal-full-height" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Nuevo Juego</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label for="">Titulo del juego:</label>
          <input type="text" name="" id="titulo" class="form-control input-sm" autofocus required>

          <label for="">Descripción:</label>
          <input type="text" name="" id="descripcion" class="form-control input-sm" required>

          <label for="">Imagen:</label>
          <img id="myimage">
          <input type="file" id="imagen" accept=".jpg,.png,.jpge,.tif, .jfif" onChange="onFileSelected(event);" class="form-control input-sm" required>

          <label for="">Plataformas:</label>
          <div style="width: 100%; padding: 0.375rem 0.75rem; font-size: 1rem; font-weight: 400; line-height: 1.5; color: #6e707e; background-color: #fff; background-clip: padding-box; border: 1px solid #d1d3e2; border-radius: 0.35rem; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
              <div class="form-check" id="showPlataformas">
              <script type="text/javascript" defer>

              </script>
                <?php 
                    while($mostrar=mysqli_fetch_array($resultado)){
                ?>
                <script type="text/javascript" defer>
                    contenedor = document.getElementById('showPlataformas');

                    divisor = document.createElement("div");
                    divisor.classList.add('col-xl-1');
                    divisor.classList.add('col-md-1');
                    divisor.classList.add('mb-1');
                    
                    label = document.createElement("label");
                    label.innerText = '<?php echo $mostrar['nombre'];?>';
                    label.classList.add('form-check-label');

                    input = document.createElement('input');
                    input.setAttribute("type", "checkbox");
                    input.innerText = '<?php echo $mostrar['nombre'];?>';
                    input.setAttribute("onclick", "checkPlataforma(" + '<?php echo $mostrar['id'];?>' + ")");
                    input.setAttribute("id", '<?php echo $mostrar['id'];?>');
                    input.classList.add('form-check-input');

                    divisor.appendChild(input);
                    divisor.appendChild(label);

                    contenedor.appendChild(divisor);
                </script>                
                <?php }?>
              </div>

            </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="agregarJuegoBtn" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script src="js/functionsJuegos.js"></script>


<!-- Full Height Modal Right -->