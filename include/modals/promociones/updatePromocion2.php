<?php
# @uthor armando_rdz, at 08/04/20

$sql = "SELECT id, por_hora, por_compra, cantidad_objetivo FROM promocion_1";
#$result = mysqli_query($con, $sql);

?>

<!-- Modal para editar consola -->
<div class="modal fade right" id="editarPromocionModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                <label for="">Invitados necesarios:</label>
                <input type="text" name="" id="invitados" class="form-control input-sm" >
                <label for="">Monedas ganadas:</label>
                <input type="text" name="" id="monedas" class="form-control input-sm">
            </div>
            <div class="modal-footer justify-content-center">
                <input type="number" value="" id="id" hidden>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="updateTarifaBtn" type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="updatePromocion2()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->