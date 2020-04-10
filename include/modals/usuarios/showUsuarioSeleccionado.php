<?php

?>

<!-- Modal juegos -->
    <div id="verUsuarioSeleccionado" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <input type="text" id="usuario123">




                <?php

                
                ?>
    


            <div class="modal-header">
                    <h4 class="modal-title">Juegos instalados</h4>
            </div>

            <div class="modal-body">
            <div style="display:flex;">

                <label for="" style="margin-right:37%;">Nombre</label>
                <label for="" style="margin-right:2%;" >Apellidos</label>
            </div>


            <div style="display:flex;">
              <input id="nombreAdd" type="text" class="form-control" placeholder="Nombre..." style="height:40px; width:233px; margin-right:2%;" />
              <input id="apellidosAdd" type="text" class="form-control" placeholder="Apellidos..."  style="height:40px; width:250px; margin-right:2%;" />

            </div>
            <br>

            <label for="">Nombre de usuario:</label>
          <input id="usernameAdd" type="text" class="form-control" placeholder="Nombre de usuario..." />
   
          <br>
          <div style="display:flex;">

            <label for="" style="margin-right:37%;">Fecha de nacimiento</label>
            <label for="" style="margin-right:2%;" >Género</label>


          </div>

          
          <div style="display:flex;">
            <input id="nacimientoAdd" type="date" class="form-control" placeholder="Fecha de nacimiento..." style="height:40px; width:233px; margin-right:2%;" />
            <input id="generoAdd" type="text" class="form-control" placeholder="genero..." list="datalistOptionsGenero"  style="height:40px; width:250px; margin-right:2%;" />

          </div>

      <br>
        <!-- File Button --> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="Upload photo">Subir imágen</label>
          <div class="col-md-4">
            <input id="cargarImagen" name="cargarImagen" class="input-file" type="file">
          </div>
        </div>

          <div style="display:flex;">

            <label for="" style="margin-right:37%;">Teléfono</label>
            <label for="" style="margin-right:2%;" >E-mail</label>


          </div>


            <div style="display:flex;">
            <input id="telefonoAdd" type="number" class="form-control" placeholder="Teléfono..." style="height:40px; width:233px; margin-right:2%;" />
            <input id="emailAdd" type="email" class="form-control" placeholder="E-mail..."  style="height:40px; width:250px; margin-right:2%;" />

          </div>
        <br>
          <label for="">Rol:</label>
          <input id="usernameAdd" type="text" class="form-control" list="datalistOptionsRol" placeholder="Rol..." />
   
  <br>
   
       <label for="">Redes sociales:</label>
        <br>

        <div style="display:flex;" >
        
          <i class="fab fa-facebook"></i>
          <input id="facebookAdd" type="text" class="form-control" placeholder="URL..." />
          
        </div>

        
        <div style="display:flex;" >
        
          <i class="fab fa-youtube"></i>
          <input id="youtubeAdd" type="text" class="form-control" placeholder="URL..." />
          
        </div>

        <div style="display:flex;" >
        
          <i class="fab fa-twitch"></i>
          <input id="twitchAdd" type="text" class="form-control" placeholder="URL..." />
          
        </div>
 
    


          <datalist id="datalistOptionsGenero">
              <option value="Hombre" />
              <option value="Mujer" />
          </datalist>

          <datalist id="datalistOptionsRol">
              <option value="Administrador" />
              <option value="Gamer" />
          </datalist>


        <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="agregarConsolaBtn" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>



            </div>
            </div>
        </div>
    </div>
