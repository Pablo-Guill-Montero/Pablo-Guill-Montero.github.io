function cargarFoto(btn){

    let art = btn.parentElement.parentElement;
    art.querySelector('input[type = "file"]').click();
}

function eliminarFoto(btn) {
    let inp = btn.parentElement.parentElement.querySelector('input[type=file]');
    inp.value = ''; // establece el valor del input en una cadena vacía
    document.getElementById("fotoUsuario").textContent = "";

    let img = btn.parentElement.parentElement.querySelector('img');
    img.src = './imgenes/vacia.jpg';
}

function mostrarFoto(input) {
    if (input.files && input.files[0]) {
        if (!input.files[0].type.match(/image./)) {
            alert("El archivo seleccionado no es una imagen.");
            return;
        }

        document.getElementById("fotoUsuario").textContent = "";
        let img = input.parentElement.querySelector('img');

        // Añade el prefijo "./imgenes" a la ruta de la imagen
        img.src = "./imgenes/" + input.files[0].name; // Aquí asumo que input.files[0].name contiene el nombre de la imagen

        // También podrías usar URL.createObjectURL si prefieres:
        // img.src = URL.createObjectURL(input.files[0]);
    }
}
