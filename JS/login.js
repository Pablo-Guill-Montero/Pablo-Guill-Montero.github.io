let ruta;

/*function regreso(nombre, fecha, hora, pagina){

    let dialogo = document.createElement('dialog'), //crea elelemento HTML dialogo
                html = '';
            html += '<h3>Buenas ';
            html += nombre;
            html += ' , su última visita fue ';
            html +=  fecha;
            html += ' a las ';
            html += hora;
            html += ' </h3>';
            html += '<button onclick="cerrarDialogo(\'' + pagina + '\')"> Cerrar </button>';

    

            dialogo.innerHTML = html;

            document.body.appendChild(dialogo);//añadir nodo hijo al final
            dialogo.showModal();
}*/

function obtenerSaludoSegunHora(hora) {
    let saludo = '';
    if (hora >= 6 && hora < 12) {
        saludo = 'Buenos días';
    } else if (hora >= 12 && hora < 16) {
        saludo = 'Hola';
    } else if (hora >= 16 && hora < 20) {
        saludo = 'Buenas tardes';
    } else {
        saludo = 'Buenas noches';
    }
    return saludo;
}

function regreso(nombre, fecha, hora, pagina) {
    // Convierte la hora a un número entero
    let horaAux = hora;
    hora = parseInt(hora);

    // Obtiene el saludo según la hora
    let saludo = obtenerSaludoSegunHora(hora);

    // Crea el elemento HTML dialogo
    let dialogo = document.createElement('dialog');

    // Construye el contenido del diálogo
    let contenidoHTML = `
        <h3>${saludo} ${nombre}, su última visita fue ${fecha} a las ${horaAux}</h3>
        <button onclick="cerrarDialogo('${pagina}')">Cerrar</button>`;

    // Establece el contenido del diálogo
    dialogo.innerHTML = contenidoHTML;

    // Añade el diálogo al cuerpo del documento
    document.body.appendChild(dialogo);

    // Muestra el diálogo
    dialogo.showModal();
}

function cerrarDialogo(pagina){
    console.log(pagina);
    document.querySelector('dialog').close();
    document.querySelector('dialog').remove();//eliminarlo
    window.location.href = "./" + pagina + ".php";
}