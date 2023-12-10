<?php
    include "./controller/sessionController.php";
?>
<main>
    <h1>Baja</h1>
    <section class="aviso">
        <h2>¿Realmente desea eliminar permanentemente su cuenta?</h2>
        <p>Si elimina su cuenta, se eliminarán todos sus álbumes y fotos.</p>
        <p>Si desea eliminar su cuenta, introduzca su contraseña y pulse el botón.</p>
        <form method="POST" action="./controller/validador_baja.php" id="formulario">
            <div>
                <p>
                    <label for="pwd">
                        <span>CONTRASEÑA</span>
                        <span><input type="password" name="pwd" id="pwd"></span>
                    </label>
                </p>
                <p><input type="submit" value="Eliminar cuenta" id="boton"></p>
            </div>
        </form>
        <h3>Se eliminará la siguiente información:</h3>
        <?php
            $total = 0;
            $idUsuario = $_SESSION['IdUsuario'];
            $misAlbumes = getAlbumes($id, $idUsuario);
            while($row = mysqli_fetch_assoc($misAlbumes)){//cuando no hay filas devuelve false y termina
                echo <<<hereDOC
                <br>
                <article class='album'>
                    <a  href='./verAlbum.php?id={$row["IdAlbum"]}'>
                        <h3>{$row["Titulo"]}</h3>
                        <spam>{$row["Descripcion"]}</spam>
                    </a>
hereDOC;
                $nomUsuario = $_SESSION['usuario'];
                $titulo = $row["Titulo"];
                $fotosAlbum = buscar($id, "", "", "", $nomUsuario, $titulo, -1);
                $nFotosAlbum = mysqli_num_rows($fotosAlbum);
                $total += $nFotosAlbum;
                echo <<<hereDOC
                    <p>Fotos de {$row["Titulo"]}: {$nFotosAlbum} fotos</p>
                </article>
hereDOC;
            }
            echo "<p>Total de fotos: $total</p>";
        ?>
    </section>    
</main>