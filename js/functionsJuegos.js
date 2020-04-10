plataformasSelec = [];
document.getElementById("titulo").focus();

imagenRegistro = []; //Guarda la informacion de la imagen
seleccionImagen = false; //Para saber si hay imagen seleccionada

function checkPlataforma(id){
    var checkBox = document.getElementById(id);
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

function editarJuegoOpt(id){

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

/**
 * Validaciones para agregar nueva consola (admin)
 */
document.getElementById('agregarJuegoBtn').onclick = () => {
    titulo = document.getElementById('titulo');
    descripcion = document.getElementById('descripcion');

    if(!emptyInput(titulo) || !emptyInput(descripcion) || imagenRegistro == null || plataformasSelec == null)
        return;
    //console.log(titulo.value, descripcion.value, imagen, plataformasSelec);
    addJuego(titulo.value, descripcion.value, imagenRegistro, plataformasSelec);
};

function onFileSelected(event) {
    resetFileSelected();

    var selectedFile = event.target.files[0];
    if(typeof selectedFile == "undefined"){
        return 0;
    }

    seleccionImagen = true;
    var reader = new FileReader();
  
    var imgtag = document.getElementById("myimage");
    imgtag.classList.add("img-thumbnail");
    imgtag.title = selectedFile.name;
    imagenRegistro = selectedFile;

  
    reader.onload = function(event) {
      imgtag.src = event.target.result;
    };
  
    reader.readAsDataURL(selectedFile);
}

function resetFileSelected(){
    var imgtag = document.getElementById("myimage");
    imgtag.classList.remove("img-thumbnail");
    imgtag.src = "";
    imgtag.title = "";
    imagenRegistro = [];
    seleccionImagen=false;
}

/**
 * Se envian los datos a PHP (archivos en controllers/) quien hace las operaciones SQL
 */
function addJuego(titulo, descripcion, imagen, plataformas) {
    titulo = titulo.trim();
    descripcion = descripcion.trim();

    var imgtag = document.getElementById("myimage").getAttribute("src");

    // crear cadena de envio de datos
    cadena = "titulo=" + titulo +
    "&name=" + imagen.name +
    "&type=" + imagen.type +
    "&tmp_name=" + imgtag +
    "&descrpcion=" + descripcion +
    "&plataformas=" + plataformasSelec;

    console.log(imagen.type);

    $.ajax({
        type: "POST",
        url: "controllers/juegos/addJuego.php",
        data: cadena,
        success: function (r) {
            iziToast.success({
                title: 'Bien',
                message: 'Juego agregado correctamente'
            });
            loadListJuegos();
            console.log(r);
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

function editarJuego(){

}