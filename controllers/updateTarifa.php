<?php

# @uthor armando_rdz, at 08/04/20

    require '../db/Database.php';
    $db = new Database;
    $con = $db ->connect();

    $idPlataforma = $_POST['idPlataforma'];
    $nombre = $_POST['nombre'];
    $cobro = $_POST['cobro'];
    $fecha_lanzamiento = $_POST['fecha_lanzamiento'];


    $query = "UPDATE plataformas SET nombre='$nombre', cobro='$cobro', fecha_lanzamiento='$fecha_lanzamiento'
                        WHERE id='$idPlataforma'";


    echo $res = mysqli_query($con, $query);