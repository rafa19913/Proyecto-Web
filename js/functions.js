

function convertToNumber(str){
    let n = 0;
    try{
        n = parseFloat(str);
    }catch(e){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        });
        console.log("ERROR: No se pudo convertir " + e + " a numero. [convertToNumber() js/functions.js]");
        return -1;
    }
    return n;
}


/**
 * Validaciones para agregar nuevo usuario (admin)
 */
document.getElementById('agregarUsuarioBtn').onclick = () => {
    nombre = document.getElementById('nombreAdd');
    apellidos = document.getElementById('apellidosAdd');
    fechaNac = document.getElementById('nacimientoAdd');
    genero = document.getElementById('generoAdd');
    telefono = document.getElementById('telefonoAdd');
    email = document.getElementById('emailAdd');
    username = document.getElementById('usernameAdd');
    rol = document.getElementById('rolAdd');
    monedas = document.getElementById('monedasAdd');
    password = document.getElementById('passwordAdd');
    passConfirm = document.getElementById('confirmAdd');
    imagen = document.getElementById('imagenAdd');
  
    fb = document.getElementById('facebookAdd');
    yt = document.getElementById('youtubeAdd');
    tw = document.getElementById('twitchAdd');


    //Validaciones
   if (password.value != passConfirm.value){
       alert ("Las contraseñas no coinciden");
       return;
   }
   

   if(!emptyInput(nombre) || !emptyInput(apellidos) || !emptyInput(email) || !emptyInput(monedas) || !emptyInput(password) || !emptyInput(rol) )
       return;
   
   // console.log(rol.value, nombre.value, apellidos.value, fechaNac.value, genero.value, telefono.value, email.value, monedas, username.value, password.value, imagen.value, fb.value, yt.value, tw.value);
   monedas = convertToNumber(monedas.value);

   addUsuario(rol.value, nombre.value, apellidos.value, fechaNac.value, genero.value, telefono.value, email.value, monedas, username.value, password.value, imagen.value, fb.value, yt.value, tw.value);

};

/**
* Se envian los datos a PHP (archivos en controllers/) quien hace las operaciones SQL
*/
function addUsuario(rol, nombre, apellidos, fechaNac, genero, telefono, email, monedas, username, password, imagen, fb, yt, tw) {
   rol = rol.trim();
   nombre = nombre.trim();
   apellidos = apellidos.trim();
   fechaNac = fechaNac.trim();
   genero = genero.trim();
   telefono = telefono.trim();
   email = email.trim();
   username = username.trim();
   password = password.trim();
   imagen.trim();
   fb.trim();
   yt.trim();
   tw.trim();

   // crear cadena de envio de datos
   cadena = "rol=" + rol +
       "&nombre=" + nombre +
       "&apellidos=" + apellidos +
       "&fechaNac=" + fechaNac +
       "&genero=" + genero +
       "&telefono=" + telefono + 
       "&email=" + email +
       "&monedas=" + monedas +
       "&username=" + username +
       "&password=" + password + 
       "&imagen=" + imagen +
       "&fb=" + fb +
       "&yt=" + yt +
       "&tw=" + tw;

   $.ajax({
       type: "POST",
       url: "controllers/addUsuario.php",
       data: cadena,
       success: function (r) {
           console.log(r);
           loadListUsuarios();
           iziToast.success({
               title: 'Bien',
               message: 'Usuario agregado correctamente'
           });
       },
       error: function () {
           iziToast.error({
               title: 'Error',
               message: 'Hubo un problema al agregar el usuario'
           });
       }
   });
}


/**
 * Cargar lista de usuarios desde desde components/listarUsuariosCards.php
 */
function loadListUsuarios() {
    div = document.getElementById('listadoUsuarios');
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
        div.innerHTML = this.response;
    };

    xhr.open('GET', 'components/listarUsuariosCards.php', true);
    xhr.send();
}


/**
 * Carga los datos del listado usuarios al modal updateUsuario
 * @param data 
 */
function cargaDataUsuariosModalUp(data){
    let dataUsuario = data.split('||');
    //REDES SOCIALES
    // alert(dataUsuario[12]);
    // alert(dataUsuario[13]);
    // alert(dataUsuario[14]);
    tipo = dataUsuario[1]; // Rol (1=Admin 2=Gamer)
    cargarTipoDeUsuario(tipo);
    cargarDatosDelUsuario(dataUsuario);
    cargarRedesSociales(dataUsuario);
}

function cargarRedesSociales(dataUsuario){
    //Facebook
    if (dataUsuario[12] != null){
        document.getElementById('facebookAddUp').value = dataUsuario[12]; 
    }else{
        document.getElementById('facebookAddUp').value = ""
    }
    //YouTube
    if (dataUsuario[13] != null){
        document.getElementById('youtubeAddUp').value = dataUsuario[13]; 
    }else{
        document.getElementById('youtubeAddUp').value = ""
    }
    //Twitch
    if (dataUsuario[14] != null){
        document.getElementById('twitchAddUp').value = dataUsuario[14]; 
    }else{
        document.getElementById('twitchAddUp').value = ""
    }
    
}

/**
 * Se cargan los datos básicos del usaurio (nombre, apellido, username...)
 * @param {*} dataUsuario (datos del usuario)
 */
function cargarDatosDelUsuario(dataUsuario){
    document.getElementById('nombreAddUp').value = dataUsuario[2]; 
    document.getElementById('apellidosAddUp').value = dataUsuario[3];
    document.getElementById('nacimientoAddUp').value = dataUsuario[4];  
    document.getElementById('generoAddUp').value = dataUsuario[5]; 
    document.getElementById('telefonoAddUp').value = dataUsuario[6]; 
    document.getElementById('emailAddUp').value = dataUsuario[7]; 
    document.getElementById('monedasAddUp').value = dataUsuario[8]; 
    document.getElementById('usernameAddUp').value = dataUsuario[9]; 
    document.getElementById('passwordAddUp').value = dataUsuario[10]; 
    document.getElementById('confirmAddUp').value = dataUsuario[10]; 
}

/**
 * Se carga si es admin o gamer (1=admin 2=gamer)
 * @param {1 o 2} numero 
 */
function cargarTipoDeUsuario(numero){
    if (numero == 1){
        document.getElementById('rolAddUp').value = "Administrador"; 
    }else{
        document.getElementById('rolAddUp').value = "Gamer";
    }
}




/**
 * falso si es nulo o vacio.
 */
function emptyInput(input) {
    if(input == null){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        });
        return false;
    }
    if (input.value.length === 0) {
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        });
        return false;
    }
    if(input.value === ''){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        });
        return false;
    }
    return true;
}

/**
 * Recolecta los inputs para agregar nueva consola (admin)
 */
document.getElementById('agregarConsolaBtn').onclick = () => {
    plataformaId = document.getElementById('plataformaAdd');
    numero = document.getElementById('numeroAdd');
    serial = document.getElementById('serialAdd');
    if(!emptyInput(plataformaId) || !emptyInput(numero) || !emptyInput(serial) ){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        });
        return;
    }
    if(plataformaId.value === "Selecciona..."){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        });
        return;
    }
    num = convertToNumber(numero.value);
    platId = convertToNumber(plataformaId.value);
    if (num === -1 || plataformaId === -1){
        return;
    }if (isNaN(num)){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        });
        return;
    }


    addConsola(platId, num, serial.value);
};

/**
 * Se envian los datos a PHP (archivos en controllers/) quien hace las operaciones SQL
 */
function addConsola(plataformaId, numero, serial) {
    serial = serial.trim();
    serial = serial.toUpperCase();
    console.log("Plataforma ID = ", plataformaId);
    // crear cadena de envio de datos
    cadena = "plataforma=" + plataformaId +
        "&numero=" + numero +
        "&serial=" + serial;
    //console.log(cadena);
    $.ajax({
        type: "POST",
        url: "controllers/addConsola.php",
        data: cadena,
        success: function (r) {
            loadListConsolas();
            iziToast.success({
                title: 'Bien',
                message: 'Consola agregada correctamente'
            });
        },
        error: function () {
            iziToast.error({
                title: 'Error',
                message: 'Hubo un problema al agregar consola'
            });
        }
    });
}


/**
 * Cargar lista de consolas desde desde components/listarConsolasCards.php
 */
function loadListConsolas() {
     div = document.getElementById('listadoConsolas');
     var xhr = new XMLHttpRequest();

     xhr.onload = function () {
         div.innerHTML = this.response;
     };

     xhr.open('GET', 'components/listarConsolasCards.php', true);
     xhr.send();
}

/**
 * Borrar consola
 */
function deleteConsola(id) {
    // cuando presione confirme en el modal include/modals/consola/confirmDeleteConsola.php
    document.getElementById('eliminarBtn').onclick = () => {

        cadena = "id=" + id;
        $.ajax({
            type: "POST",
            url: "controllers/deleteConsola.php",
            data: cadena,
            success: function (r) {
                loadListConsolas();
                iziToast.success({
                    title: 'Bien',
                    message: 'Consola eliminada correctamente'
                });
            },
            error: function () {
                iziToast.error({
                    title: 'Error',
                    message: 'Hubo un problema al eliminar la consola'
                });
            }
        });
    }
}

/**
 * Carga los datos del listado consolas al modal "updateConsola".
 * @param data
 */
function cargaDataConsolaModalUp(data) {
    let dataConsola = data.split('||');
    document.getElementById('idUpConsola').value = dataConsola[0]; // id de la consola
    document.getElementById('plataformaNameUpConsola').value = dataConsola[3]; // llave foranea a plataforma
    document.getElementById('numeroUp').value = dataConsola[1];
    document.getElementById('serialUp').value = dataConsola[2];
}


/**
 * Acutalizar consola
 */
function updateConsola(){

        let inputId = document.getElementById('idUpConsola');
        let numeroUp = document.getElementById('numeroUp');
        let serialUp = document.getElementById('serialUp');
        let idPl = document.getElementById('plataformaNameUpConsola');

        /** ////////////////////////////////////////////////////////////////
         * Validaciones
         */
        if(!emptyInput(inputId) || !emptyInput(numeroUp) || !emptyInput(serialUp) || !emptyInput(idPl)){
            iziToast.error({
                title: 'Error',
                message: 'Existen campos incorrectos'
            });
            return;
        }
        if(idPl.value === "Selecciona..."){
            iziToast.error({
                title: 'Error',
                message: 'Existen campos incorrectos'
            });
            return;
        }

        let num = convertToNumber(numeroUp.value.trim());
        let platId = convertToNumber(idPl.value.trim());
        let idCon = convertToNumber(inputId.value.trim());
        if (num === -1 || platId === -1 || idCon === -1) {
            return;
        }if (isNaN(num) || isNaN(platId) || isNaN(idCon)){
            iziToast.error({
                title: 'Error',
                message: 'Existen campos incorrectos'
            });
            return;
        }


         /** ////////////////////////////////////////////////////////////////
         * Envio de datos
         */
        let cadena = "id=" + idCon +
            "&numero=" + num +
            "&serial=" + serialUp.value.trim().toUpperCase() +
            "&idplataforma=" + platId;
        console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updateConsola.php",
            data: cadena,
            success: function (r) {
                console.log(r);
                loadListConsolas();
                iziToast.success({
                    title: 'Bien',
                    message: 'Consola actualizada correctamente'
                });
            },
            error: function () {
                iziToast.error({
                    title: 'Error',
                    message: 'Hubo un problema al editar la consola'
                });
            }
        });
}



function loadListPlataformas() {
     div = document.getElementById('listadoPlataformas');
     var xhr = new XMLHttpRequest();

     xhr.onload = function () {
         div.innerHTML = this.response;
     };

     xhr.open('GET', 'components/listarPlataformas.php', true);
     xhr.send();

 }


function updateTarifa(){

        let inputId = document.getElementById('idPlataforma');
        let numeroUp = document.getElementById('nombre');
        let serialUp = document.getElementById('cobro');
        let idPl = document.getElementById('fecha_lanzamiento');

         /** ////////////////////////////////////////////////////////////////
         * Envio de datos
         */
         
        let cadena = "idPlataforma=" + inputId.value +
            "&nombre=" + numeroUp.value +
            "&cobro=" + serialUp.value.trim().toUpperCase() +
            "&fecha_lanzamiento=" + idPl.value;
        //console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updateTarifa.php",
            data: cadena,
            success: function (r) {
                loadListPlataformas();
                iziToast.success({
                    title: 'Bien',
                    message: 'Consola actualizada correctamente'
                });
            },
            error: function () {
                iziToast.error({
                    title: 'Error',
                    message: 'Hubo un problema al editar la consola'
                });
            }
        });

}

function cargaDataTarifaModalUp(data) {
    let dataConsola = data.split('||');
    document.getElementById('idPlataforma').value = dataConsola[0]; // id de la consola
    document.getElementById('fecha_lanzamiento').value = dataConsola[3]; // llave foranea a plataforma
    document.getElementById('nombre').value = dataConsola[1];
    document.getElementById('cobro').value = dataConsola[2];
}


function loadListPromocion1() {
     //console.log("alert1");
    //PROMOCION 1
     div = document.getElementById('listadoPromocion1');
     var xhr = new XMLHttpRequest();

     xhr.onload = function () {
         div.innerHTML = this.response;
     };

     xhr.open('GET', 'components/listarPromociones.php', true);
     xhr.send();     
}


function cargaDataPromocionModal1Up(data) {
    let dataConsola = data.split('||');
    document.getElementById('id').value = dataConsola[0]; // id de la consola
    document.getElementById('cantidad_objetivo').value = dataConsola[3]; // llave foranea a plataforma
    document.getElementById('por_hora').value = dataConsola[1];
    document.getElementById('por_compra').value = dataConsola[2];
}


function updatePromocion1(){

        let inputId = document.getElementById('id');
        let numeroUp = document.getElementById('por_hora');
        let serialUp = document.getElementById('por_compra');
        let idPl = document.getElementById('cantidad_objetivo');

         /** ////////////////////////////////////////////////////////////////
         * Envio de datos
         */
         
        let cadena = "id=" + inputId.value +
            "&por_hora=" + numeroUp.value +
            "&por_compra=" + serialUp.value+
            "&cantidad_objetivo=" + idPl.value;
        //console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updatePromocion1.php",
            data: cadena,
            success: function (r) {
            //    console.log("PRUEBA"+r);
                loadListPromocion1();
                iziToast.success({
                    title: 'Bien',
                    message: 'Consola actualizada correctamente'
                });
            },
            error: function () {
                iziToast.error({
                    title: 'Error',
                    message: 'Hubo un problema al editar la consola'
                });
            }
        });


}

function updatePromocion2(){
        let inputId = document.getElementById('id');
        let numeroUp = document.getElementById('invitados');
        let serialUp = document.getElementById('monedas');
        //let idPl = document.getElementById('cantidad_objetivo');

         /** ////////////////////////////////////////////////////////////////
         * Envio de datos
         */
        let cadena = "id=" + inputId.value +
            "&invitados=" + numeroUp.value +
            "&monedas=" + serialUp.value ;
        //console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updatePromocion2.php",
            data: cadena,
            success: function (r) {
                
                loadListPromocion1();
                iziToast.success({
                    title: 'Bien',
                    message: 'Consola actualizada correctamente'
                });
            },
            error: function () {
                iziToast.error({
                    title: 'Error',
                    message: 'Hubo un problema al editar la consola'
                });
            }
        });

}

function cargaDataPromocionModal2Up(data) {
    let dataConsola = data.split('||');
    document.getElementById('id').value = dataConsola[0]; // id de la consola
    //document.getElementById('cantidad_objetivo').value = dataConsola[3]; // llave foranea a plataforma
    document.getElementById('invitados').value = dataConsola[1];
    document.getElementById('monedas').value = dataConsola[2];
}




