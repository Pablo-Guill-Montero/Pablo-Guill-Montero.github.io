<?php
    include "./controller/sessionController.php";
?>
    <main>
        <?php
        $resultadoAlbum = getAlbum($id, $idAlbum);
        if(mysqli_num_rows($resultadoAlbum) == 0){
            echo "No hay perfil";
            mysqli_free_result($resultadoAlbum);
            mysqli_close($id);
            header("Location: ./index.php");
        }


        while($row = mysqli_fetch_assoc($resultadoAlbum)){//cuando no hay filas devuelve false y termina
            $idUsuario = $row['Usuario'];
            echo <<<hereDOC
                <h1>Ver Album: {$row["Titulo"]}</h1>
                <p>Descripción: {$row["Descripcion"]}</p>
                <section class="articulos">
                    <h2>Fotos: </h2>
                        <div>
            hereDOC;

            include "./model/respuestaBusquedaModel.php";
            $nomUsuario = $row['NomUsuario'];
            $titulo = $row['Titulo'];
            //function buscar($id, $tituloFoto, $fecha, $pais, $usuario, $album, $cantidad){
            $resultadoFotos = buscar($id, "", "", "", $nomUsuario, $titulo, -1);
            $intervalo = getIntervalo($id, $idAlbum);
            $totalFilas = mysqli_num_rows($resultadoFotos);
            $paises = array();
            while($row2 = mysqli_fetch_assoc($resultadoFotos)){//cuando no hay filas devuelve false y termina
                if (!in_array($row2['Pais'], $paises)) {
                    $paises[] = $row2['Pais'];
                }
                echo <<<hereDOC
                    <article class="articulo">
                    <h3>{$row2["Titulo"]}</h3>
                    <a href="$archivo?id={$row2["IdFoto"]}"><img src="./imgenes/{$row2["Fichero"]}" alt="{$row2["Alternativo"]}"></a>
                    <p>
                        <span name="pais">{$row2["Pais"]}</span>
                        <time datetime="{$row2["FRegistro"]}">{$row2["FRegistro"]}</time>
                        <span name="usuario"><a href="./perfil.php?id={$row2["IdUsuario"]}">{$row2["Usuario"]}</a></span>
                    </p>
                    </article>
                hereDOC;
            }
            echo <<<hereDOC
                        </div>
                </section>
                <p>Cantidad de fotos: $totalFilas</p>
                <p>Paises: </p>
                <ul>
            hereDOC;
            foreach ($paises as $pais) {
                echo <<<hereDOC
                    <li>$pais</li>
                hereDOC;
            }
            echo <<<hereDOC
                </ul>
                <p>Intervalo de fechas: </p>
            hereDOC;
            while($row2 = mysqli_fetch_assoc($intervalo)){//cuando no hay filas devuelve false y termina
                echo <<<hereDOC
                    <p>Desde {$row2["FechaMinima"]} hasta {$row2["FechaMaxima"]}</p>
                hereDOC;
            }
            if($_SESSION){
                //Si el usuario que entra es el mismo que el que ha creado el album
                if($idUsuario==$_SESSION['IdUsuario']){
                    echo "<div id='btnNewImg'>
                            <a class='icon-nuevaImagen' href='./nueva_imagen.php?id={$idAlbum}'>
                                <span>AÑADIR IMAGEN</span>
                            </a>
                        </div>";
                }
            }
        }
        
        mysqli_free_result($resultadoAlbum);
        mysqli_close($id);
        ?>
    </main>
