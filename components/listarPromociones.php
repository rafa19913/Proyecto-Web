<?php
# @uthor armando_rdz, at 08/04/20
/**
 * Listado de las consolas en cards de bootstrap
 */

require '../db/Database.php';
$db = new Database;
$connection = $db->connect();

$sqlC = "SELECT id, por_hora, por_compra, cantidad_objetivo FROM promocion_1";
$resultC = mysqli_query($connection, $sqlC);

while ($row = mysqli_fetch_row($resultC)) { // por cada fila itera

    #$sqlP = "SELECT id, nombre, cobro, fecha_lanzamiento FROM consolas";
    #$resultP = mysqli_query($connection, $sqlP);
    #$resultP = mysqli_fetch_row($resultP);

    $data = $row[0]."||".$row[1]."||".$row[2]."||".$row[3];
    ?>

    <div class="col-xl-3 col-md-6 mb-4" style="margin-left: 200px; margin-right: 100px;">
        <div class="card" style="width: 25em;">

            <img class="card-img-top" src="images/consolas/icons/moneda.png ?>" alt="Card image cap"
                 style="height: 40%; width: 40%; margin-left: auto; margin-right: auto; margin-top: auto; margin-bottom: auto; padding-top: 10%;">

            <div>
                <h2><center> Promocion 1</center></h2>
            </div>

            <ul class="list-group list-group-flush" style="text-align: center">
                <li class="list-group-item"> Monedas ganadas por hora de juego: <strong><?php echo $row[1] ?></strong></li>
                <li class="list-group-item"> Monedas ganadas por compra: <strong><?php echo $row[2] ?></strong></li>
                <li class="list-group-item">Monedas equivalentes a hora de juego: <strong><?php echo $row[3] ?></strong></li>
            </ul>
            <div class="card-body" style="text-align: center">
                <!--<a href="#" class="card-link" data-toggle="modal" data-target="#verJuegosInstaladosModal">Juegos</a>-->
                <a href="#" class="card-link" data-toggle="modal" data-target="#editarPromocionModal" onclick="updateConsola('<?php echo $data ?>')">Editar</a>
                <!--<a id="" href="#" data-toggle="modal" data-target="#confirmarEliminacionModal" class="card-link" style="color: #ff253a" onclick="deleteConsola('<?php echo $row[0] ?>')">Eliminar</a>-->
            </div>
        </div>
    </div>



    <?php
} // termina el ciclo
    

  
$sqlC2 = "SELECT id, invitados, monedas FROM promocion_2";
$resultC2 = mysqli_query($connection, $sqlC2);

while ($row = mysqli_fetch_row($resultC2)) { // por cada fila itera

    #$sqlP = "SELECT id, nombre, cobro, fecha_lanzamiento FROM consolas";
    #$resultP = mysqli_query($connection, $sqlP);
    #$resultP = mysqli_fetch_row($resultP);

    $data = $row[0]."||".$row[1]."||".$row[2];
    ?>

    <div class="col-xl-3 col-md-6 mb-4" style=" margin: 20px; margin-top: 0;">
        <div class="card" style="width: 25em;">

            <img class="card-img-top" src="images/consolas/icons/moneda.png ?>" alt="Card image cap"
                 style="height: 40%; width: 40%; margin-left: auto; margin-right: auto; margin-top: auto; margin-bottom: auto; padding-top: 10%;">

            <div>
                <h2><center> Promocion 2</center></h2>
            </div>

            <ul class="list-group list-group-flush" style="text-align: center">
                <li class="list-group-item"> Invitados <strong><?php echo $row[1] ?></strong></li>
                <li class="list-group-item"> Monedas: <strong><?php echo $row[2] ?></strong></li>
            </ul>
            <div class="card-body" style="text-align: center">
                <!--<a href="#" class="card-link" data-toggle="modal" data-target="#verJuegosInstaladosModal">Juegos</a>-->
                <a href="#" class="card-link" data-toggle="modal" data-target="#editarConsolaModal" onclick="updateConsola('<?php echo $data ?>')">Editar</a>
                <!--<a id="" href="#" data-toggle="modal" data-target="#confirmarEliminacionModal" class="card-link" style="color: #ff253a" onclick="deleteConsola('<?php echo $row[0] ?>')">Eliminar</a>-->
            </div>
        </div>
    </div>



    <?php
} // termina el ciclo
    

?>
