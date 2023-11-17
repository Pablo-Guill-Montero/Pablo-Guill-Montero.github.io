<?php
    $nombre = "";
    $pwd = "";
    //session_start();

    if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){
        //te estamos recordando
        $nombre =  $_COOKIE['usuario'];
        $pwd =  $_COOKIE['pwd'];
        $estilo =  $_COOKIE['estilo'];
        if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
            // Ya estas iniciado y te recordamos
        }
        else{
            //te recordamos pero no estas iniciado 
            
            $_SESSION['usuario'] = $nombre;
            $_SESSION['pwd'] = $pwd;
            $_SESSION['estilo'] = $estilo;

            $fecha = $_COOKIE['ultima'];
                setcookie('ultima', time(), time()+ 90 * 24 * 60 *  60, '/');
            echo '<script>';
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "usuario" . '");';
            echo '</script>';

            $_COOKIE['ultima'] = time();
        // header("Location: ./usuario.php?$nombre");

            
        }
    }
    else if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
        // Ya estas iniciado
        $nombre =  $_SESSION['usuario'];
        $pwd =  $_SESSION['pwd'];
        $estilo = $_SESSION['estilo'];

    }else{
        header("Location: ./index.php");
    }
?>
    <main>
        <h1>Usuario</h1>
        <ul>
            <li><a class="icon-editarPerfil" href="editar_perfil.php">Editar perfil</a></li>
            <li><a class="icon-baja" href="baja.php">Darse de baja</a></li>
            <li><a class="icon-album" href="mis_albumes.php">Mis álbumes</a></li>
            <li><a class="icon-nuevoAlbum" href="nuevo_album.php">Nuevo álbum</a></li>
            <li><a class="icon-impreso" href="solicitar_album.php">Solicitar álbum impreso</a></li>
            <li><a class="icon-login" href="logout.php">Salir</a></li>
        </ul>
    </main>
