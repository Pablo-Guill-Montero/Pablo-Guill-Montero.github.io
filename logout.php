<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    session_destroy();
    if(isset($_COOKIE['usuario']) || isset($_COOKIE['pwd']) || isset($_COOKIE['ultima'])){             
        // Establecer las cookies con la fecha de caducidad en el pasado
        setcookie('IdUsuario', "", time() - 3600, "/");
        setcookie('usuario', "", time() - 3600, "/");
        setcookie('pwd', "", time() - 3600, "/");
        setcookie('ultima', "", time() - 3600, "/");
        setcookie('estilo', "", time() - 3600, "/");
        setcookie('descripcion', "", time() - 3600, "/");
        setcookie('fichero', "", time() - 3600, "/");
        setcookie('idEstilo', "", time() - 3600, "/");

        // También puedes unset() las variables de cookie si aún están en uso en el script actual
        unset($_COOKIE['IdUsuario']);
        unset($_COOKIE['usuario']);
        unset($_COOKIE['pwd']);
        unset($_COOKIE['ultima']);
        unset($_COOKIE['estilo']);
        unset($_COOKIE['descripcion']);
        unset($_COOKIE['fichero']); 
        unset($_COOKIE['idEstilo']); 
    }         
    header("Location: ./index.php");    
?>