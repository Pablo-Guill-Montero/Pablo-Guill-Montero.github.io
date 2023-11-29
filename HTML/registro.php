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
                echo '<p>Tienes que rellenar el nombre</p>';
            }
            if($pwd ==""){
                echo '<p>Tienes que rellenar la contraseña</p>';
            }
            if($pwd2 ==""){
                echo '<p>Tienes que rellenar la 2ª contraseña</p>';
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
        <h1>Registro</h1>
        <form method="POST" action="./controller/validador_registro.php" id="formulario">
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
                    <label for="pwd2">
                        <span>REPETIR CONTRASEÑA</span>
                        <span><input type="text" name="pwd2" id="pwd2" value='<?=$pwd2?>'></span>
                    </label>
                </p>
                <p>
                    <label for="email">
                        <span>CORREO ELECTRÓNICO</span>
                        <span><input type="text" name="email" id="email" value='<?=$email?>'></span>
                    </label>
                </p>
                <p>
                    <label for="sexo">
                        <span>SEXO</span>
                        <span><input type="text" name="sexo" id="sexo" value='<?=$sexo?>'></span>
                    </label>
                </p>
                <p>
                    <label for="fecha">
                        <span>FECHA DE NACIMIENTO</span>
                        <span><input type="text" name="fecha" id="fecha" value='<?=$fecha?>'></span>
                    </label>
                </p>
                <p>
                    <label for="ciudad">
                        <span>CIUDAD</span>
                        <span><input type="text" name="ciudad" id="ciudad" value='<?=$ciuudad?>'></span>
                    </label>
                </p>
                <p>
                    <label for="pais">
                        <span>PAÍS DE RESIDENCIA</span>
                        <span>
                            <select name="Pais" id="Pais">
                                <?php
                                    $resultado = getPaises($id);
                                    while($row = mysqli_fetch_assoc($resultado)){//cuando no hay filas devuelve false y termina
                                        echo "<option value='{$row["IdPais"]}'>{$row["NomPais"]}</option>";
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($id);
                                ?>
                            </select>
                        </span>
                    </label>
                </p>
                <p>
                    <label for="foto">
                        <span>FOTO</span>
                        <span><input type="file" name="foto" id="foto" accept="image/*" ></span>
                    </label>
                </p>
                <p><input type="submit" value="Registrarse" id="boton"></p>
            </div>
            
        </form>
        
    </main>


