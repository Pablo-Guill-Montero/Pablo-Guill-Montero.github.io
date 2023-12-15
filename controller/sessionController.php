<?php
    $nombre = "";
    $pwd = "";
    $autologin=false;
    $fallo=false;

     if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){
        $nombre =  $_COOKIE['usuario'];
        $pwd =  $_COOKIE['pwd'];
        $estilo =  $_COOKIE['estilo'];
        $descripcion =  $_COOKIE['descripcion'];
        $fichero =  $_COOKIE['fichero'];
        $idUsuario =  $_COOKIE['IdUsuario'];
        // echo <<<hereDOC
        //     <p>nombre: $nombre</p>
        //     <p>pwd: $pwd</p>
        //     <p>estilo: $estilo</p>
        //     <p>descripcion: $descripcion</p>
        //     <p>fichero: $fichero</p>
        //     <p>idUsuario: $idUsuario</p>
        // hereDOC;

        //te recordamos pero no estas iniciado en la sesión
        if(!(isset($_SESSION['usuario']) && isset($_SESSION['pwd']))){
            $autologin=true;
            include './model/loginModel.php';

            $fecha = $_COOKIE['ultima'];
                setcookie('ultima', time(), time()+ 90 * 24 * 60 *  60, '/');
            echo '<script>';
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "index" . '");';
            echo '</script>';

            $_COOKIE['ultima'] = time();
        }
    }
    else if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
        // Ya estas iniciado
        $nombre =  $_SESSION['usuario'];
        $pwd =  $_SESSION['pwd'];
        $estilo =  $_SESSION['estilo'];
        $descripcion =  $_SESSION['descripcion'];
        $fichero =  $_SESSION['fichero'];
        $idUsuario =  $_SESSION['IdUsuario'];

        //Dependiendo del título de la página hay que redirigir o no
        //Solo redirigir a usuario.php en:
            // Registro
            // Login
        //Solo redirigir a index.php en:
            // Aviso
        if ($titulo=="Registro-GameScape" || $titulo=="Login-GameScape")
            header("Location: ./usuario.php?$nombre");
        else if($titulo=="Aviso-GameScape")
            header("Location: ./index.php");
    }else{
        //Solo redirigir a index.php en las privadas:
            // Nuevo álbum
            // Solicitar Album Respuesta
            // Solicitar álbum
            // Usuario
            // Añadir_Foto_a_Album
            // Mis_Datos
            // Baja
            // Mis_Fotos
            // Mis_Albumes
        //Redirigir a aviso.php en:
            // Detalle
        if($titulo=="Detalle-GameScape")
            header("Location: ./aviso.php");
        else if ($titulo=="Nuevo álbum-GameScape" 
        || $titulo=="Solicitar álbum-GameScape" 
        || $titulo=="Solicitar álbum respuesta-GameScape" 
        || $titulo=="Usuario-GameScape" 
        || $titulo=="Añadir_Foto_a_Album-GameScape"
        || $titulo=="Mis_Datos-GameScape"
        || $titulo=="Baja-GameScape"
        || $titulo=="Mis_Fotos-GameScape"
        || $titulo=="Mis_Albumes-GameScape")
            header("Location: ./index.php");
        
    }
?>