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
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "index" . '");';
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
        <h1>Inicio</h1>
        <section class="articulos">
            <h2>Fotos recientes</h2>
            <div>
                <article class="articulo">
                    <h3>Random team</h3>
                    <a href="<?=$archivo;?>?id=1"><img src="imgenes/img.jpg" alt="foto"></a>
                    <p>
                        <span name="videojuego">Team Fortess 2</span>
                        <time datetime="2023-01-17T18:00:00">17-01-2023</time>
                        <span name="autor">Pedro</span>
                    </p>
                </article>
                <article class="articulo">
                    <h3>El gran árbol áureo</h3>
                    <a href="<?=$archivo;?>?id=2"><img src="imgenes/aureo.jpeg" alt="foto"></a>
                    <p>
                        <span name="videojuego">Elden Ring</span>
                        <time datetime="2023-07-05T18:00:00">05-07-2023</time>
                        <span name="autor">Ainhoa</span>
                    </p>
                </article>
                <article class="articulo">
                    <h3>Una habitación inusual</h3>
                    <a href="<?=$archivo;?>?id=3"><img src="imgenes/portal2.jpg" alt="foto"></a>
                    <p>
                        <span name="videojuego">Portal 2</span>
                        <time datetime="2017-10-07T14:00:00">07-10-2017</time>
                        <span name="autor">Esther</span>
                    </p>
                </article>
                <article class="articulo">
                    <h3>Increible jugada</h3>
                    <a href="<?=$archivo;?>?id=4"><img src="imgenes/overwatch.jpg" alt="foto"></a>
                    <p>
                        <span name="videojuego">Overwatch 2</span>
                        <time datetime="2023-02-01T18:00:00">01-02-2023</time>
                        <span name="autor">Óscar</span>
                    </p>
                </article>
                <article class="articulo">
                    <h3>Tan rápida como la luz</h3>
                    <a href="<?=$archivo;?>?id=5"><img src="imgenes/ctr.jpg" alt="foto"></a>
                    <p>
                        <span name="videojuego">CTR Nitro-Fueled</span>
                        <time datetime="2021-03-23T14:00:00">23-03-2021</time>
                        <span name="autor">Verónica</span>
                    </p>
                </article>
            </div>    
        </section>
    </main>

