window.addEventListener('load', init);
function init (){
    const boton = document.getElementById('boton');
    const pwd  = document.getElementById('pwd');
    const nombre = document.getElementById('nombre');

    boton.addEventListener('click', function(){
        validar(pwd.value, nombre.value);
    });
    //boton.addEventListener('click', validar);
}

function validar(pwd, nombre){
    
    var prueba = true;

    if(nombre == null || cadenaEspacios(nombre) ){
        prueba = false;
    }
    if(pwd == null || cadenaEspacios(pwd) ){
        prueba = false;
    }

    if(prueba == false){
        let dialogo = document.createElement('dialog'), //crea elelemento HTML dialogo
                    html = '';
                html += '<h3>Login incorrecto, se debe rellenar el usuario y la contraseña</h3>';
                html += '<button onclick= "cerrarDialogo();">Cerrar</button>';

                dialogo.innerHTML = html;

                document.body.appendChild(dialogo);//añadir nodo hijo al final
                dialogo.showModal();
    }
    else{
        const formulario = document.getElementById("formulario");
        formulario.submit();
    }
}

function cadenaEspacios(texto){
    return texto.trim() === "";
}

function cerrarDialogo(){
    document.querySelector('dialog').close();
    document.querySelector('dialog').remove();//eliminarlo
    //redirigir a login
    location.href = 'login.html';
}