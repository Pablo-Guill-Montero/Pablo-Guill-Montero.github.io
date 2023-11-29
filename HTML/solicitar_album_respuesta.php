<?php
    include "./controller/sessionController.php";
?>
    <main>
       <h1>Solicitar álbum respuesta</h1>
       
       <section id="seccion_resultado">
            <h2>Se solicitó un álbum con la siguiente información</h2>
            <div>
                <p id="nombre">Nombre: <?=$nombre?></p>
                <p id="titulo">Título: <?=$tituloAlbum?></p>
                <p id="adicional">Descripción: <?=$adicional?></p>
                <p id="email">Email: <?=$email?></p>
                <p id="direccion">Dirección: <?=$direccion?></p>
                <p id="telefono">Telefono: <?=$telefono?></p>
                <p>
                    <label for="color"> 
                        <span>Color de la portada</span>
                        <span><input type="color" id="color" name="color" disabled value='<?=$color?>'/></span>
                    </label>
                </p>
                <p id="cantidad">Cantidad: <?=$cantidad?></p>
                <p id="resolucion">Resolución: <?=$resolucion?></p>
                <p id="album">Álbum: <?=$album?></p>
                <p id="fecha">Fecha: <?=$fecha?></p>
                <p>
                    <label for="col_impre">
                        <span>Impresión a color</span>
                        <span><input type="checkbox" name="col_impre" disabled id="col_impre" <?php echo $col_impre ? 'checked' : ''; ?>></span>
                    </label>
                </p>
                <p id="coste">Precio unitario: <?=$coste?></p>
                <p id="coste">El coste de impresión total es: <?=$total?></p>
            </div>
        
       </section>  
    </main>
