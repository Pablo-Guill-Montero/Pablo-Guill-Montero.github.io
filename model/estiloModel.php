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


    if (isset($_POST['idUsuario']) && isset($_POST['idEstilo']) && isset($_POST['nombreEstilo']) && isset($_POST['descripcionEstilo']) && isset($_POST['ficheroEstilo'])) {
        $idUsuario = $_POST['idUsuario'];
        $idEstilo = $_POST['idEstilo'];
        $nombreEstilo = $_POST['nombreEstilo'];
        $descripcionEstilo = $_POST['descripcionEstilo'];
        $ficheroEstilo = $_POST['ficheroEstilo'];

        cambiarEstilo($idUsuario, $idEstilo, $nombreEstilo, $descripcionEstilo, $ficheroEstilo);
    }
?>