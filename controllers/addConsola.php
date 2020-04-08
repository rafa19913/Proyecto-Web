<?php
# @uthor armando_rdz, at 08/04/20

    // Se reciben los datos desde js/functions.js para agregar una nueva consola
    require '../db/Database.php';
    $db = new Database;
    $connection = $db -> connect(); # funcion para conectarse a la BD

    $pl = $_POST['plataforma'];
    $num = $_POST['numero'];
    $cob = $_POST['cobro'];
    $se = $_POST['serial'];

    $sql = "INSERT INTO consolas(plataforma, numero, cobro, serial) 
            VALUES('$pl', '$num', '$cob', '$se')";
    echo $result = mysqli_query($connection, $sql);