<?php
# @uthor adrian_amaya, at 09/04/2020

    // Se reciben los datos desde js/functions.js para editar un juego
    require '../../db/Database.php';
    $db = new Database;
    $connection = $db -> connect(); # funcion para conectarse a la BD

    $titulo = $_POST['titulo'];
    $src = $_POST['src'];
    $id = $_POST['id'];
    $plataformas = $_POST['plataformas'];
    $desc = $_POST['descripcion'];
    $ruta;

    if($src == "nada"){
        $type_image = $_POST['type'];
        $archivo = $_POST['tmp_name'];

        $sql = "SELECT dir_img FROM juegos WHERE id='$id';";
        $resultado = mysqli_query($connection, $sql);
        $filename = mysqli_fetch_row($resultado);  //Fila[0]  = id

        unlink($filename[0]);

        $formato = ".";
        $banderaPunto = false;
        for($i=0; $i<strlen($type_image); $i++){
            if($banderaPunto){
                $formato = $formato.$type_image[$i];
            }
            if($type_image[$i] == "/"){
                $banderaPunto = true;
            }
        }

        $ruta = "../../images/juegos/".strtolower(str_replace(' ', '_', $titulo))."_".time().$formato;

        $archivo = str_replace('data:'.$type_image.';base64,', '', $archivo);
        $archivo = str_replace(' ', '+', $archivo);
        $data = base64_decode($archivo);
        file_put_contents($ruta, $data);
    }else{
        $banderaPunto = false;
        $formato = "";
        for($i=6; $i<strlen($src); $i++){
            if($banderaPunto){
                $formato = $formato.$src[$i];
            }
            if($src[$i] == "."){
                $banderaPunto = true;
            }
        }
        $ruta = "../../images/juegos/".strtolower(str_replace(' ', '_', $titulo))."_".time().".".$formato;
        rename($src, $ruta);    
    }

    $sql = "UPDATE juegos SET titulo='$titulo', dir_img='$ruta', descripcion='$desc' WHERE id=$id;";
    $result2 = mysqli_query($connection, $sql);

    //Eliminar relaciones en platdisponibles
    $sql = "DELETE FROM platdisponibles WHERE id_juego=$id;";
    $result = mysqli_query($connection, $sql);
    
    $cant = 0;
    $plats=[];
    for($i=0; $i<strlen($plataformas); $i++){
        if($plataformas[$i] == ","){
            array_push($plats, $plataformas[$i-1]);
        }
        if($i == strlen($plataformas)-1){
            array_push($plats, $plataformas[$i]);
        }
    }

    for($i=0; $i<count($plats); $i++){
        //Registrar las plataformas para el juego
        $sql = "INSERT INTO platdisponibles(id_plataforma, id_juego) 
                VALUES($plats[$i], $id)";
        echo $result = mysqli_query($connection, $sql);
    }

    echo $result;
?>

<script text="text/javascript">
    console.log('<?php echo $ruta ?>');
</script>