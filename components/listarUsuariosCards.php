<?php
/**
 * Listado de las consolas en cards de bootstrap
 */


 
    require '../db/Database.php';
    $db = new Database;
    $connection = $db->connect();

    
    $sql = "SELECT * FROM usuarios";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_row($result)) { // por cada fila itera
        $data = $row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8]."||".$row[9]."||".$row[10]."||".$row[11];
        
        //Consulta para las redes sociales
        $consulta = "SELECT * FROM redes WHERE id_usuario = '$row[0]'";
        $resultadoConsulta = mysqli_query($connection, $consulta);

        while ($fila = mysqli_fetch_row($resultadoConsulta)){
            $data = $data."||".$fila[2];
        }

    ?>

    
    <div class="col-xl-3 col-md-6 mb-4" style="margin-right:5%;">
        <div class="card" style="width: 18rem;">
        <!-- Falta poner la imágen  -->
            <img class="card-img-top" src=" <?php echo $row['11'] ?>  " alt="Card image cap"
                 style="height: 40%; width: 40%; margin-left: auto; margin-right: auto; margin-top: auto; margin-bottom: auto; padding-top: 10%;">
            <div class="card-body" style="text-align: center">
                <h5 class="card-title"><?   ?></h5>
                <p class="card-text" style="text-align: center"><strong><?php echo $row['2']." ".$row['3']; ?></strong></p>
            </div>
            <ul class="list-group list-group-flush" style="text-align: center">
                <li class="list-group-item"><?php if ($row['1'] == 1){echo "Administrador";}else{echo "Gamer";} ?> </li>
                <li class="list-group-item"><strong><?php echo "Usuario: ".$row['9']; ?></strong></li>
            </ul>

          

                <div class="card-body" style="text-align: center">
                    <a href="#" class="card-link" data-toggle="modal" data-target="#verUsuarioSeleccionado" onclick="obtenerUsuarioPorId(' <?php echo $row['0'];?> ');" >Ver perfil</a>
                    <a href="#" class="card-link" data-toggle="modal" data-target="#editarUsuarioModal" onclick="cargaDataUsuariosModalUp('<?php echo $data; ?>')" >Editar</a>
                    <a href="#" class="card-link" style="color: #ff253a" data-toggle="modal"
                    data-target="#confirmarEliminacionModal" onclick="">Eliminar</a>

                    <!-- onClick="cargarDatosDeUsuarioSeleccionado(' <?php// echo $datosUsuario['id'];?> ');" -->
                    
                </div>

        </div>
    </div>

   


    <?php
        }
    ?>
