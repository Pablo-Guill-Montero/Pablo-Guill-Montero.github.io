<?php
    include "./controller/sessionController.php";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        if($modo == 1){
            echo "<p>El título no puede estar vacío.</p>";
        }
    }
?>
<main>
    <h1>Nuevo álbum</h1>
    <form method="POST" action="./controller/validador_album.php" id="formulario">
        <div>
            <p>
                <label for="titulo">
                    <span>TÍTULO: </span>
                    <span><input type="text" name="titulo" id="titulo"></span>
                </label>
            </p>
            <P>
                <label for="descripcion">
                    <span>DESCRIPCIÓN: </span>
                    <span><textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea></span>
                </label>
            </p>
            <p>
                <input type="submit" value="Crear" id="boton">
            </p>
        </div>
    </form>
</main>