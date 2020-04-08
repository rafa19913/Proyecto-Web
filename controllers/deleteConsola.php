<?php
# @uthor armando_rdz, at 08/04/20

    // Se recibe el id del registro a eliminar desde js/functions.js
    require '../db/Database.php';
    $db = new Database;
    $connection = $db->connect();

    $id = $_POST['id'];
    $sql = "DELETE FROM consolas WHERE id = '$id'";

    echo $result = mysqli_query($connection, $sql);