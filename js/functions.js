

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
         * Envio de datos
         */
        let cadena = "id=" + inputId.value +
            "&numero=" + numeroUp.value +
            "&serial=" + serialUp.value.trim().toUpperCase() +
            "&idplataforma=" + idPl.value;
        console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updateConsolas.php",
            data: cadena,
            success: function (r) {
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
        let cadena = "id=" + inputId.value +
            "&nombre=" + numeroUp.value +
            "&cobro=" + serialUp.value.trim().toUpperCase() +
            "&fecha_lanzamiento=" + idPl.value;
        console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updateTarifa.php",
            data: cadena,
            success: function (r) {
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

function cargaDataTarifaModalUp(data) {
    let dataConsola = data.split('||');
    document.getElementById('idPlataforma').value = dataConsola[0]; // id de la consola
    document.getElementById('fecha_lanzamiento').value = dataConsola[3]; // llave foranea a plataforma
    document.getElementById('nombre').value = dataConsola[1];
    document.getElementById('cobro').value = dataConsola[2];
}


function loadListPromocion1() {
     console.log("alert1");
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
            "&por_compra=" + serialUp.value.trim().toUpperCase() +
            "&cantidad_objetivo=" + idPl.value;
        console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updatePromocion.php",
            data: cadena,
            success: function (r) {
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

function updatePromocion2(){

        let inputId = document.getElementById('id');
        let numeroUp = document.getElementById('invitados');
        let serialUp = document.getElementById('monedas');
        //let idPl = document.getElementById('cantidad_objetivo');

         /** ////////////////////////////////////////////////////////////////
         * Envio de datos
         */
        let cadena = "id=" + inputId.value +
            "&por_hora=" + numeroUp.value +
            "&por_compra=" + serialUp.value.trim().toUpperCase() +
            "&cantidad_objetivo=" + idPl.value;
        console.log(cadena);
        $.ajax({
            type: "POST",
            url: "controllers/updatePromocion.php",
            data: cadena,
            success: function (r) {
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

function cargaDataPromocionModal2Up(data) {
    let dataConsola = data.split('||');
    document.getElementById('id').value = dataConsola[0]; // id de la consola
    //document.getElementById('cantidad_objetivo').value = dataConsola[3]; // llave foranea a plataforma
    document.getElementById('invitados').value = dataConsola[1];
    document.getElementById('monedas').value = dataConsola[2];
}

