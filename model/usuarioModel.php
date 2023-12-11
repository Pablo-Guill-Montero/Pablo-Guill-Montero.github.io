<?php
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    
    function postUsuario($conexion, $nombre, $pwd, $email, $sexo, $fecha, $ciudad, $pais, $foto) {
        // Escapar las variables para prevenir inyecciones SQL
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $pwd = mysqli_real_escape_string($conexion, $pwd);
        $email = mysqli_real_escape_string($conexion, $email);
        $sexo = intval($sexo); // Asegurar que $sexo sea un entero
        $fechaNacimientoFormateada = date("Y-m-d", strtotime($fecha));
        $ciudad = mysqli_real_escape_string($conexion, $ciudad);
        $pais = intval($pais); // Asegurar que $pais sea un entero
        $foto = mysqli_real_escape_string($conexion, $foto);
    
        // Utilizar una sentencia preparada para mejorar seguridad
        $stmt = mysqli_prepare($conexion, "INSERT INTO usuarios (NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, FRegistro, Estilo, UltimaConexion) VALUES ('$nombre', '$pwd', '$email', $sexo, '$fechaNacimientoFormateada', '$ciudad', $pais, '$foto', NOW(), 1, NOW())");
    
        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);
    
        // Verificar errores
        if (mysqli_stmt_errno($stmt) != 0) {
            echo mysqli_stmt_error($stmt);
        }
    
        // Cerrar la sentencia preparada
        mysqli_stmt_close($stmt);
    
        // Cerrar la conexión
        mysqli_close($conexion);
    
        // Redirigir a la página correspondiente
        header("Location: ./../nuevo_usuario.php?nombre=$nombre&pwd=$pwd&pwd2=$pwd&email=$email&sexo=$sexo&fecha=$fecha&ciudad=$ciudad&pais=$pais");
        exit(); // Terminar el script después de la redirección
    }
    

    function updateUsuario($id, $nombre, $pwd, $email, $sexo, $fecha, $ciudad, $pais, $foto){
        $idUsu = $_SESSION["IdUsuario"];
        $usu = getUsu($id, $idUsu);
        $info = mysqli_fetch_assoc($usu);
        $fechaR = $info["FRegistro"];
        $estilo = $info["Estilo"];
        $ultimaFecha = $info["UltimaConexion"];

        if($sexo == "Hombre" || $sexo == "hombre" || $sexo == "H" || $sexo == "h" ){
            $sexo = 1;
        }
        else if($sexo == "Mujer" || $sexo == "mujer" || $sexo == "M" || $sexo == "m" ){
            $sexo = 0;
        }
        else{
            $sexo = 3;
        }
        
        mysqli_query($id, 
            "UPDATE usuarios 
            SET NomUsuario='$nombre', Clave='$pwd', Email='$email', Sexo=$sexo, FNacimiento='$fecha', Ciudad='$ciudad', Pais=$pais, Foto='$foto', FRegistro='$fechaR', Estilo=$estilo, UltimaConexion='$ultimaFecha'
            WHERE IdUsuario=$idUsu");
        
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();
            exit;
        }
    
        mysqli_close($id);
        header("Location: ./../usuario.php");
    }
    

    function getUsu($id, $idUsu){
        $retorno = mysqli_query($id, 
            "SELECT *
            from usuarios
            where IdUsuario = $idUsu");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $retorno;
    }



    /*
    function postUsuario($id, $nombre, $pwd, $email, $sexo, $fecha, $ciudad, $pais, $foto){
        $fechaNacimientoFormateada = date("Y-m-d",strtotime($fecha));
        mysqli_query($id, 
        "INSERT INTO usuarios (NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais , Foto, FRegistro, Estilo , UltimaConexion)
        VALUES ('$nombre', '$pwd', '$email', $sexo, '$fechaNacimientoFormateada', '$ciudad', $pais, '$foto', NOW(), 1, NOW())");
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
       
    }
    //echo "Todo va bien";

    // Obtener el ID del nuevo álbum insertado
    
    mysqli_close($id);
    header("Location: ./../nuevo_usuario.php?nombre=$nombre&pwd=$pwd&pwd2=$pwd&email=$email&sexo=$sexo&fecha=$fecha&ciudad=$ciudad&pais=$pais");
    
    
    }
    
    
    
        function updateUsuario($id, $nombre, $pwd, $email, $sexo, $fecha, $ciudad, $pais, $foto){
        $idUsu = $_SESSION["IdUsuario"];
        $usu = getUsu($id, $idUsu);
        $info = mysqli_fetch_assoc($usu);
        $fechaR = $info["FRegistro"];
        $estilo = $info["Estilo"];
        $ultimaFecha = $info["UltimaConexion"];
        mysqli_query($id, 
        "INSERT INTO usuarios (IdUsuario , NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais , Foto, FRegistro, Estilo , UltimaConexion)
        VALUES ( $idUsu, '$nombre', '$pwd', '$email', $sexo, '$fecha', '$ciudad', $pais, '$foto', '$fechaR', $estilo, '$ultimaFecha')");
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador

        exit;
    }
    //echo "Todo va bien";

    // Obtener el ID del nuevo álbum insertado
    
    mysqli_close($id);
    header("Location: ./../usuario.php"); 
    
    }
    */
?>