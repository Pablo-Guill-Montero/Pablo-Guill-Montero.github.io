<?php
    include "./controller/sessionController.php";
?>
<main>
        <?php
        if(isset($_GET['nombre']) && isset($_GET['pwd']) && isset($_GET['pwd2']) && isset($_GET['email']) && isset($_GET['sexo']) && isset($_GET['fecha']) && isset($_GET['ciudad']) && isset($_GET['pais'])){  
            $nombre = $_GET['nombre'];
            $pwd = $_GET['pwd'];
            $pwd2 = $_GET['pwd2'];
            $email = $_GET['email'];
            $sexo = $_GET['sexo'];
            $fecha = $_GET['fecha'];
            $ciuudad = $_GET['ciudad'];
            $pais = $_GET['pais'];

            if($nombre ==""){
                echo '<p>Tienes que relenar el nombre</p>';
            }
            if($pwd ==""){
                echo '<p>Tienes que relenar la contraseña</p>';
            }
            if($pwd2 ==""){
                echo '<p>Tienes que relenar la contraseña2</p>';
            }
            else if($pwd != $pwd2){
                echo '<p>Las 2 contraseñase deberian ser iguales</p>';
            }
        }else{
            $nombre = "";
            $pwd = "";
            $pwd2 = "";
            $email = "";
            $sexo = "";
            $fecha = "";
            $ciuudad = "";
            $pais = "";
        }
        
        ?>
        <h1>Nuevo Usuario</h1>
        <form>
            <div>
                <p>
                    <label for="nombre">
                        <span>NOMBRE</span>
                        <span>
                            <p><?=$nombre?></p>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="pwd">
                        <span>CONTRASEÑA</span>
                        <span>
                            <p><?=$pwd?></p>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="pwd2">
                        <span>REPETIR CONTRASEÑA</span>
                        <span>
                            <p><?=$pwd2?></p>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="email">
                        <span>CORREO ELECTRÓNICO</span>
                        <span>
                            <p><?=$email?></p>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="sexo">
                        <span>SEXO</span>
                        <span>
                            <p><?=$sexo?></p>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="fecha">
                        <span>FECHA DE NACIMIENTO</span>
                        <span>
                            <p><?=$fecha?></p>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="ciudad">
                        <span>CIUDAD</span>
                        <span>
                            <p><?=$ciuudad?></p>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="pais">
                        <span>PAÍS DE RESIDENCIA</span>
                        <span>
                            <p><?=$pais?></p>
                        </span>
                    </label>
                </p>
                
            </div>
        </form>
        
    </main>


