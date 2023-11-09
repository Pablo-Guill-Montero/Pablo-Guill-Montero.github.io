
    <main>
        <h1>Detalle</h1>
        <article class="detalle">
            <?php
                echo <<<hereDOC
                <h2>$tituloFoto</h2>
                <img src="imgenes/$ruta" alt="foto">
                <p>
                    <time datetime="$datetime">$fecha</time>
                    <span>$videojuego</span>
                    <span>$album</span>
                    <a href="usuario.php">$usuario</a>
                </p> 
                hereDOC;
            ?>
            
             
        </article> 
    </main>
