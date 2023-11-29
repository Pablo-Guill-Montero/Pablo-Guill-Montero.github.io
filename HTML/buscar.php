<?php
    include "./controller/sessionController.php";
?>
    <main>
        <h1>Buscar</h1>
        <form action="./buscar.php">
            <div>
                <p>
                    <label for="Titulo">
                        <span>TÍTULO</span>
                        <span><input type="text" name="Titulo" id="Titulo"></span>
                    </label>
                </p>
                <p>
                    <label for="Fecha">
                        <span>FECHA</span>
                        <span><input type="text" name="Fecha" id="Fecha" ></span>
                    </label>
                </p>
                <p>
                    <label for="Pais">
                        <span>PAIS</span>
                        <span>
                            <select name="Pais" id="Pais">
                                <?php
                                    while($row = mysqli_fetch_assoc($resultado)){//cuando no hay filas devuelve false y termina
                                        echo "<option value='{$row["NomPais"]}'>{$row["NomPais"]}</option>";
                                    }
                                    mysqli_free_result($resultado);
                                    //mysqli_close($id);
                                ?>
                            </select>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="Usuario">
                        <span>USUARIO</span>
                        <span><input type="text" name="Usuario" id="Usuario" ></span>
                    </label>
                </p>
                <p>
                    <label for="Album">
                        <span>ÁLBUM</span>
                        <span><input type="text" name="Album" id="Album" ></span>
                    </label>
                </p>
                <p>
                    <input type="submit" value="Buscar">
                </p>
            </div>
        </form>
        <section class="articulos">
            <h2>Fotos:</h2>
            <?php
            if ($tituloFoto!="")
                echo "<p>Título buscado: $tituloFoto<p>";
            if ($fecha!="")
                echo "<p>Fecha buscada: $fecha<p>";
            if ($pais!="")
                echo "<p>Pais buscado: $pais<p>";
            if ($usuario!="")
                echo "<p>Usuario buscado: $usuario<p>";
            if ($album!="")
                echo "<p>Album buscado: $album<p>";
            if ($cantidad!="")
                echo "<p>Cantidad buscada: $cantidad<p>";
            ?>
            <div>
                <?php
                    while($row = mysqli_fetch_assoc($res_busq)){//cuando no hay filas devuelve false y termina
                        echo <<< hereDOC
                            <article class="articulo">
                                <h3>{$row["Titulo"]}</h3>
                                <a href="$archivo?id={$row["IdFoto"]}"><img src="./imgenes/{$row["Fichero"]}" alt="{$row["Alternativo"]}"></a>
                                <p>
                                    <span name="pais">{$row["Pais"]}</span>
                                    <time datetime="{$row["FRegistro"]}">{$row["FRegistro"]}</time>
                                    <span name="usuario">{$row["Usuario"]}</span>
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
