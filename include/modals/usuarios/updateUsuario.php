

<!-- Modal para agregar nuevo usuario editar usuario modal -->

<?php

?>


<div class="modal fade right" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <div class="modal-dialog modal-full-height" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Actualizar usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <input type="text" id="idUsuarioUp">

      <!-- <input id="nombreAddUpUp" type="text" class="form-control" placeholder="Nombre..." style="height:40px; width:465px;" /> -->


            <div style="display:flex;">

              <label for="" style="margin-right:37%;">Nombre</label>
              <label for="" style="margin-right:2%;" >Apellidos</label>
          
            </div>
            

            <div style="display:flex;">
              <input id="nombreAddUp" type="text" class="form-control" placeholder="Nombre..." style="height:40px; width:233px; margin-right:2%;" />
              <input id="apellidosAddUp" type="text" class="form-control" placeholder="Apellidos..."  style="height:40px; width:250px; margin-right:2%;" />

            </div>
            <br>
   
            <label for="">Nombre de usuario:</label>
          <input id="usernameAddUp" type="text" class="form-control" placeholder="Nombre de usuario..." />
   
          <br>


          <label for="">Password:</label>
          <input id="passwordAddUp" type="password" class="form-control" placeholder="Password..." />
   
          <br>
          
          <label for="">Confirmar password:</label>
          <input id="confirmAddUp" type="password" class="form-control" placeholder="Confirmar password..." />
   
          <br>

          <label for="">Monedas:</label>
          <input id="monedasAddUp" type="number" class="form-control" placeholder="Monedas..." />
   
        <br>
          <div style="display:flex;">

            <label for="" style="margin-right:37%;">Fecha de nacimiento</label>
            <label for="" style="margin-right:2%;" >Género</label>


          </div>


            <div style="display:flex;">
            <input id="nacimientoAddUp" type="date" class="form-control" placeholder="Fecha de nacimiento..." style="height:40px; width:233px; margin-right:2%;" />
            <input id="generoAddUp" type="text" class="form-control" placeholder="genero..." list="datalistOptionsGenero"  style="height:40px; width:250px; margin-right:2%;" />

          </div>

      <br>
        <!-- File Button --> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="Upload photo">Subir imágen</label>
          <div class="col-md-4">
            <input id="imagenAddUp" class="input-file" type="file">
          </div>
        </div>

          <div style="display:flex;">

            <label for="" style="margin-right:37%;">Teléfono</label>
            <label for="" style="margin-right:2%;" >E-mail</label>


          </div>


            <div style="display:flex;">
            <input id="telefonoAddUp" type="number" class="form-control" placeholder="Teléfono..." style="height:40px; width:233px; margin-right:2%;" />
            <input id="emailAddUp" type="email" class="form-control" placeholder="E-mail..."  style="height:40px; width:250px; margin-right:2%;" />

          </div>
        <br>
          <label for="">Rol:</label>
          <input id="rolAddUp" type="text" class="form-control" list="datalistOptionsRol" placeholder="Rol..." />
   
  <br>
   
       <label for="">Redes sociales:</label>
        <br>

        <div style="display:flex;" >
        
          <i class="fab fa-facebook"></i>
          <input id="facebookAddUp" type="text" class="form-control" placeholder="URL..." />
          
        </div>

        
        <div style="display:flex;" >
        
          <i class="fab fa-youtube"></i>
          <input id="youtubeAddUp" type="text" class="form-control" placeholder="URL..." />
          
        </div>

        <div style="display:flex;" >
        
          <i class="fab fa-twitch"></i>
          <input id="twitchAddUp" type="text" class="form-control" placeholder="URL..." />
          
        </div>
 
    


          <datalist id="datalistOptionsGenero">
              <option value="Hombre" />
              <option value="Mujer" />
          </datalist>

          <datalist id="datalistOptionsRol">
              <option value="Administrador" />
              <option value="Gamer" />
          </datalist>


          
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="agregarUsuarioBtn" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
      </div>

      </div>
    </div>
  </div>


<!-- Full Height Modal Right -->