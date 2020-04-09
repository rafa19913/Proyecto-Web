<?php
# @uthor armando_rdz, at 08/04/20

$sql = "SELECT id, por_hora, por_compra, cantidad_objetivo FROM promocion_1";
#$result = mysqli_query($con, $sql);

?>

<!-- Modal para editar consola -->
<div class="modal fade right" id="editarPromocionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-full-height" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Editar tarifa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Monedas ganadas por hora de juego:</label>
                <input type="text" name="" id="por_hora" class="form-control input-sm" >
                <label for="">Monedas ganadas por compra:</label>
                <input type="text" name="" id="por_compra" class="form-control input-sm">
                <label for="">Cantidad Objetivo de monedas:</label>
                <input type="text" name="" id="cantidad_objetivo" class="form-control input-sm" >
            </div>
            <div class="modal-footer justify-content-center">
                <input type="number" value="" id="id" hidden>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="updateTarifaBtn" type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="updateConsola()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->