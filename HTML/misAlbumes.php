<?php
    include "./controller/sessionController.php";
?>
<main>
<?php
$contador = 0;
$idUsuario = $_SESSION["IdUsuario"];
$misAlbumes = getAlbumes($id, $idUsuario);
 while($row = mysqli_fetch_assoc($misAlbumes)){//cuando no hay filas devuelve false y termina
    echo "<article class='album'>";
    echo "<a  href='./verAlbum.php?id={$row["IdAlbum"]}' id='bloque$contador'>";
    echo "<h3>{$row["Titulo"]}</h3>";
    echo "<spam>{$row["Descripcion"]}</spam>";
    echo "</a>";
    echo "</article>";
    echo "<br>";
    $contador = $contador + 1;
}
mysqli_free_result($misAlbumes);
mysqli_close($id);
?>
</main>