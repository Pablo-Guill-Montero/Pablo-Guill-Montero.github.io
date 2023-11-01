window.addEventListener('load', init);
function init (){
    const boton = document.getElementById('boton');
    const pwd  = document.getElementById('pwd');
    const pwd2  = document.getElementById('pwd2');
    const email  = document.getElementById('email');
    const sexo  = document.getElementById('sexo');
    const nombre = document.getElementById('nombre');

    boton.addEventListener('click', function(){
        validar(pwd.value, nombre.value, pwd2.value, email.value, sexo.value);
    });
    //boton.addEventListener('click', validar);
}

function validar(pwd, nombre, pw2, email, sexo){
    
    var prueba = true;

    if(nombre == null || cadenaEspacios(nombre) || nombre.length < 3 || nombre.length > 12 || noEmpiezNumero(nombre) || aceptadasIngles(nombre) ){
        prueba = false;

        let dialogo = document.createElement('dialog'), //crea elelemento HTML dialogo
                    html = '';
                html += '<h3>El formato del nombre es incorrecto</h3>';
                html += '<button onclick= "cerrarDialogo();">Cerrar</button>';

                dialogo.innerHTML = html;

                document.body.appendChild(dialogo);//añadir nodo hijo al final
                dialogo.showModal();
        
    }
    else if(pwd == null || cadenaEspacios(pwd) || pwd.length < 6 || pwd.length > 15 || aceptadasInglesCon(pwd) || tieneMaysMinus(pwd) ){
        prueba = false;

        let dialogo = document.createElement('dialog'), //crea elelemento HTML dialogo
                    html = '';
                html += '<h3>El formato de la contraseña es incorrecto</h3>';
                html += '<button onclick= "cerrarDialogo();">Cerrar</button>';

                dialogo.innerHTML = html;

                document.body.appendChild(dialogo);//añadir nodo hijo al final
                dialogo.showModal();
        
    }
    else if(pw2 != pwd){
        prueba = false;
    }
    else if(email == null || emailCorrecto(email) || email.length > 254){ //hacer un par de puevas  más
        prueba = false;
        
        let dialogo = document.createElement('dialog'), //crea elelemento HTML dialogo
                    html = '';
                html += '<h3>El formato del emai es incorrecto</h3>';
                html += '<button onclick= "cerrarDialogo();">Cerrar</button>';

                dialogo.innerHTML = html;

                document.body.appendChild(dialogo);//añadir nodo hijo al final
                dialogo.showModal();
    }
    else if(sexo == null || cadenaEspacios(nombre)){ //hacer un par de puevas  más
        prueba = false;
        
        let dialogo = document.createElement('dialog'), //crea elelemento HTML dialogo
                    html = '';
                html += '<h3>se debe de elegir un genero</h3>';
                html += '<button onclick= "cerrarDialogo();">Cerrar</button>';

                dialogo.innerHTML = html;

                document.body.appendChild(dialogo);//añadir nodo hijo al final
                dialogo.showModal();
    }

    if(prueba){
        const formulario = document.getElementById("formulario");
        formulario.submit();
    }

    






    /*if(prueba == false){
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
    }*/
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

function noEmpiezNumero(texto){
    const patron = /^\d/; // Expresión regular que verifica si la cadena comienza con un número.
    return patron.test(texto);
}

function aceptadasIngles(texto){ //Tal y como esta no acepta espacios
    var aux = /^[a-zA-Z0-9]+$/.test(texto)
    return !aux;
}
function aceptadasInglesCon(texto){ //Tal y como esta no acepta espacios
    var aux = /^[a-zA-Z0-9-_]+$/.test(texto)
    return !aux;
}

function tieneMaysMinus(texto){
    const caracteres = [];
  for (let i = 0; i < texto.length; i++) { //rellenar el array de caracteres
    caracteres.push(texto.charAt(i));
  }
  var mays = false;
  var minus = false;
  var prueba = true;

  for(let i = 0; i < caracteres.length; i++){
    if(caracteres[i]==caracteres[i].toUpperCase()){
        mays = true;
    }
    if(caracteres[i]==caracteres[i].toLowerCase()){
        minus = true;
    }
  }
  if(mays && minus){
    prueba = false;
  }

  return prueba;
}

function emailCorrecto(texto){
    prueba = false;
    if(texto.indexOf("@") !== -1){ //indexOf busca el @ y devuelve su posición, si no lo encuentra devuelve -1
        const partes = texto.split('@');

        if(partes[0].length < 1 || partes[0]> 64){
            console.log("p1");
            prueba = true;
        }
        if(partes[1].length < 1 || partes[1]> 255){
            console.log("p2");
            prueba = true;
        }
        if(pruebaLocal1(partes[0]) || pruebaLocal2(partes[0])){
            console.log("p3");
            prueba = true;
        }
        if( pruebaDominio1(partes[1]) || pruebaDominio2(partes[1]) || pruebaDominio3(partes[1])){
            console.log("p4");
            prueba = true;
        }
        const sub = partes[1].split('.');
        for(let i = 0; i < sub.length; i++){
            if(pruebaDominio3(sub[i])){
                console.log("p5");
                prueba = true;
            }
        }
        
    }

    return prueba;
}

function pruebaLocal1(texto){
    const patron = /^[a-zA-Z0-9!#$%&'*+\-\/=?^_`{|}~.]+$/;
    var aux = patron.test(texto);
    return !aux;
}
function pruebaLocal2(texto){
    const caracteres = [];
    for (let i = 0; i < texto.length; i++) { //rellenar el array de caracteres
      caracteres.push(texto.charAt(i));
    }
    if(caracteres[0] == '.' || caracteres[caracteres.length - 1] == '.'){
        return true;
    }
    else{
        var test1 = false;
        var test2 = false;
        var mal = false;
        var x = 0;
        for (let i = 0; i < texto.length; i++) { 
            if(test1 && caracteres[i] == '.'){
                test2 = true;
            }
            if(!test1 && caracteres[i] == '.'){
                test1 = true;
            }
            if(test2 && test2){
                mal = true;
            }
            x = x + 1;
            if(x >= 2){
                x = 0;
                test1 = false;
                test2 = false;
            }
        }
        return mal;
    }
}

function pruebaDominio1(texto){
    var aux = /\./.test(texto);
    console.log("p4.1" + !aux);
    return !aux;
}

function pruebaDominio2(texto){
    const partes = texto.split('.');
    prueva = false;
    var bloque;
    for(let i = 0; i < partes.length; i++){
        bloque = partes[i];
        if(bloque.length > 63){
            prueva = true;
        }
        var aux = /^[a-zA-Z0-9-]+$/.test(bloque);
        if(!aux){
            prueva = true;
        }
    }
    console.log("p4.2" + prueva);
    return prueva;
}

function pruebaDominio3(texto){
    const caracteres = [];
    for (let i = 0; i < texto.length; i++) { //rellenar el array de caracteres
      caracteres.push(texto.charAt(i));
    }
    if(caracteres[0] == '-' || caracteres[caracteres.length - 1] == '-'){
        return true;
    }
    else{
        return false;
    }
    
}
