<?php
    include "./controller/sessionController.php";
?>
    <main>
        <h1>Detalle</h1>
        <article class="detalle">
            <?php
            $resultadoFoto = getFoto($id, $idFoto);
            if(mysqli_num_rows($resultadoFoto) == 0){
                echo "No hay fotos";
                mysqli_free_result($resultadoFoto);
                mysqli_close($id);
                header("Location: ./index.php");
            }
            while($row = mysqli_fetch_assoc($resultadoFoto)){//cuando no hay filas devuelve false y termina
                echo <<<hereDOC
                <h2>{$row["TituloFoto"]}</h2>
                <img src="./imgenes/{$row["Fichero"]}" alt="{$row["Alternativo"]}">
                <p>
                    <time datetime="{$row["FRegistro"]}">{$row["FRegistro"]}</time>
                    <span>{$row["Pais"]}</span>
                    <span><a href="verAlbum.php?id={$row["Album"]}">{$row["TituloAlbum"]}</a></span>
                    <span name="usuario"><a href="./perfil.php?id={$row["Usuario"]}">{$row["NomUsuario"]}</a></span>
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
