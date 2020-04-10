<<<<<<< HEAD
<?php# @uthor armando_rdz, at 08/04/20    require '../db/Database.php';    $db = new Database;    $con = $db ->connect();    $id = $_POST['id'];    $numero = $_POST['numero'];    $serial = $_POST['serial'];    $idpl = $_POST['idplataforma'];    $query = "UPDATE consolas SET numero='$numero', serial='$serial', id_plataforma='$idpl'                        WHERE id='$id'";    echo $res = mysqli_query($con, $query);
=======
<?php

# @uthor armando_rdz, at 08/04/20

    require '../db/Database.php';
    $db = new Database;
    $con = $db ->connect();

    $id = $_POST['id'];
    $numero = $_POST['numero'];
    $serial = $_POST['serial'];
    $idpl = $_POST['idplataforma'];



    $query = "UPDATE consolas SET numero='$numero', serial='$serial', id_plataforma='$idpl'
                        WHERE id='$id'";

    echo $res = mysqli_query($con, $query);
>>>>>>> b90af581092a15cb87b3c82861cc4b787c4c1283
