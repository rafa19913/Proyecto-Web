<?php
# @uthor armando_rdz, at 08/04/20

$sql = "SELECT id, nombre FROM plataformas";
$result = mysqli_query($con, $sql);

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
                <div class="input-group mb-3">
                    <select class="custom-select" id="plataformaNameUpConsola">
                        <option selected>Selecciona...</option>
                        <?php
                        while ($row = mysqli_fetch_row($result)){ ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php
                        }  ?>
                    </select>
                </div>
                <label for="">Número de inventario</label>
                <input type="number" name="" id="numeroUp" class="form-control input-sm" min="1">
                <label for="">Serial</label>
                <input type="text" name="" id="serialUp" class="form-control input-sm">
            </div>
            <input type="number" value="" id="idUpConsola" hidden>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="updateConsolaBtn" type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="updateConsola()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->