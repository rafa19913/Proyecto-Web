<?php
# @uthor armando_rdz, at 08/04/20

$sql = "SELECT id, nombre, cobro, fecha_lanzamiento FROM plataformas";
#$result = mysqli_query($con, $sql);

?>

<!-- Modal para editar consola -->
<div class="modal fade right" id="editarTarifaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                <label for="">Nombre</label>
                <input type="text" name="" id="nombre" class="form-control input-sm" disabled="true">

                <label for="">Cobro</label>
                <input type="text" name="" id="cobro" class="form-control input-sm">
                <label for="">Fecha de Lanzamiento</label>
                <input type="text" name="" id="fecha_lanzamiento" class="form-control input-sm" disabled="true">
            </div>
            <div class="modal-footer justify-content-center">
                <input type="number" value="" id="idPlataforma" hidden>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="updateTarifaBtn" type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="updateTarifa()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->