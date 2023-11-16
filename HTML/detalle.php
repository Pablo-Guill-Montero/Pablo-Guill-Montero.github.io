<?php
    $nombre = "";
    $pwd = "";
    //session_start();

    if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){
        //te estamos recordando
        $nombre =  $_COOKIE['usuario'];
        $pwd =  $_COOKIE['pwd'];
        if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
            // Ya estas iniciado y te recordamos


        }
        else{
            //te recordamos pero no estas iniciado 
            
            $_SESSION['usuario'] = $nombre;
            $_SESSION['pwd'] = $pwd;

            $fecha = $_COOKIE['ultima'];
                setcookie('ultima', time(), time()+ 90 * 24 * 60 *  60, '/');
            echo '<script>';
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "detalle" . '");';
            echo '</script>';

            $_COOKIE['ultima'] = time();
        // header("Location: ./usuario.php?$nombre");

            
        }
    }
    else if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
        // Ya estas iniciado
        $nombre =  $_SESSION['usuario'];
        $pwd =  $_SESSION['pwd'];

    }
?>
    <main>
        <h1>Detalle</h1>
        <article class="detalle">
            <?php
                echo <<<hereDOC
                <h2>$tituloFoto</h2>
                <img src="imgenes/$ruta" alt="foto">
                <p>
                    <time datetime="$datetime">$fecha</time>
                    <span>$videojuego</span>
                    <span>$album</span>
                    <a href="usuario.php">$usuario</a>
                </p> 
                hereDOC;
            ?>
            
             
        </article> 
    </main>
