<?php
    include "./controller/sessionController.php";
?>
<main>
        <h1>Inicio</h1>
        <section class="articulos">
            <h2>Fotos recientes</h2>
            <div>
                <?php
                    include './model/respuestaBusquedaModel.php';
                    $res_busq = buscar($id, "", "", "", "", "", 5);
                    while($row = mysqli_fetch_assoc($res_busq)){//cuando no hay filas devuelve false y termina
                        echo <<< hereDOC
                            <article class="articulo">
                                <h3>{$row["Titulo"]}</h3>
                                <a href="$archivo?id={$row["IdFoto"]}"><img src="./imgenes/{$row["Fichero"]}" alt="{$row["Alternativo"]}"></a>
                                <p>
                                    <span name="pais">{$row["Pais"]}</span>
                                    <time datetime="{$row["FRegistro"]}">{$row["FRegistro"]}</time>
                                    <span name="usuario"><a href="./perfil.php?id={$row["IdUsuario"]}">{$row["Usuario"]}</a></span>
                                </p>
                            </article>
                        hereDOC;
                    }
                
                    mysqli_free_result($res_busq);
                    mysqli_close($id);
                ?>
            </div>    
        </section>
    </main>

