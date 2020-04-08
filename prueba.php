<?php
    require_once 'db/Database.php';
    $db = new Database;
    $connection = $db->connect();

    $sql = "SELECT COUNT(*) FROM juegos;";
    $resultado = mysqli_query($connection, $sql);
    $row_cnt = mysqli_num_rows($resultado);

    echo $row_cnt;
?>