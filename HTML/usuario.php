<?php
    include "./controller/sessionController.php";
?>
    <main>
        <h1>Usuario</h1>
        <ul>
            <li><a class="icon-editarPerfil" href="misDatos.php">Editar perfil</a></li>
            <li><a class="icon-baja" href="baja.php">Darse de baja</a></li>
            <li><a class="icon-album" href="misAlbumes.php">Mis álbumes</a></li>
            <li><a class="icon-nuevoAlbum" href="nuevo_album.php">Nuevo álbum</a></li>
            <li><a class="icon-impreso" href="solicitar_album.php">Solicitar álbum impreso</a></li>
            <li><a class="icon-login" href="logout.php">Salir</a></li>
            <li>
                <label for="chkmenu2" >
                    Estilos
                </label>
                <input type="checkbox" id="chkmenu2" name="chkmenu2">
                <ul id="estilos">
                    <?php
                    $idUsuario = $_SESSION["IdUsuario"];
                    $estilos = getEstilos($id);

                    while($row = mysqli_fetch_assoc($estilos)){//cuando no hay filas devuelve false y termina
                        echo  "<li><button onclick='cambiaestilo({$row['IdEstilo']})'>{$row['Nombre']}</button></li>";
                    }
                    mysqli_free_result($estilos);
                    mysqli_close($id);
                    ?>
                </ul>
            </li>
            <li><a class="icon-album" href="misFotos.php">Mis fotos</a></li>
            <li><a class="icon-album" href="anadir_foto_album.php">Añadir foto a album</a></li>
        </ul>
    </main>