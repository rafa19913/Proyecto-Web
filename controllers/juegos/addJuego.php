<?php
# @uthor adrian_amaya, at 09/04/2020

    // Se reciben los datos desde js/functions.js para agregar una nueva consola
    require '../../db/Database.php';
    $db = new Database;
    $connection = $db -> connect(); # funcion para conectarse a la BD

    $titulo = $_POST['titulo'];

    $type_image = $_POST['type'];
    $archivo = $_POST['tmp_name'];
    $desc = $_POST['descripcion'];
    $plataformas = $_POST['plataformas'];

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

    // Registrar Juego
    $sql = "INSERT INTO juegos(titulo, dir_img, descripcion) 
            VALUES('$titulo', '$ruta', '$desc')";
    $result = mysqli_query($connection, $sql);

    // //Seleccion del registro
    $sql = "SELECT id FROM juegos WHERE titulo='$titulo' AND descripcion='$desc';";
    $resultado = mysqli_query($connection, $sql);

    $fila = mysqli_fetch_row($resultado);  //Fila[0]  = id

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
                VALUES($plats[$i], $fila[0])";
        echo $result = mysqli_query($connection, $sql);
    }

?>

    <script type="text/javascript">
        console.log('<?php echo ($formato);?>');
    </script>
