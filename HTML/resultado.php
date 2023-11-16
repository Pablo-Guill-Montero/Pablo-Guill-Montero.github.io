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
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "resultado" . '");';
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
        <h1>Resultado</h1>
        <?php
            if ($tituloFoto!="")
                echo "<p>Título buscado: $tituloFoto<p>";
            if ($fecha!="")
                echo "<p>Fecha buscada: $fecha<p>";
            if ($videojuego!="")
                echo "<p>Videojuego buscado: $videojuego<p>";
        ?>
        <form action="./resultado.php">
            <div>
                <p>
                    <label for="titulo">
                        <span>TÍTULO</span>
                        <span><input type="text" name="titulo" id="titulo"></span>
                    </label>
                </p>
                <p>
                    <label for="fecha">
                        <span>FECHA</span>
                        <span><input type="text" name="fecha" id="fecha" ></span>
                    </label>
                </p>
                <p>
                    <label for="videojuego">
                        <span>VIDEOJUEGO</span>
                        <span><input type="text" name="videojuego" id="videojuego" ></span>
                    </label>
                </p>
                <p>
                    <input type="submit" value="Buscar">
                </p>
            </div> 
        </form>

        <section class="articulos">
            <h2>Resultado de la búsqueda</h2>
            <div>
                <article>
                    <h3>Random team</h3>
                    <a href="./detalle.php?id=1"><img src="imgenes/img.jpg" alt="foto"></a>
                    <p>
                        <span>Team Fortess 2</span>
                        <time datetime="2023-01-17T18:00:00">17-01-2023</time>
                    </p>
                </article>
                <article>
                    <h3>El gran árbol áureo</h3>
                    <a href="./detalle.php?id=2"><img src="imgenes/aureo.jpeg" alt="foto"></a>
                    <p>
                        <span>Elden Ring</span>
                        <time datetime="2023-07-05T18:00:00">05-07-2023</time>
                    </p>
                </article>
                <article>
                    <h3>Random team</h3>
                    <a href="./detalle.php?id=3"><img src="imgenes/img.jpg" alt="foto"></a>
                    <p>
                        <span>Team Fortess 2</span>
                        <time datetime="2023-01-17T18:00:00">17-01-2023</time>
                    </p>
                </article>
                <article>
                    <h3>El gran árbol áureo</h3>
                    <a href="./detalle.php?id=4"><img src="imgenes/aureo.jpeg" alt="foto"></a>
                    <p>
                        <span>Elden Ring</span>
                        <time datetime="2023-07-05T18:00:00">05-07-2023</time>
                    </p>
                </article>
                <article>
                    <h3>Random team</h3>
                    <a href="./detalle.php?id=5"><img src="imgenes/img.jpg" alt="foto"></a>
                    <p>
                        <span>Team Fortess 2</span>
                        <time datetime="2023-01-17T18:00:00">17-01-2023</time>
                    </p>
                </article>
            </div>
        </section>
    </main>
