<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    //echo "Todo va bien";

    //$resultado = getPaises($id);

    function getPaises($id){
        $resultado = mysqli_query($id, 
            "SELECT *
            FROM paises");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $resultado;
    }
    
    //$resultadoFoto = getPais($id, $idFoto);

    function getPais($id, $idPais){
        if(empty($idPais) || !is_numeric($idPais)){
            $retorno = mysqli_query($id, 
            "SELECT p.NomPais as Pais 
            FROM paises p
            WHERE IdPais = 1 ");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }

        return $retorno;
        }
        else{
        $retorno = mysqli_query($id, 
            "SELECT p.NomPais as Pais 
            FROM paises p
            WHERE IdPais = $idPais ");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }


        return $retorno;
        }
    }
    
?>