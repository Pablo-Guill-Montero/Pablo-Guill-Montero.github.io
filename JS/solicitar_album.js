window.addEventListener('load', init);

function init() {
    //Recuperar los campos
    const tablas = document.getElementById('tablas');

    let tabla = document.createElement('table');
    
    //Cabecera de la tabla
    let cabecera1 = document.createElement('tr');
    cabecera1.className = "cabecera";

    let col1 = document.createElement('td');
    col1.textContent = ``;
    cabecera1.appendChild(col1);

    let col2 = document.createElement('td');
    col2.textContent = ``;
    cabecera1.appendChild(col2);

    let col3 = document.createElement('td');
    col3.textContent = `Blanco y negro`;
    col3.colSpan = 2;
    cabecera1.appendChild(col3);

    let col5 = document.createElement('td');
    col5.textContent = `Color`;
    col5.colSpan = 2;
    cabecera1.appendChild(col5);


    let cabecera2 = document.createElement('tr');
    cabecera2.className = "cabecera";

    let col11 = document.createElement('td');
    col11.textContent = `Número de páginas`;
    cabecera2.appendChild(col11);

    let col22 = document.createElement('td');
    col22.textContent = `Número de fotos`;
    cabecera2.appendChild(col22);

    let col33 = document.createElement('td');
    col33.textContent = `150-300 dpi`;
    cabecera2.appendChild(col33);

    let col44 = document.createElement('td');
    col44.textContent = `450-900 dpi`;
    cabecera2.appendChild(col44);

    let col55 = document.createElement('td');
    col55.textContent = `150-300 dpi`;
    cabecera2.appendChild(col55);

    let col66 = document.createElement('td');
    col66.textContent = `450-900 dpi`;
    cabecera2.appendChild(col66);

    tabla.appendChild(cabecera1);
    tabla.appendChild(cabecera2);

    //Contenido
    let paginas, fotos, tarifa, factor1 = 0.1, factor2 = 0.08, factor3 = 0.07, lim1 = 4, lim2 = 7;
    for(let i = 0; i < 15; i++) {
        let fila = document.createElement('tr');
        paginas = i + 1;
        fotos = paginas * 3;

        for(let j = 0; j < 6; j++) {
            let columna = document.createElement('td');

            if(j == 0) {
                //Nº páginas
                columna.textContent = paginas;
            }
            else if(j == 1){
                //Nº fotos
                columna.textContent = fotos;
            }
            else{
                //Ajustar tarifa
                if (paginas < 5)
                    tarifa = paginas * factor1;
                else if (paginas >= 5 && paginas <= 11)
                    tarifa = lim1*factor1 + (paginas-lim1) * factor2;
                else
                    tarifa =  lim1*factor1 + lim2*factor2 + (paginas-(lim2+lim1)) * factor3;

                if(j == 3){
                    //Blanco y negro 450-900dpi
                    tarifa = tarifa + fotos*0.02;
                }
                else if(j == 4){
                    //Color 150-300dpi
                    tarifa = tarifa + fotos*0.05;
                }
                else if(j == 5){
                    //Color 450-900dpi
                    tarifa = tarifa + fotos*0.02;
                    tarifa = tarifa + fotos*0.05;
                }
                columna.textContent = tarifa.toFixed(2);
            }
            fila.appendChild(columna);
        }
        tabla.appendChild(fila);
    }
    tablas.appendChild(tabla);
}