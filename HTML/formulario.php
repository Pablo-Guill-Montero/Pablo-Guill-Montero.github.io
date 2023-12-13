<?php
    if(!isset($pais) || $pais == ""){
        $pais = 1;
    }

        $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        $retorno = getPais($id, $pais);

        $fila = mysqli_fetch_assoc($retorno);
        $nomPais = $fila["Pais"];
?>
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
                        <span><input type="text" name="ciudad" id="ciudad" value='<?=$ciudad?>'></span>
                    </label>
                </p>
                <p>
                    <label for="pais">
                        <span>PAÍS DE RESIDENCIA</span>
                        <span>
                            <select name="Pais" id="Pais" >
                                <option value='<?=$pais;?>' selected><?=$nomPais;?></option>
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
                    <span>FOTO DE USUARIO</span>
                    <img src="./imgenes/<?=$foto?>" id="fotoUsuario" alt="FOTO USUARIO" onclick="this.parentElement.querySelector('input[type = file]').click();"> <!-- enlaza con el input de abajo -->
                    <!-- para mostrar la imagen -->
                    <input type="file" onchange="mostrarFoto(this);" name="foto" id="fotoInput" accept="image/*">
                    </label>
                    <footer>
                        <button type="button" class="botones_foto" id="eliminarFotoBtn" onclick="eliminarFoto(this);">Eliminar Foto</button>
                    </footer>
                </p>
                <p><input type="submit" value="Enviar" id="boton"></p>
            </div>
            
        </form>