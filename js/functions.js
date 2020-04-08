

function convertToNumber(str){
    let n = 0;
    try{
        n = parseFloat(str);
    }catch(e){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        })
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
        })
        return false;
    }
    if (input.value.length == 0) {
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        })
        return false;
    }
    if(input.value == ''){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        })
        return false;
    }
    return true;
}

/**
 * Validaciones para agregar nueva consola (admin)
 */
document.getElementById('agregarConsolaBtn').onclick = () => {
    plataformaId = document.getElementById('plataformaAdd');
    numero = document.getElementById('numeroAdd');
    serial = document.getElementById('serialAdd');
    //console.log(plataforma.value, numero.value, cobro, serial.value);
    addConsola(plataformaId.value, numero.value, serial.value);
};

/**
 * Se envian los datos a PHP (archivos en controllers/) quien hace las operaciones SQL
 */
function addConsola(plataformaId, numero, serial) {
    plataformaId = plataformaId.trim();
    serial.trim();
    serial = serial.toUpperCase();

    // crear cadena de envio de datos
    cadena = "plataforma=" + plataformaId +
        "&numero=" + numero +
        "&serial=" + serial;

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
 * Actualizar consola.
 * @param data: Cadena de datos de la consola divididos por ||.
 */
function updateConsola(data){
    dataConsola = data.split('||');


}