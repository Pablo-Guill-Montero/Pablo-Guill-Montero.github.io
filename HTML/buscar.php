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
    }
?>
    <main>
        <h1>Buscar</h1>
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
    </main>
