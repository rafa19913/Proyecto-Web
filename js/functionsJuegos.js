plataformasSelec = [];
document.getElementById("titulo0").focus();

imagenRegistro = []; //Guarda la informacion de la imagen
seleccionImagen = false; //Para saber si hay imagen seleccionada

function checkPlataforma(id, tipo){
    var checkBox = document.getElementById(id.toString() + "_" + tipo.toString());
    if (checkBox.checked == true){
        let bandera = false;
        for(let i=0; i<plataformasSelec.length; i++){
            if(plataformasSelec[i] == id){
                bandera = true;
                break;
            }
        }
        if(bandera == false){
            plataformasSelec.push(id);
            // console.log('Activado' + id);
        }
    } else {
        for(let i=0; i<plataformasSelec.length; i++){
            if(plataformasSelec[i] == id){
                plataformasSelec.splice(i, 1);
                // console.log('Desactivado' + id);
                break;
            }
        }
    }
    // console.log(plataformasSelec);
}

function editar(id){
    console.log(id);
}

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

function emptyArray(inputArray){
    if(inputArray.length == 0){
        iziToast.error({
            title: 'Error',
            message: 'Existen campos incorrectos'
        })
        return false;
    }
    return true;
}

/**
 * Validaciones para agregar nueva juego (admin)
 */
document.getElementById('agregarJuegoBtn').onclick = () => {
    titulo = document.getElementById('titulo0');
    descripcion = document.getElementById('descripcion0');

    if(!emptyInput(titulo) || !emptyInput(descripcion) || !emptyArray(imagenRegistro) || !emptyArray(plataformasSelec))
        return;
    //console.log(titulo.value, descripcion.value, imagen, plataformasSelec);
    addJuego(titulo.value, descripcion.value, imagenRegistro, plataformasSelec);
};

/**
 * Validaciones para agregar nueva juego (admin)
 */
document.getElementById('editarBtn').onclick = () => {
    titulo = document.getElementById('titulo1');
    descripcion = document.getElementById('descripcion1');

    if(!emptyInput(titulo) || !emptyInput(descripcion) || !emptyArray(plataformasSelec)){
        return;
    }
    // console.log(titulo.value, descripcion.value, plataformasSelec);
    updateJuego(titulo.value, descripcion.value, imagenRegistro, plataformasSelec);
};

/**
 * Validaciones para eliminar un juego (admin)
 */
document.getElementById('deleteJuegoBtn').onclick = () => {
    id = document.getElementById("idJuego").value;
    deleteJuego(id);
};

//Funciones de seleccion de imagenes
function onFileSelected(event, tipo) {
    resetFileSelected(tipo);

    var selectedFile = event.target.files[0];
    if(typeof selectedFile == "undefined"){
        return 0;
    }

    seleccionImagen = true;
    var reader = new FileReader();
  
    var imgtag = document.getElementById("myimage" + tipo.toString());
    imgtag.classList.add("img-thumbnail");
    imgtag.title = selectedFile.name;
    imagenRegistro = selectedFile;
  
    reader.onload = function(event) {
      imgtag.src = event.target.result;
    };
  
    reader.readAsDataURL(selectedFile);
}

function resetFileSelected(tipo){
    var imgtag = document.getElementById("myimage" + tipo.toString());
    imgtag.classList.remove("img-thumbnail");
    imgtag.src = "";
    imgtag.title = "";
    imgtag.value = "";
    imgtag.name = "";
    imagenRegistro = [];
    seleccionImagen=false;
}

/**
 * Se envian los datos a PHP (archivos en controllers/) quien hace las operaciones SQL
 */
function addJuego(titulo, descripcion, imagen, plataformas) {
    titulo = titulo.trim();
    descripcion = descripcion.trim();

    var imgtag = document.getElementById("myimage0").getAttribute("src");

    // crear cadena de envio de datos
    cadena = "titulo=" + titulo +
    "&name=" + imagen.name +
    "&type=" + imagen.type +
    "&tmp_name=" + imgtag +
    "&descripcion=" + descripcion +
    "&plataformas=" + plataformasSelec;

    $.ajax({
        type: "POST",
        url: "controllers/juegos/addJuego.php",
        data: cadena,
        success: function (r) {
            iziToast.success({
                title: 'Bien',
                message: 'Juego agregado correctamente'
            });
            cancelar(0);
            loadListJuegos();
        },
        error: function () {
            iziToast.error({
                title: 'Error',
                message: 'Hubo un problema al agregar el juego'
            });
        }
    });
}

/**
 * Se envian los datos a PHP (archivos en controllers/) quien hace las operaciones SQL
 */
function updateJuego(titulo, descripcion, imagen, plataformas) {
    titulo = titulo.trim();
    descripcion = descripcion.trim();

    var cadena = "id=" + document.getElementById("idJuego").value + 
        "&titulo=" + titulo + "&descripcion=" + descripcion;

    var imgtag = document.getElementById("myimage1");

    if(imagen.length == 0){ //Imagen por defecto
        cadena = cadena + "&src=" + imgtag.value;
    }else{
        cadena = cadena + "&src=" + "nada";
        cadena = cadena + "&name=" + imagen.name +
            "&type=" + imagen.type +
            "&tmp_name=" + imgtag.getAttribute("src");
    }

    cadena = cadena + "&plataformas=" + plataformas;

    $.ajax({
        type: "POST",
        url: "controllers/juegos/updateJuego.php",
        data: cadena,
        success: function (r) {
            loadListJuegos();
            iziToast.success({
                title: 'Bien',
                message: 'Juego editado correctamente'
            });
            loadListJuegos();
            console.log(r);
            document.getElementById("imagen1").value = "";
            document.getElementById("myimage1").value = "";
            document.getElementById("myimage1").src = "";
        },
        error: function () {
            iziToast.error({
                title: 'Error',
                message: 'Hubo un problema al agregar el juego'
            });
            console.log(r);
        }
    });
}

/**
 * Se envian los datos a PHP (archivos en controllers/) quien hace las operaciones SQL
 */
function deleteJuego(id) {
    var cadena = "id=" + id;

    $.ajax({
        type: "POST",
        url: "controllers/juegos/deleteJuego.php",
        data: cadena,
        success: function (r) {
            iziToast.success({
                title: 'Bien',
                message: 'Juego fue eliminado correctamente'
            });
            loadListJuegos();
            console.log(r);
        },
        error: function () {
            iziToast.error({
                title: 'Error',
                message: 'Hubo un problema al eliminar el juego'
            });
            console.log(r);
        }
    });
}


function eliminarJuego(id){
    id_juego = document.getElementById('idJuego'); // id del juego
    id_juego.value = id;
}


/**
 * Cargar lista de juegos desde include/modals/juegos/mostrarJuegos.php
 */
function loadListJuegos() {
    div = document.getElementById('listadoJuegos');
    var xhr = new XMLHttpRequest();

    xhr.onload = function () {
        div.innerHTML = this.response;
    };

    xhr.open('GET', 'include/modals/juegos/mostrarJuegos.php', true);
    xhr.send();
}

function editarJuego(data, data2){ 
    let dataJuegos = data.split('||');
    document.getElementById("myimage1").title = "";
    var nombre = "";
    contar = 0;
    for(var i=0; i<dataJuegos[2].length; i++){
        if(contar == 4){
            nombre = nombre + dataJuegos[2][i];
        }

        if(dataJuegos[2][i] == "/"){
            contar++;
        }
    }

    document.getElementById('idJuego').value = dataJuegos[0]; // id del juego
    document.getElementById('titulo1').value = dataJuegos[1]; // titulo del juego
    document.getElementById('descripcion1').value = dataJuegos[3]; //descripcion del juego
    var imgtag = document.getElementById("myimage1");
    imgtag.src = dataJuegos[2];
    imgtag.value = dataJuegos[2];
    imgtag.title = nombre;
    
    let dataConsolas = data2.split('||');
    
    plataformasSelec=[];
    for(var i=0; i<dataConsolas.length - 1; i++){
        var checkBox = document.getElementById(dataConsolas[i]+"_1");
        plataformasSelec.push(dataConsolas[i]);
        checkBox.checked = true;
    }
}

function cancelar(tipo, cantidades){
    document.getElementById('titulo' + tipo).value = "";
    document.getElementById('descripcion' + tipo).value = "";
    document.getElementById("imagen" + tipo).value = "";
    document.getElementById("imagen" + tipo).value = "";
    document.getElementById("imagen" + tipo).src = "";
    document.getElementById("myimage1").value = "";
    document.getElementById("myimage1").src = "";
    document.getElementById("myimage1").title = "";

    for(var i=0; i<cantidades; i++){
        if(document.getElementById(plataformasSelec[i]+"_" + tipo)){
            document.getElementById(plataformasSelec[i]+"_" + tipo).checked = false;
        }
    }
    plataformasSelec = [];
}