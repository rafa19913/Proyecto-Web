<?php
# @uthor armando_rdz, at 08/04/20
/**
 * Listado de las consolas en cards de bootstrap
 */

require '../db/Database.php';
$db = new Database;
$connection = $db->connect();

$sqlC = "SELECT id, numero, serial, id_plataforma FROM consolas";
$resultC = mysqli_query($connection, $sqlC);

while ($row = mysqli_fetch_row($resultC)) { // por cada fila itera

    $sqlP = "SELECT id, nombre, cobro, fecha_lanzamiento FROM plataformas WHERE id = '$row[3]'";
    $resultP = mysqli_query($connection, $sqlP);
    $resultP = mysqli_fetch_row($resultP);

    $img_pla = "";
    $pl = strtoupper($resultP[1]);
    if($pl == "PLAY STATION 4" || $pl == "PLAY STATION 3" || $pl == "PLAY STATION 4 Pro"){
        $img_pla = "play_station_gray.png";
    }elseif ($pl == 'XBOX ONE' || $pl == 'XBOX 360' || $pl == "XBOX" || $pl == "XBOX ONE X"){
        $img_pla = "xbox_gray.png";
    }elseif ($pl == 'NINTENDO SWITCH' || $pl == "NINTENDO 64" || $pl == "NINTENDO"){
        $img_pla = "nintendo_gray.png";
    }elseif ($pl == 'NINTENDO WII'){
        $img_pla = "nintendo_wii_gray.png";
    }else {
        $img_pla = "default.png";
    }

    $data = $row[0]."||".$row[1]."||".$row[2]."||".$row[3];
    ?>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="images/consolas/icons/<?php echo $img_pla ?>" alt="Card image cap"
                 style="height: 40%; width: 40%; margin-left: auto; margin-right: auto; margin-top: auto; margin-bottom: auto; padding-top: 10%;">
            <div class="card-body" style="text-align: center">
                <h5 class="card-title">#<? echo $row[1] ?></h5>
                <p class="card-text" style="text-align: center"><strong><?php echo $resultP[1] ?></strong></p>
            </div>
            <ul class="list-group list-group-flush" style="text-align: center">
                <li class="list-group-item">$<?php echo $resultP[2] ?> <small>/ hora de juego</small></li>
                <li class="list-group-item"><strong><? echo $row[2] ?></strong></li>
            </ul>
            <div class="card-body" style="text-align: center">
                <a href="#" class="card-link" data-toggle="modal" data-target="#verJuegosInstaladosModal">Juegos</a>
                <a href="#" class="card-link" data-toggle="modal" data-target="#editarConsolaModal" onclick="updateConsola('<?php echo $data ?>')">Editar</a>
                <a id="" href="#" data-toggle="modal" data-target="#confirmarEliminacionModal" class="card-link" style="color: #ff253a" onclick="deleteConsola('<?php echo $row[0] ?>')">Eliminar</a>
            </div>
        </div>
    </div>


    <?php
} // termina el ciclo

?>
