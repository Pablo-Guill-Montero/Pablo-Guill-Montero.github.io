<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    //echo "Todo va bien";

    function getPerfil($id, $idPerfil){
        $retorno = mysqli_query($id, 
            "SELECT *
            from usuarios
            where IdUsuario = $idPerfil");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $retorno;
    }

    function deletePerfil($id, $idPerfil){
        mysqli_query($id, 
            "DELETE
            from usuarios
            where IdUsuario = $idPerfil");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";
    }
    
?>