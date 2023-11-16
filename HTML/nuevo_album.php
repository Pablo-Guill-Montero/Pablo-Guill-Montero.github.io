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
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "nuevo_album" . '");';
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
    else{
        header("Location: ./index.php");
    }
?>
<main>
    <h1>Nuevo álbum</h1>
    <form action="#" id="formulario">
        <div>
            <p>
                <label for="titulo">
                    <span>TÍTULO: </span>
                    <span><input type="text" name="titulo" id="titulo" required></span>
                </label>
            </p>
            <P>
                <label for="descripcion">
                    <span>DESCRIPCIÓN: </span>
                    <span><textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea></span>
                </label>
            </p>
            <p>
                <input type="button" value="Crear" id="boton">
            </p>
        </div>
    </form>
</main>