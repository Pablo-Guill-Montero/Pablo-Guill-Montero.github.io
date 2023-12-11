<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    //echo "Todo va bien";

    function getFoto($id, $idFoto){
        $retorno = mysqli_query($id, 
            "SELECT p.NomPais as Pais, 
            f.Titulo as TituloFoto, f.Descripcion as Descripcion, 
            DATE_FORMAT(f.Fecha, '%e/%c/%Y') as Fecha, 
            f.Pais as idPais, Album, 
            Fichero, Alternativo, 
            DATE_FORMAT(f.FRegistro, '%e/%c/%Y') as FRegistro, 
            a.Titulo as TituloAlbum, NomUsuario, Usuario 
            FROM fotos f, albumes a, usuarios u, paises p
            WHERE IdFoto = $idFoto 
            AND f.Pais = p.IdPais
            AND f.Album = a.IdAlbum 
            AND a.Usuario = u.IdUsuario");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $retorno;
    }

    function postFoto($id, $titulo, $descripcion, $fecha, $pais, $idAlbum, $fichero, $alternativo){
        mysqli_query($id, 
            "INSERT INTO fotos (IdFoto, Titulo, Descripcion, Fecha, Pais, Album, Fichero, Alternativo, FRegistro)
            VALUES (NULL, '$titulo', '$descripcion', '$fecha', $pais, $idAlbum, '$fichero', '$alternativo', NOW())");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        // Obtener el ID del nuevo álbum insertado
        $newFoto = mysqli_insert_id($id);
        mysqli_close($id);
        header("Location: ./../detalle.php?id=$newFoto");
    }
?>