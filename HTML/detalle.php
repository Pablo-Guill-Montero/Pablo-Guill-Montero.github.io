<?php
    include "./controller/sessionController.php";
?>
    <main>
        <h1>Detalle</h1>
        <article class="detalle">
            <?php
            while($row = mysqli_fetch_assoc($resultadoFoto)){//cuando no hay filas devuelve false y termina
                echo <<<hereDOC
                <h2>{$row["TituloFoto"]}</h2>
                <img src="./imgenes/{$row["Fichero"]}" alt="{$row["Alternativo"]}">
                <p>
                    <time datetime="{$row["FRegistro"]}">{$row["FRegistro"]}</time>
                    <span>{$row["Pais"]}</span>
                    <span><a href="album.php?id={$row["Album"]}">{$row["TituloAlbum"]}</a></span>
                    <a href="usuario.php?id={$row["Usuario"]}">{$row["NomUsuario"]}</a>
                </p> 
                <p>Fecha de la foto:
                    <time datetime="{$row["Fecha"]}">{$row["Fecha"]}</time>
                </p>
                <p>Descripción: {$row["Descripcion"]}</p>
                hereDOC;
            }

            mysqli_free_result($resultadoFoto);
            mysqli_close($id);
                
            ?>
            
             
        </article> 
    </main>
