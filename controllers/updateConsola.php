<?php

# @uthor armando_rdz, at 08/04/20

    require '../db/Database.php';
    $db = new Database;
    $con = $db ->connect();

    $id = $_POST['id'];
    $numero = $_GET['numero'];
    $serial = $_GET['serial'];
    $idpl = $_GET['idplataforma'];



    $query = "UPDATE consolas SET numero='$numero', serial='$serial', id_plataforma='$idpl'
                        WHERE id='$id'";

    echo $res = mysqli_query($con, $query);

/*
$sql = "UPDATE consolas SET numero = ?, serial = ?, id_plataforma = ? WHERE id  = ?" ;
$stmt = $con->prepare($sql);
$stmt->bind_param(':numero', $numero);
$stmt->bind_param(':serial', $serial);
$stmt->bind_param(':id_plataforma', $idpl);
$stmt->bind_param(':id', $id);
echo $stmt->execute();
*/
