<?php
    include "./controller/sessionController.php";
?>
    <main>
        <h1>Usuario</h1>
        <ul>
            <li><a class="icon-editarPerfil" href="misDatos.php">Editar perfil</a></li>
            <li><a class="icon-album" href="misAlbumes.php">Mis álbumes</a></li>
            <li><a class="icon-nuevoAlbum" href="nuevo_album.php">Nuevo álbum</a></li>
            <li><a class="icon-impreso" href="solicitar_album.php">Solicitar álbum impreso</a></li>
            <li>
                <label for="chkmenu2" >
                    Estilos
                </label>
                <input type="checkbox" id="chkmenu2" name="chkmenu2">
                <ul id="estilos">
                    <li>
                        <form method="POST" action="./model/estiloModel.php" id="formulario">
                            <div>
                                <p>
                                    <label for="estilo">
                                        <span>Estilo</span>
                                        <span>
                                            <select name="estilo" id="estilo" >
                                                <option value='<?=$_SESSION['idEstilo']?>' selected><?=$_SESSION['estilo']?></option>
                                                <?php
                                                    $estilos = getEstilos($id);
                                                    while($row = mysqli_fetch_assoc($estilos)){//cuando no hay filas devuelve false y termina
                                                        echo "<option value='{$row["IdEstilo"]}'>{$row["Nombre"]}</option>";
                                                    }
                                                    mysqli_free_result($estilos);
                                                    mysqli_close($id);
                                                ?>
                                            </select>
                                        </span>
                                    </label>
                                </p>
                                <p>
                                    <input type="submit" value="Cambiar estilo">
                                </p>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
            <li><a class="icon-album" href="misFotos.php">Mis fotos</a></li>
            <li><a class="icon-album" href="anadir_foto_album.php">Añadir foto a album</a></li>
            <li><a class="icon-baja" href="baja.php">Darse de baja</a></li>
            <li><a class="icon-login" href="logout.php">Salir</a></li>
        </ul>
    </main>