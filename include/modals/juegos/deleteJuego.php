<?php
# @uthor adrian_amaya, at 08/04/20
$db = new Database;
$connection = $db->connect();
?>

<!-- Modal para editar nueva consola -->
<div class="modal fade right" id="borrarJuego" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
          <label for="">¿Esta seguro de eliminar este juego?</label>
          <input type="number" value="" id="idJuego" hidden>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="deleteJuegoBtn" type="button" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<script src="js/functionsJuegos.js"></script>

<!-- Full Height Modal Right -->