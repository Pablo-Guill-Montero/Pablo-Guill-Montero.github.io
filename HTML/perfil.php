<?php
    include "./controller/sessionController.php";
?>
    <main>
        <?php
        include './model/albumModel.php';
        $resultadoPerfil = getPerfil($id, $idPerfil);
        if(mysqli_num_rows($resultadoPerfil) == 0){
            echo "No hay perfil";
            mysqli_free_result($resultadoPerfil);
            mysqli_close($id);
            header("Location: ./index.php");
        }

        $albumes=getAlbumes($id, $idPerfil);
        while($row = mysqli_fetch_assoc($resultadoPerfil)){//cuando no hay filas devuelve false y termina
            echo <<<hereDOC
                <h1>Perfil de {$row["NomUsuario"]}</h1>
                <p>Nombre: {$row["NomUsuario"]}</p>
                <p>Foto: {$row["NomUsuario"]}</p>
                <p>Fecha de registro: {$row["FRegistro"]}</p>
                <p>Álbumes: 
                    <ul>
            hereDOC;
            if(mysqli_num_rows($albumes) == 0){
                echo "No hay albumes"; 
            }else{
                while($row2 = mysqli_fetch_assoc($albumes)){
                    echo <<<hereDOC
                        <li><a href="verAlbum.php?id={$row2["IdAlbum"]}">{$row2["Titulo"]}</a></li>
                    hereDOC;
                }
            }
            echo <<<hereDOC
                    <ul>
                </p>
            hereDOC;
        }
        mysqli_free_result($albumes);
        mysqli_free_result($resultadoPerfil);
        mysqli_close($id);
        ?>
    </main>
