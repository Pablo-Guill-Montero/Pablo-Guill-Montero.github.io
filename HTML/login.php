
<main>
        <?php
        if(isset($_GET['nombre']) && isset($_GET['pwd'])){  
            $nombre = $_GET['nombre'];
            $pwd = $_GET['pwd'];

            if($nombre ==""){
                echo '<p>Tienes que rellenar el nombre</p>';
            }
            if($pwd ==""){
                echo '<p>Tienes que rellenar la contraseña</p>';
            }
        }else{
            $nombre = "";
            $pwd = "";
            if(isset($_GET['modo']) ){  
                echo '<p>El usuario o la contraseña es incorrecto</p>';
            }
        }
        
        ?>
        <h1>Registro</h1>
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
                <p><input type="submit" value="Registrarse" id="boton"></p>
            </div>
            
        </form>
        
    </main>


