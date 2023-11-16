
<main>
        <?php
        $nombre = "";
        $pwd = "";
        if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){
            //te estamos recordando
            $nombre =  $_COOKIE['usuario'];
            $pwd =  $_COOKIE['pwd'];
            if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
                // Ya estas iniciado y te recordamos

                header("Location: ./usuario.php?$nombre");
            }
            else{
                //te recordamos pero no estas iniciado 
                
                $_SESSION['usuario'] = $nombre;
                $_SESSION['pwd'] = $pwd;

                $fecha = $_COOKIE['ultima'];
                setcookie('ultima', time(), time()+ 90 * 24 * 60 *  60, '/');
                echo '<script>';
                echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "usuario" . '");';
                echo '</script>';

                //setcookie('ultima', time(),  '/');
                

                
            }
        }
        else if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
            // Ya estas iniciado
            $nombre =  $_SESSION['usuario'];
            $pwd =  $_SESSION['pwd'];
            header("Location: ./usuario.php?$nombre");
        }
        
        if(isset($_GET['nombre']) && isset($_GET['pwd'])){  
            $nombre = $_GET['nombre'];
            $pwd = $_GET['pwd'];

            if($nombre ==""){
                echo '<p>Tienes que rellenar el nombre</p>';
            }
            if($pwd ==""){
                echo '<p>Tienes que rellenar la contraseña</p>';
            }
        }
        if(isset($_GET['modo'])){ 
            echo '<p>El usuario o la contraseña es incorrecto</p>';
        }
        
        ?>
        <h1>Login</h1>
        <form method="POST" action="./controller/validador_login.php" id="formulario">
            <div>
                <p>
                    <label for="nombre">
                        <span>NOMBRE</span>
                        <span><input type="text" name="nombre" id="nombre" value='<?=$nombre?>'></span>
                    </label>
                </p>
                <p>
                    <label for="pwd">
                        <span>CONTRASEÑA</span>
                        <span><input type="text" name="pwd" id="pwd" value='<?=$pwd?>'></span>
                    </label>
                </p>
                <p>
                    <label for="pwd">
                        <span>RECUERDAME</span>
                        <span><input type="checkbox" name="recuerda" id="recuerda"></span>
                    </label>
                </p>
                <p><input type="submit" value="Login" id="boton"></p>
            </div>
            
        </form>
        
    </main>


