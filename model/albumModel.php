<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    //echo "Todo va bien";

    function getAlbumes($id, $idUsuario){
        $retorno = mysqli_query($id, 
            "SELECT *
            from albumes
            where Usuario = $idUsuario");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $retorno;
    }

    function getAlbum($id, $idAlbum){
        $retorno = mysqli_query($id, 
            "SELECT IdAlbum, Titulo, Descripcion, Usuario, NomUsuario
            from albumes, usuarios
            where Usuario = IdUsuario
            AND IdAlbum = $idAlbum");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $retorno;
    }

    function postAlbum($id, $titulo, $descripcion, $idUsuario){
        mysqli_query($id, 
            "INSERT INTO albumes (Titulo, Descripcion, Usuario)
            VALUES ('$titulo', '$descripcion', $idUsuario)");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        // Obtener el ID del nuevo álbum insertado
        $newAlbumId = mysqli_insert_id($id);
        mysqli_close($id);
        header("Location: ./../anadir_foto_album.php?id=$newAlbumId");
    }

?>