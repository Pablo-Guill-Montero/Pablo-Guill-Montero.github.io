<?php
    $albumActual = -1;
    $nombeAlbum = "";
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $prueba = getAlbum($id, $_GET['id']);
        if(mysqli_num_rows($prueba) == 0){
            mysqli_free_result($prueba);
            mysqli_close($id);
           header("Location: ./index.php");
        }
        $fila = mysqli_fetch_assoc($prueba);
        if($fila['Usuario'] != $_SESSION['IdUsuario']){
            mysqli_free_result($prueba);
            mysqli_close($id);
           header("Location: ./index.php");
        } 
        $albumActual = $_GET['id'];
        $nombeAlbum = $fila['Titulo'];
        mysqli_free_result($prueba);
    }

?>
<main>
    <form>
        <div>
            <p>
                <label for="titulo">
                    <span>TÍTULO</span>
                    <span><input type="text" name="titulo" id="titulo" ></span>
                </label>
            </p>
            <p>
                <label for="descripcion">
                    <span>DESCRIPCIÓN</span>
                    <span><input type="text" name="descripcion" id="descripcion" ></span>
                </label>
            </p>
            <p>
                <label for="fecha">
                    <span>FECHA</span>
                    <span><input type="text" name="fecha" id="fecha" ></span>
                </label>
            </p>
            <p>
                <label for="pais">
                    <span>PAÍS</span>
                    <span>
                        <select name="Pais" id="Pais" >
                            <?php
                                $resultado = getPaises($id);
                                while($row = mysqli_fetch_assoc($resultado)){//cuando no hay filas devuelve false y termina
                                    echo "<option value='{$row["IdPais"]}'>{$row["NomPais"]}</option>";
                                }
                                mysqli_free_result($resultado);

                            ?>
                        </select>
                    </span>
                </label>
            </p>
            <p>
                <label for="album">
                    <span>ALBUM</span>
                    <span>
                        <select name="album" id="album" >
                            <?php
                                if($albumActual != -1){
                                    echo"<option value='$albumActual' selected>$nombeAlbum</option>";
                                }
                                $idUsuario = $_SESSION['IdUsuario'];
                                $albumes = getAlbumes($id, $idUsuario);
                                while($row = mysqli_fetch_assoc($albumes)){//cuando no hay filas devuelve false y termina
                                    echo "<option value='{$row["IdAlbum"]}'>{$row["Titulo"]}</option>";
                                }
                                mysqli_free_result($albumes);
                                mysqli_close($id);
                            ?>
                        </select>
                    </span>
                </label>
            </p>
            <p>
                <label for="foto">
                <span>FOTO</span>
                <img src="./imgenes/vacia.jpg" id="fotoUsuario" alt="FOTO USUARIO" onclick="this.parentElement.querySelector('input[type = file]').click();"> <!-- enlaza con el input de abajo -->
                <!-- para mostrar la imagen -->
                <input type="file" onchange="mostrarFoto(this);" name="foto" id="fotoInput" accept="image/*">
                </label>
                <footer>
                    <button type="button" class="botones_foto" id="eliminarFotoBtn" onclick="eliminarFoto(this);">Eliminar Foto</button>
                </footer>
            </p>
            <p>
                <label for="alternativo">
                    <span>ALTERNATIVO</span>
                    <span><input type="text" name="alternativo" id="alternativo" ></span>
                </label>
            </p>
            <input type="button" value="SUBIR">
        </div>
    </form>
</main>
