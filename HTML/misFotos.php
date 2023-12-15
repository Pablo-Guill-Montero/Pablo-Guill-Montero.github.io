<?php
    include "./controller/sessionController.php";
?>
<main>
    <h1>Mis Fotos</h1>
<?php
$idUsuario = $_SESSION["IdUsuario"];
$usuario = $_SESSION["usuario"];
$misFotos = buscarEstrictoFotos($id, "", "", "", $usuario, "", -1);
while($row = mysqli_fetch_assoc($misFotos)){//cuando no hay filas devuelve false y termina
    echo <<<hereDOC
    
        <article class="detalle">
            <h2>{$row["Titulo"]}</h2>
            <img src="./imgenes/{$row["Fichero"]}" alt="{$row["Alternativo"]}">
            <p>
                <time datetime="{$row["FRegistro"]}">{$row["FRegistro"]}</time>
                <span>{$row["Pais"]}</span>
                <span><a href="verAlbum.php?id={$row["IdAlbum"]}">{$row["Album"]}</a></span>
                <span name="usuario"><a href="./perfil.php?id={$row["IdUsuario"]}">{$row["Usuario"]}</a></span>
            </p> 
            <p>Fecha de la foto:
                <time datetime="{$row["Fecha"]}">{$row["Fecha"]}</time>
            </p>
            <p>Descripción: {$row["Descripcion"]}</p>
        </article>

    hereDOC;
}
mysqli_free_result($misFotos);
mysqli_close($id);
?>
</main>