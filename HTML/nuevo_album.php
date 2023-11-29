<?php
    include "./controller/sessionController.php";
?>
<main>
    <h1>Nuevo álbum</h1>
    <form action="#" id="formulario">
        <div>
            <p>
                <label for="titulo">
                    <span>TÍTULO: </span>
                    <span><input type="text" name="titulo" id="titulo" required></span>
                </label>
            </p>
            <P>
                <label for="descripcion">
                    <span>DESCRIPCIÓN: </span>
                    <span><textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea></span>
                </label>
            </p>
            <p>
                <input type="button" value="Crear" id="boton">
            </p>
        </div>
    </form>
</main>