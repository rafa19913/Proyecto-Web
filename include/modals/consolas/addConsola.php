<?php
# @uthor armando_rdz, at 08/04/20

require 'db/Database.php';
$db = new Database;
$con = $db ->connect();

$sql = "SELECT id, nombre FROM plataformas";
$result = mysqli_query($con, $sql);

?>

<!-- Modal para agregar nueva consola -->
<div class="modal fade right" id="agregarConsolaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <div class="modal-dialog modal-full-height" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Nueva consola</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <label for="">Plataforma</label>
          <div class="input-group mb-3">
              <select class="custom-select" id="plataformaAdd">
                  <option selected>Selecciona...</option>
                  <?php
                    while ($row = mysqli_fetch_row($result)){ ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                  <?php
                    }  ?>
              </select>
          </div>
          <label for="">Número de inventario</label>
          <input type="number" name="" id="numeroAdd" class="form-control input-sm" min="1">
          <label for="">Serial</label>
          <input type="text" name="" id="serialAdd" class="form-control input-sm">
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="agregarConsolaBtn" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->