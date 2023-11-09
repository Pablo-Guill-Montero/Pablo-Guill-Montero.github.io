
    <main>
        <h1>Solicitar impresión del álbum</h1>
        <p>Mediante esta opción puedes solicitar la impresión y envio de uno de tus álbumes a todo color, toda resolución.</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia nam modi voluptatibus odio distinctio nulla ex aliquam sit provident, cumque autem quod veniam amet dolor adipisci deserunt</p>
        <section id="tablas">
            <h2>Tarifas</h2>
            <table>
                <tr>
                    <th>Concepto</th>
                    <th>Tarifa</th>
                </tr>
                <tr>
                    <td>&lt; 5 páginas</td>
                    <td>0.10&euro; por pág.</td>
                </tr>
                <tr>
                    <td>entre 5 y 10 pág</td>
                    <td>0.08&euro; por pág</td>
                </tr>
                <tr>
                    <td>> 11 páginas</td>
                    <td>0.07&euro; por pág</td>
                </tr>
                <tr>
                    <td>Blanco y negro</td>
                    <td>0&euro;</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>0.05&euro; por foto</td>
                </tr>
                <tr>
                    <td>Resolución &gt; 300dpi</td>
                    <td>0.02 por foto</td>
                </tr>
            </table>

            <h2>Tabla PHP</h2>
            <?php include './HTML/tabla.php'; ?>

            <h2>Tabla JS</h2>
        </section>
        
        <section>
            <h2>Formulario de solicitud</h2>
            <p>Rellena el siguiente formulario aportando todos los detalles para confeccionar tu álbum</p>
            <form method="post" action="./solicitar_album_respuesta.php">
                <div id="campos">
                    <p>
                        <label for="nombre">
                            <span>NOMBRE</span>
                            <span><input type="text" name="nombre" id="nombre" required placeholder="su nombre" maxlength="200"></span>
                            <span>(*)</span>
                        </label>
                    </p>
                    <p>
                        <label for="titulo">
                            <span>Título del álbum</span>
                            <span><input type="text" name="titulo" id="titulo" required placeholder="que lo describa" maxlength="200"></span>
                            <span>(*)</span>
                        </label>
                    </p>
                    <p>
                        <label for="adicional">
                            <span>Texto adicional</span>
                            <span><textarea name="adicional" id="adicional" cols="50" rows="4" maxlength="4000" placeholder="dedicatoria, descripción de su contenido, etc."></textarea></span>
                        </label>
                    </p>
                    <p>
                        <label for="email">
                            <span>EMAIL</span>
                            <span><input type="email" name="email" id="email" required placeholder="su email" maxlength="200"></span>
                            <span>(*)</span>
                        </label>
                    </p>
                    <fieldset>
                        <legend>Dirección</legend>
                        <input type="text" name="calle" id="calle" required placeholder="Calle"> 
                        <input type="text" name="numero" id="numero" required placeholder="Número">
                        <input type="text" name="localidad" id="localidad" required placeholder="Localidad" list="ciudades">
                        <datalist id="ciudades">
                                <option value="Alicante">
                                <option value="Barcelona">
                                <option value="Madrid">
                        </datalist>
                        <input type="text" name="provincia" id="provincia" required placeholder="Provincia" list="provincias">
                        <datalist id="provincias">
                                <option value="Alicante">
                                <option value="Castellon">
                                <option value="Valencia">
                        </datalist>
                            (*)
                    </fieldset>
                    <p>
                        <label for="telefono">
                            <span>Teléfono</span>
                            <span><input type="tel" name="telefono" id="telefono" placeholder="### ## ## ##"></span>
                        </label>
                    </p>
                    <p>
                        <label for="color">
                            <span>Color de la portada</span>
                            <span><input type="color" id="color" name="color" value="#000000"/></span>
                        </label>
                    </p>
                    <p>
                        <label for="cantidad">
                            <span>Número de copias</span>
                            <span><input type="number" id="cantidad" name="cantidad" value="1" min="1" max="99"></span>
                        </label>
                    </p>
                    <p>
                        <label for="resolucion">
                            <span>Resolución de la impresión</span>
                            <span><input type="range" id="resolucion" name="resolucion" value="150" min="150" max="900" step="150"></span>
                        </label>
                    </p>
                    <p> 
                        <label for="album">
                            <span>Álbum de PI</span>
                            <span>
                                <select name="album" id="album">
                                    <option value="1">Álbum1</option>
                                    <option value="2">Álbum2</option>
                                    <option value="3">Álbum3</option>
                                </select>
                            </span>
                        </label>
                    </p>
                    <p>
                        <label for="fecha">
                            <span>Fecha aproximada de recepción</span>
                            <span><input type="date" id="fecha" name="fecha" min="2023-10-10">Fecha aproximada de llegada</span>
                        </label>
                    </p>
                    <p>
                        <label for="col_impre">
                            <span>Impresión a color</span>
                            <span><input type="checkbox" name="col_impre" id="col_impre"></span>
                        </label>
                    </p>
                    <input type="submit" value="Enviar" id="boton">
                </div>
            </form>
                
        </section>
        
    </main>
