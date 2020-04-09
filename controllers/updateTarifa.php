<?php
# @uthor armando_rdz, at 08/04/20

    require 'db/Database.php';
    $db = new Database;
    $con = $db ->connect();

    $id = $_GET['id'];
    $numero = $_GET['nombre'];
    $serial = $_GET['cobro'];
    $idpl = $_GET['fecha_lanzamiento'];



    $query = "UPDATE consolas SET nombre='$nombre', cobro='$cobro', fecha_lanzamiento='$fecha_lanzamiento'
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