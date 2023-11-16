<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    session_destroy();
    if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){             
        // Establecer la cookie con la fecha de caducidad en el pasado
        setcookie('usuario', "", time() - 3600, "/");
        // También puedes unset() la variable de cookie si aún está en uso en el script actual
        unset($_COOKIE['usuario']);

        // Establecer la cookie con la fecha de caducidad en el pasado
        setcookie('pwd', "", time() - 3600, "/");
        // También puedes unset() la variable de cookie si aún está en uso en el script actual
        unset($_COOKIE['pwd']);

        // Establecer la cookie con la fecha de caducidad en el pasado
        setcookie('ultima', "", time() - 3600, "/");
        // También puedes unset() la variable de cookie si aún está en uso en el script actual
        unset($_COOKIE['ultima']);

        // Establecer la cookie con la fecha de caducidad en el pasado
        setcookie('estilo', "", time() - 3600, "/");
        // También puedes unset() la variable de cookie si aún está en uso en el script actual
        unset($_COOKIE['estilo']);
    }         
    header("Location: ./index.php");    
?>