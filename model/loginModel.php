<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    echo "Todo va bien";

    $pwdHash =hash('sha256', $pwd);
    //PARA PRUEBAS SIN EL HASH - RECORDAR CAMBIARLO
    $resultado = login($id, $nombre, $pwd);

    //Recogemos la información del estilo aquí también para ahorrar consultas
    function login($id, $nombre, $pwdHash){
        $resultado = mysqli_query($id, 
            "SELECT IdUsuario, NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, FRegistro, e.Nombre as Estilo, e.Descripcion as Descripcion, e.Fichero as Fichero, UltimaConexion
            FROM usuarios, estilo e
            WHERE usuarios.Estilo = e.IdEstilo
            AND NomUsuario = '$nombre' 
            AND Clave = '$pwdHash'");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        echo "Todo va bien";

        return $resultado;
    }

    if(mysqli_num_rows($resultado)==1){
        $fila = mysqli_fetch_assoc($resultado);
        $idUsuario = $fila['IdUsuario'];
        $nombre = $fila['NomUsuario'];
        $pwd = $fila['Clave'];
        $email = $fila['Email'];
        $sexo = $fila['Sexo'];
        $fecha = $fila['FNacimiento'];
        $ciudad = $fila['Ciudad'];
        $pais = $fila['Pais'];
        $foto = $fila['Foto'];
        $fecha = $fila['FRegistro'];
        $estilo = $fila['Estilo'];
        $ultima = $fila['UltimaConexion'];
        $descripcion = $fila['Descripcion'];
        $fichero = $fila['Fichero'];
        
        if(isset($_POST['recuerda'])){
            $expira = time() + 90 * 24 * 60 *  60;
            $hoy = time();

            setcookie(
                "IdUsuario",
                $idUsuario,
                $expira,
                '/'
           );

            setcookie(
                "usuario",
                 $nombre,
                 $expira,
                 '/'
            );

            setcookie(
                 "pwd",
                 $pwdHash,
                 $expira,
                 '/'
            );

            setcookie(
                "ultima",
                $hoy,
                $expira,
                 '/'
            );

            setcookie(
                "estilo",
                $estilo,
                $expira,
                 '/'
            );
            setcookie(
                "descripcion",
                $descripcion,
                $expira,
                 '/'
            );
            setcookie(
                "fichero",
                $fichero,
                $expira,
                 '/'
            );
        }
        session_start();
        $_SESSION['IdUsuario'] = $idUsuario;
        $_SESSION['usuario'] = $nombre;
        $_SESSION['pwd'] = $pwdHash;
        $_SESSION['estilo'] = $estilo;
        $_SESSION['descripcion'] = $descripcion;
        $_SESSION['fichero'] = $fichero;

        mysqli_free_result($resultado);
        mysqli_close($id);
        header("Location: ./../usuario.php");
    }else{
        mysqli_free_result($resultado);
        mysqli_close($id);
        header("Location: ./../login.php?modo=1");
    }
?>