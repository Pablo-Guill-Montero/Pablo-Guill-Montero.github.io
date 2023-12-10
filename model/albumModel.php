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

?>