<?php

# @uthor armando_rdz, at 08/04/20

    require '../db/Database.php';
    $db = new Database;
    $con = $db ->connect();

    $id = $_POST['id'];
    $por_hora = $_POST['por_hora'];
    $por_compra = $_POST['por_compra'];
    $cantidad_objetivo = $_POST['cantidad_objetivo'];


    $query = "UPDATE promocion_1 SET por_hora='$por_hora', por_compra='$por_compra', cantidad_objetivo='$cantidad_objetivo'
                        WHERE id='$id'";


    echo $res = mysqli_query($con, $query);