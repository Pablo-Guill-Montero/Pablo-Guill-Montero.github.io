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
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "solicitar_album_respuesta" . '");';
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

    }
    else{
        header("Location: ./index.php");
    }
?>
    <main>
       <h1>Solicitar álbum respuesta</h1>
       
       <section id="seccion_resultado">
            <h2>Se solicitó un álbum con la siguiente información</h2>
            <div>
                <p id="nombre">Nombre: <?=$nombre?></p>
                <p id="titulo">Título: <?=$tituloAlbum?></p>
                <p id="adicional">Descripción: <?=$adicional?></p>
                <p id="email">Email: <?=$email?></p>
                <p id="direccion">Dirección: <?=$direccion?></p>
                <p id="telefono">Telefono: <?=$telefono?></p>
                <p>
                    <label for="color"> 
                        <span>Color de la portada</span>
                        <span><input type="color" id="color" name="color" disabled value='<?=$color?>'/></span>
                    </label>
                </p>
                <p id="cantidad">Cantidad: <?=$cantidad?></p>
                <p id="resolucion">Resolución: <?=$resolucion?></p>
                <p id="album">Álbum: <?=$album?></p>
                <p id="fecha">Fecha: <?=$fecha?></p>
                <p>
                    <label for="col_impre">
                        <span>Impresión a color</span>
                        <span><input type="checkbox" name="col_impre" disabled id="col_impre" <?php echo $col_impre ? 'checked' : ''; ?>></span>
                    </label>
                </p>
                <p id="coste">Precio unitario: <?=$coste?></p>
                <p id="coste">El coste de impresión total es: <?=$total?></p>
            </div>
        
       </section>  
    </main>
