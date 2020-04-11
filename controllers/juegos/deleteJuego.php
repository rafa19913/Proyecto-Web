<?php
# @uthor adrian_amaya, at 09/04/2020

    // Se reciben los datos desde js/functions.js para editar un juego
    require '../../db/Database.php';
    $db = new Database;
    $connection = $db -> connect(); # funcion para conectarse a la BD

    $id = $_POST['id'];
    $ruta;

    //Eliminar relaciones en platdisponibles
    $sql = "DELETE FROM platdisponibles WHERE id_juego=$id;";
    $result = mysqli_query($connection, $sql);

    //Eliminar foto
    $sql = "SELECT dir_img FROM juegos WHERE id='$id';";
    $resultado = mysqli_query($connection, $sql);
    $filename = mysqli_fetch_row($resultado);  //Fila[0]  = id
    unlink($filename[0]);

    //Eliminar relaciones en platdisponibles
    $sql = "DELETE FROM juegos WHERE id=$id;";
    $result = mysqli_query($connection, $sql);

    echo $result;
?>

<script text="text/javascript">
    console.log('<?php echo $id ?>');
</script>