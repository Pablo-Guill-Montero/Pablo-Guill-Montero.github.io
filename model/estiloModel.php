<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    //echo "Todo va bien";

    function getEstilos($id){
        $retorno = mysqli_query($id, 
            "SELECT *
            from estilos");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";
        return $retorno;
    }

    function getEstilo($id, $idEstilo){
        $retorno = mysqli_query($id, 
            "SELECT *
            from estilos
            where IdEstilo = $idEstilo");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";
        return $retorno;
    }

    function putEstiloUsuario($id, $idUsuario, $idEstilo, $nombre, $descripcion, $ficheroEstilo){
        mysqli_query($id, 
        "UPDATE `usuarios` 
        SET `Estilo` = '$idEstilo' 
        WHERE `usuarios`.`IdUsuario` = $idUsuario;");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        $expira = time() + 90 * 24 * 60 *  60;
        setcookie(
            "estilo",
            $nombre,
            $expira,
                '/'
        );
        setcookie(
            "fichero",
            $ficheroEstilo,
            $expira,
                '/'
        );
        setcookie(
            "descripcion",
            $descripcion,
            $expira,
                '/'
        );
        if(!isset($_SESSION))
            session_start();
        $_SESSION['estilo'] = $nombre;
        $_SESSION['fichero'] = $ficheroEstilo;
        $_SESSION['descripcion'] = $descripcion;
    }

    function cambiarEstilo($idUsuario, $idEstilo, $nombre, $descripcion, $ficheroEstilo){
        $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";
        putEstiloUsuario($id, $idUsuario, $idEstilo, $nombre, $descripcion, $ficheroEstilo);
        mysqli_close($id);
        header("Location: ../usuario.php");
    }


    if (isset($_POST['estilo'])) {
        if(!isset($_SESSION))
            session_start();
        $idUsuario = $_SESSION['IdUsuario'];
        $idEstilo = $_POST['estilo'];
        $estilo = getEstilo($id, $idEstilo);
        $fila = mysqli_fetch_assoc($estilo);
        $nombreEstilo = $fila["Nombre"];
        $descripcionEstilo = $fila["Descripcion"];
        $ficheroEstilo = $fila["Fichero"];
        mysqli_free_result($estilo);

        cambiarEstilo($idUsuario, $idEstilo, $nombreEstilo, $descripcionEstilo, $ficheroEstilo);
    }
?>