<?php
    include "./controller/sessionController.php";
?>
    <main>
        <h1>Detalle</h1>
        <article class="detalle">
            <?php
                echo <<<hereDOC
                <h2>$tituloFoto</h2>
                <img src="imgenes/$fichero" alt="$alternativo">
                <p>
                    <time datetime="$fechaRegistro">$fechaRegistro</time>
                    <span>$pais</span>
                    <span><a href="album.php?id=album">$tituloAlbum</a></span>
                    <a href="usuario.php?id=$idUsuario">$usuario</a>
                </p> 
                <p>Fecha de la foto:
                    <time datetime="$fecha">$fecha</time>
                </p>
                <p>Descripción: $descripcion</p>
                hereDOC;
            ?>
            
             
        </article> 
    </main>
