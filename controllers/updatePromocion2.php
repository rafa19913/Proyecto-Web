<?php

# @uthor armando_rdz, at 08/04/20

    require '../db/Database.php';
    $db = new Database;
    $con = $db ->connect();

    $id = $_POST['id'];
    $invitados = $_POST['invitados'];
    $monedas = $_POST['monedas'];


    $query = "UPDATE promocion_2 SET invitados='$invitados', monedas='$monedas'
                        WHERE id='$id'";


    echo $res = mysqli_query($con, $query);