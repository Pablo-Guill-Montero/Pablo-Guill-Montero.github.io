
    <main>
        <h1>Registro</h1>
        <form action="index_identificado.php" id="formulario">
            <div>
                <p>
                    <label for="nombre">
                        <span>NOMBRE</span>
                        <span><input type="text" name="nombre" id="nombre" ></span>
                    </label>
                </p>
                <p>
                    <label for="pwd">
                        <span>CONTRASEÑA</span>
                        <span><input type="password" name="pwd" id="pwd" ></span>
                    </label>
                </p>
                <p>
                    <label for="pwd2">
                        <span>REPETIR CONTRASEÑA</span>
                        <span><input type="password" name="pwd2" id="pwd2" ></span>
                    </label>
                </p>
                <p>
                    <label for="email">
                        <span>CORREO ELECTRÓNICO</span>
                        <span><input type="email" name="email" id="email" ></span>
                    </label>
                </p>
                <p>
                    <label for="sexo">
                        <span>SEXO</span>
                        <span><input type="text" name="sexo" id="sexo" ></span>
                    </label>
                </p>
                <p>
                    <label for="fecha">
                        <span>FECHA DE NACIMIENTO</span>
                        <span><input type="date" name="fecha" id="fecha" ></span>
                    </label>
                </p>
                <p>
                    <label for="ciudad">
                        <span>CIUDAD</span>
                        <span><input type="text" name="ciudad" id="ciudad" ></span>
                    </label>
                </p>
                <p>
                    <label for="pais">
                        <span>PAÍS DE RESIDENCIA</span>
                        <span>
                            <select name="pais" id="pais">
                                <option value="276">Alemania</option>
                                <option value="020">Andorra</option>
                                <option value="124">Canadá</option>
                                <option value="152">Chile</option>
                                <option value="156">China</option>
                                <option value="192">Cuba</option>
                                <option value="724">España</option>
                                <option value="250">Francia</option>
                                <option value="300">Grecia</option>
                                <option value="392">Japón</option>
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
                <p><input type="button" value="Registrarse" id="boton"></p>
            </div>
            
        </form>
    </main>

