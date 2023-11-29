<?php
    $nombre = "";
    $pwd = "";
     if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){
        $nombre =  $_COOKIE['usuario'];
        $pwd =  $_COOKIE['pwd'];
        $estilo =  $_COOKIE['estilo'];
        $descripcion =  $_COOKIE['descripcion'];
        $fichero =  $_COOKIE['fichero'];
        $idUsuario =  $_COOKIE['IdUsuario'];

        if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
            // Ya estas iniciado y te recordamos
        }
        else{
            //te recordamos pero no estas iniciado 
            
            $_SESSION['usuario'] = $nombre;
            $_SESSION['pwd'] = $pwd;
            $_SESSION['estilo'] = $estilo;
            $_SESSION['descripcion'] = $descripcion;
            $_SESSION['fichero'] = $fichero;
            $_SESSION['IdUsuario'] = $idUsuario;

            $fecha = $_COOKIE['ultima'];
                setcookie('ultima', time(), time()+ 90 * 24 * 60 *  60, '/');
            echo '<script>';
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "buscar" . '");';
            echo '</script>';

            $_COOKIE['ultima'] = time();
        // header("Location: ./usuario.php?$nombre"); 
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
        //Solo redirigir a index.php en:
            // Nuevo álbum
            // Solicitar Album Respuesta
            // Solicitar álbum
            // Usuario
        //Redirigir a aviso.php en:
            // Detatalle
        if ($titulo=="Nuevo álbum-GameScape" || $titulo=="Solicitar álbum-GameScape" || $titulo=="Solicitar álbum respuesta-GameScape" || $titulo=="Usuario-GameScape")
            header("Location: ./index.php");
        else if($titulo=="Detalle-GameScape")
            header("Location: ./aviso.php");
    }
?>