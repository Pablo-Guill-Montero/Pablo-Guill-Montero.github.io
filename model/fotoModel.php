<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    echo "Todo va bien";

    $resultadoFoto = getFoto($id, $idFoto);

    function getFoto($id, $idFoto){
        $retorno = mysqli_query($id, 
            "SELECT p.NomPais as Pais, 
                f.Titulo as TituloFoto, f.Descripcion as Descripcion, 
                DATE_FORMAT(f.Fecha, '%e/%c/%Y') as Fecha, 
                f.Pais as idPais, Album, 
                Fichero, Alternativo, 
                DATE_FORMAT(f.FRegistro, '%e/%c/%Y') as FRegistro, 
                a.Titulo as TituloAlbum, NomUsuario, Usuario 
            FROM fotos f, album a, usuarios u, paises p
            WHERE IdFoto = $idFoto 
            AND f.Pais = p.IdPais
            AND f.Album = a.IdAlbum 
            AND a.Usuario = u.IdUsuario");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        echo "Todo va bien";

        return $retorno;
    }
    if(mysqli_num_rows($resultadoFoto) == 0){
        echo "No hay fotos";
        mysqli_free_result($resultadoFoto);
        mysqli_close($id);
        header("Location: ./index.php");
    }
?>