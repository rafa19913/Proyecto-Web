<?php
# @uthor armando_rdz, at 08/04/20
?>

<!-- Modal para editar consola -->
<div class="modal fade right" id="editarConsolaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-full-height" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Editar consola</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Plataforma</label>
                <input id="plataformUpConsola" type="text" class="form-control" list="datalistOptionsRoles" placeholder="" />
                <datalist id="datalistOptionsRoles">
                    <option value="Xbox One" />
                    <option value="Play Station 4" />
                    <option value="Nintendo Wii" />
                    <option value="Nintendo Switch" />
                    <option value="Play Station 4 Pro" />
                    <option value="Xbox One X" />
                </datalist>
                <label for="">Número de inventario</label>
                <input type="text" name="" id="numeroUpConsola" class="form-control input-sm">
                <label for="">Cobro</label>
                <input type="number" name="" id="numeroUpConsola" class="form-control input-sm" min="1" placeholder="$ 00.00 /hora de juego">
                <label for="">Serial</label>
                <input type="text" name="" id="serialUpConsola" class="form-control input-sm">
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->
